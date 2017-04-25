<?php

/*
 * This file is part of the Valkyrja framework.
 *
 * (c) Melech Mizrachi
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Valkyrja\Annotations;

use Valkyrja\Annotations\Exceptions\InvalidAnnotationKeyArgument;
use Valkyrja\Contracts\Annotations\Annotation as AnnotationContract;
use Valkyrja\Contracts\Annotations\AnnotationsParser as AnnotationsParserContract;

/**
 * Class Annotations
 *
 * @package Valkyrja\Annotations
 *
 * @author  Melech Mizrachi
 */
class AnnotationsParser implements AnnotationsParserContract
{
    /**
     * Get annotations from a given string.
     *
     * @param string $docString The doc string
     *
     * @return \Valkyrja\Contracts\Annotations\Annotation[]
     *
     * @throws \Valkyrja\Annotations\Exceptions\InvalidAnnotationKeyArgument
     */
    public function getAnnotations(string $docString): array
    {
        $annotations = [];

        // Get all matches of @ Annotations
        $matches = $this->getAnnotationMatches($docString);

        // If there are any matches iterate through them and create new annotations
        if ($matches && isset($matches[0], $matches[1])) {
            foreach ($matches[0] as $index => $match) {
                $this->setAnnotation($matches, $index, $annotations);
            }
        }

        return $annotations;
    }

    /**
     * Get annotation matches.
     *
     * @param string $docString The doc string
     *
     * @return array[]
     */
    protected function getAnnotationMatches(string $docString):? array
    {
        preg_match_all($this->getRegex(), $docString, $matches);

        return $matches ?? null;
    }

    /**
     * Set a matched annotation.
     *
     * @param array $matches     The matches
     *                           [0 => matches, 1 => annotation, 2 => type, 3 => args, 4 => var, 5=> desc]
     * @param int   $index       The index
     * @param array $annotations The annotations list
     *
     * @return void
     *
     * @throws \Valkyrja\Annotations\Exceptions\InvalidAnnotationKeyArgument
     */
    protected function setAnnotation(array $matches, int $index, array &$annotations): void
    {
        $properties = $this->getAnnotationProperties($matches, $index);

        // Get the annotation model from the annotations map
        $annotation = $this->getAnnotationFromMap($properties['annotation']);

        // Set the annotation's type
        $annotation->setType($properties['annotation']);
        // Set all the matches
        $annotation->setMatches($properties);

        // If there are arguments
        if (null !== $properties['arguments'] && $properties['arguments']) {
            // Filter the arguments and set them in the annotation
            $annotation->setArguments($this->getArguments($properties['arguments']));

            // Iterate through the arguments
            foreach ($annotation->getArguments() as $key => $argument) {
                $methodName = 'set' . ucfirst($key);

                // Check if there is a setter function for this argument
                if (method_exists($annotation, $methodName)) {
                    $annotation->{$methodName}($argument);
                }
            }
        }

        // Set the annotation in the list
        $annotations[] = $annotation;
    }

    /**
     * Get the properties for a matched annotation.
     *
     * @param array $matches The matches
     * @param int   $index   The index
     *
     * @return array
     */
    protected function getAnnotationProperties(array $matches, int $index): array
    {
        return $this->processAnnotationProperties(
            [
                'annotation'  => $matches[1][$index] ?? null,
                'arguments'   => $matches[2][$index] ?? null,
                'type'        => $matches[3][$index] ?? null,
                'variable'    => $matches[4][$index] ?? null,
                'description' => $matches[5][$index] ?? null,
            ]
        );
    }

    /**
     * Process the properties.
     *
     * @param array $properties The properties
     *
     * @return array
     */
    protected function processAnnotationProperties(array $properties): array
    {
        // If the type and description exist by the variable does not
        // then that means the variable regex group captured the
        // first word of the description
        if ($properties['type'] && $properties['description'] && ! $properties['variable']) {
            // Rectify this by concatenating the type and description
            $properties['description'] = $properties['type'] . $properties['description'];

            // Then unset the type
            unset($properties['type']);
        }

        // Iterate through the properties
        foreach ($properties as &$property) {
            // Clean each one
            $property = $this->cleanMatch($property);
        }

        return $properties;
    }

    /**
     * Filter a string of arguments into an key => value array
     *
     * @param string $arguments The arguments
     *
     * @return array
     *
     * @throws \Valkyrja\Annotations\Exceptions\InvalidAnnotationKeyArgument
     */
    public function getArguments(string $arguments = null):? array
    {
        // If a valid arguments list was passed in
        if (null !== $arguments && $arguments) {
            // Set an arguments list to return
            $argumentsList = [];

            // Get all arguments from the arguments string
            /** @var array[] $matches */
            $matches = $this->getArgumentMatches($arguments);

            // Iterate through the matches
            foreach ($matches[0] as $index => $match) {
                $this->setArgument($matches, $index, $argumentsList);
            }

            return $argumentsList;
        }

        return null;
    }

    /**
     * Get the argument matches.
     *
     * @param string $arguments The arguments
     *
     * @return array
     */
    protected function getArgumentMatches(string $arguments):? array
    {
        preg_match_all($this->getArgumentsRegex(), $arguments, $matches);

        return $matches ?? null;
    }

    /**
     * Set a matched argument.
     *
     * @description The matches [0 => $matches, 1 => $keys, 2 => $values]
     *
     * @param array $matches   The matches [0 => $matches, 1 => $keys, 2 => $values]
     * @param int   $index     The index
     * @param array $arguments The arguments list
     *
     * @return void
     *
     * @throws \Valkyrja\Annotations\Exceptions\InvalidAnnotationKeyArgument
     */
    protected function setArgument(array $matches, int $index, array &$arguments): void
    {
        // Set the key
        $key = $this->determineConstant($this->cleanMatch($matches[1][$index]));
        // Set the value
        $value = $this->determineConstant($this->cleanMatch($matches[2][$index]));

        // Constants can be bool, int, string, or arrays
        // If the key is an array throw an exception
        if (is_array($key)) {
            throw new InvalidAnnotationKeyArgument();
        }

        // Set the key value pair in the list
        $arguments[$key] = $value;
    }

    /**
     * Determine if a value is a defined constant.
     *
     * @param string $value The value to check
     *
     * @return mixed
     */
    protected function determineConstant(string $value)
    {
        // Determine if the value is a constant
        if (defined($value)) {
            // Set the value as the constant's value
            $value = constant($value);
        }

        return $value;
    }

    /**
     * Get the annotations regex.
     *
     * @return string
     */
    public function getRegex(): string
    {
        /**
         * @description
         *
         * This regex will produce an array matches list of
         * $matches[0] All matches
         * $matches[1] Annotation name
         *
         * @Annotation($data)
         *
         * $matches[2] Parenthesis enclosed results
         *
         * @Annotation $matches[3] $matches[4] $matches[5]
         * Matches: @method, @param $test, @description description, @param int $test Description, etc
         * None of the below matches requires the previous one to exist
         *
         * $matches[3] Description or type part of a line annotation
         * $matches[4] Variable part of line annotation (must be a variable beginning with $)
         * $matches[5] Description part of line annotation
         */
        return '/'
            . self::ANNOTATION_SYMBOL
            . '([a-zA-Z]*)'
            . '(?:' . self::CLASS_REGEX . ')?'
            . self::LINE_REGEX
            . '/x';
    }

    /**
     * Get the arguments regex.
     *
     * @return string
     */
    public function getArgumentsRegex(): string
    {
        return '/' . static::ARGUMENTS_REGEX . '/x';
    }

    /**
     * Get the annotations map.
     *
     * @return array
     */
    public function getAnnotationsMap(): array
    {
        return config()->annotations->map;
    }

    /**
     * Get an annotation model from the annotations map.
     *
     * @param string $annotationType The annotation type
     *
     * @return \Valkyrja\Contracts\Annotations\Annotation
     */
    public function getAnnotationFromMap(string $annotationType): AnnotationContract
    {
        $annotationsMap = $this->getAnnotationsMap();

        if ($annotationType && array_key_exists($annotationType, $annotationsMap)) {
            $annotation = new $annotationsMap[$annotationType]();
        }
        else {
            $annotation = new Annotation();
        }

        return $annotation;
    }

    /**
     * Clean a match from asterisks and new lines.
     *
     * @param string $match The match
     *
     * @return string
     */
    protected function cleanMatch(string $match = null):? string
    {
        if (null === $match) {
            return null;
        }

        return trim(str_replace('*', '', $match));
    }
}
