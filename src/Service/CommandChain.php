<?php


namespace Glevolod\ChainCommandBundle\Service;


use Symfony\Component\Console\Command\Command;

class CommandChain
{
    private $commands;

    public function __construct()
    {
        $this->commands = [];
    }

    public function addCommand(Command $command): void
    {
        $this->commands[] = $command;
    }

    public function getCommands(): array
    {
        return $this->commands;
    }
}