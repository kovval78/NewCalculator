<?php

//declare(strict_types=1);

namespace App\Commands;

use App\Receivers\Calculator;
use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class CountCommand extends Command
    {
    protected function configure()
    {
        $this->setName('ask:number')
            ->setDescription(
                'Command asks for two numbers and then calculates the result of one of the basic math operations: addition, subtraction, multiplication and division.')
            ->setHelp('Enter two numbers and then enter the sign of the math operation: (+, -, *, /)');

        parent::configure();
    }

        protected function execute(InputInterface $input, OutputInterface $output): int
        {
            $helper = $this->getHelper('question');

            $fNumber = $helper->ask($input, $output, new Question(
                "Enter first number: ", 0
            ));
            if(!is_numeric($fNumber)) {
                throw new RuntimeException('The number must be integer or float');
            }

            $sNumber = $helper->ask($input, $output, new Question(
                "Enter second number: ", 0
            ));
            if(!is_numeric($sNumber)) {
                throw new RuntimeException('The number must be integer or float');
            }


//            $mathSign = $helper->ask($input, $output, new Question(
//                "What action do you want to perform? You can use math signs: <comment>'+', '-', '*', '/'</comment> :",
//                0
//            ));


            $calculator = new Calculator($fNumber, $sNumber);

            try {
                $result = $calculator->divide();
//                $result = new AddCommand($calculator);
                $output->writeln('<info>' . $fNumber . '</info>');
                $output->writeln('<info>' . $sNumber . '</info>');
                $output->writeln('<error>' . $result . '</error>');
            } catch (RuntimeException $exception) {
                $output->writeln($exception->getMessage());
            }
            return Command::SUCCESS;
        }
}
