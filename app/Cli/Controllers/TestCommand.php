<?php

declare(strict_types=1);

namespace App\Cli\Controllers;

use Valkyrja\Cli\Interaction\Message\SuccessMessage;
use Valkyrja\Cli\Interaction\Output\Contract\Output;
use Valkyrja\Cli\Routing\Attribute\Command;

/**
 * Class TestCommand.
 */
class TestCommand extends Controller
{
    #[Command(name: 'test', description: 'Test Command', helpText: 'A command to test for the app')]
    public function test(): Output
    {
        return $this->outputFactory
            ->createOutput()
            ->withMessages(
                ...(new SuccessMessage('This is a test.'))->asBanner(),
            );
    }
}
