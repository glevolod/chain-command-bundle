<?php


namespace Glevolod\ChainCommandBundle\Service;


use Glevolod\ChainCommandBundle\Command\MainCommand;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;

class CommandChain
{
    private $commands;
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->commands = [];
        $this->logger = $logger;
    }

    public function addCommand(Command $command): void
    {
        $this->logger->info($command->getName() . ' registered as a member of ' . MainCommand::getDefaultName() . ' command chain');
        $this->commands[] = $command;
    }

    public function getCommands(): array
    {
        return $this->commands;
    }
}