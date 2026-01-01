<?php

declare(strict_types=1);

/*
 * This file is part of the Valkyrja Framework package.
 *
 * (c) Melech Mizrachi <melechmizrachi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Cli\Controller;

use Valkyrja\Cli\Interaction\Message\Answer;
use Valkyrja\Cli\Interaction\Message\Banner;
use Valkyrja\Cli\Interaction\Message\Contract\AnswerContract;
use Valkyrja\Cli\Interaction\Message\Message;
use Valkyrja\Cli\Interaction\Message\NewLine;
use Valkyrja\Cli\Interaction\Message\Question;
use Valkyrja\Cli\Interaction\Message\SuccessMessage;
use Valkyrja\Cli\Interaction\Output\Contract\OutputContract;
use Valkyrja\Cli\Routing\Attribute\Route;

/**
 * Class TestCommand.
 */
class TestCommand extends Controller
{
    protected const string YES_ANSWER = 'yes';
    protected const string NO_ANSWER  = 'no';

    #[Route(
        name: 'test',
        description: 'Test command',
        helpText: new Message('A command to showcase possibilities for commands.')
    )]
    public function run(): OutputContract
    {
        return $this->outputFactory
            ->createOutput()
            ->withAddedMessages(
                new Banner(new SuccessMessage('This is a success banner.')),
            )
            ->withAddedMessages(
                new NewLine(),
                new Question(
                    text: 'This is a question, right?',
                    callable: [$this, 'answered'],
                    answer: new Answer(
                        defaultResponse: self::NO_ANSWER,
                        allowedResponses: [
                            self::YES_ANSWER,
                            self::NO_ANSWER,
                        ]
                    )
                )
            );
    }

    /**
     * Callback for once the question is answered.
     */
    public function answered(OutputContract $output, AnswerContract $answer): OutputContract
    {
        if ($answer->getUserResponse() === self::YES_ANSWER) {
            return $output
                ->withAddedMessages(
                    new Message('You answered yes!!!'),
                    new NewLine(),
                    new NewLine(),
                )
                ->writeMessages();
        }

        return $output->withAddedMessages(new NewLine());
    }
}
