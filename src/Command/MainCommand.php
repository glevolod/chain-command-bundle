<?php


namespace Glevolod\ChainCommandBundle\Command;


use Glevolod\ChainCommandBundle\Service\CommandChain;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MainCommand extends Command
{
    protected static $defaultName = 'glevolod:main-command';

    private CommandChain $commandChain;
    private LoggerInterface $logger;

    /**
     * MainCommand constructor.
     * @param CommandChain $commandChain
     * @param LoggerInterface $logger
     */
    public function __construct(CommandChain $commandChain, LoggerInterface $logger)
    {
        $this->commandChain = $commandChain;
        $this->logger = $logger;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Runs main command and other commands added to the chain')
            ->setHelp('Other commands should be registered with tags');
        $this->logger->info(self::$defaultName . ' is a master command of a command chain that has registered member commands');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->logger->info('Executing ' . self::$defaultName . ' command itself first:');
        $output->writeln('Hello from command "' . self::$defaultName . '"');
        $this->logger->info('Executing ' . self::$defaultName . ' as a chain members:');
        /** @var Command $command */
        foreach ($this->commandChain->getCommands() as $command) {
            $this->logger->info('Executing ' . $command->getName() . ' chain member');
            $command->run(new ArrayInput([]), $output);
        }
        $this->logger->info('Executing of ' . self::$defaultName . ' chain completed.');
        return Command::SUCCESS;
    }
}