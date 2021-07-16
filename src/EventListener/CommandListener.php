<?php


namespace Glevolod\ChainCommandBundle\EventListener;


use Glevolod\ChainCommandBundle\Command\MainCommand;
use Glevolod\ChainCommandBundle\Custom\ChainedCommandInterface;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Symfony\Component\DependencyInjection\Container;

class CommandListener
{
    public function onConsoleCommand(ConsoleCommandEvent $event)
    {
        $command = $event->getCommand();
        if($command instanceof ChainedCommandInterface) {
            $output = $event->getOutput();
            $output->writeln('Error: ' . $command->getName() . ' command is a member of ' . MainCommand::getDefaultName() . ' command chain and cannot be executed on its own.');
            $event->disableCommand();
        }
    }
}