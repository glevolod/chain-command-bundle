<?php


namespace Glevolod\ChainCommandBundle\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MainCommand extends Command
{
    protected static $defaultName = 'glevolod:main-command';

    protected function configure(): void
    {
        $this
            ->setDescription('Runs main command and other commands added to the chain')
            ->setHelp('Other commands should be registered with tags');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Hello from command "' . self::$defaultName . '"');
        return Command::SUCCESS;
    }
}