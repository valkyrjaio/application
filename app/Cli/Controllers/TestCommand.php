<?php

declare(strict_types=1);

namespace App\Cli\Controllers;

use Valkyrja\Cli\Interaction\Message\Answer as AnswerMessage;
use Valkyrja\Cli\Interaction\Message\Banner;
use Valkyrja\Cli\Interaction\Message\Contract\Answer;
use Valkyrja\Cli\Interaction\Message\Message;
use Valkyrja\Cli\Interaction\Message\NewLine;
use Valkyrja\Cli\Interaction\Message\Question;
use Valkyrja\Cli\Interaction\Message\SuccessMessage;
use Valkyrja\Cli\Interaction\Output\Contract\Output;
use Valkyrja\Cli\Routing\Attribute\Command;

/**
 * Class TestCommand.
 */
class TestCommand extends Controller
{
    protected const string YES_ANSWER = 'yes';
    protected const string NO_ANSWER  = 'no';

    #[Command(
        name: 'test',
        description: 'Test command',
        helpText: new Message('A command to showcase possibilities for commands.')
    )]
    public function run(): Output
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
                    answer: new AnswerMessage(
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
    public function answered(Output $output, Answer $answer): Output
    {
        if ($answer->getUserResponse() === self::YES_ANSWER) {
            return $output
                ->withAddedMessages(
                    new Message('You answered yes!!!'),
                )
                ->writeMessages();
        }

        return $output;
    }
}
