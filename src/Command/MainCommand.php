<?php


namespace Glevolod\ChainCommandBundle\Command;


use Glevolod\ChainCommandBundle\Service\CommandChain;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MainCommand extends Command
{
    protected static $defaultName = 'glevolod:main-command';

    private $commandChain;

    public function __construct(CommandChain $commandChain)
    {
        $this->commandChain = $commandChain;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Runs main command and other commands added to the chain')
            ->setHelp('Other commands should be registered with tags');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Hello from command "' . self::$defaultName . '"');
        /** @var Command $command */
        foreach ($this->commandChain->getCommands() as $command) {
            $command->run(new ArrayInput([]), $output);
        }
        return Command::SUCCESS;
    }
}