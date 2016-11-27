<?php

namespace Project\App\Console;

class Greet extends \PHPixie\Console\Command\Implementation
{
    public function __construct($config)
    {
        print("О-ПА-ПА ЧЁ ЭТО ??? Project\\App\\Console\n");

        $config
            ->description('Greet the user');
        
        $config->argument('message')
            ->description("Message to display");
        
        parent::__construct($config);
    }
    
    public function run($argumentData, $optionData)
    {
        print("О-ПА-ПА ЧЁ ЭТО ??? Project\\App\\Console -> run\n");
        print_r($argumentData);
        print_r($optionData);

        $message = $argumentData->get('message', "Have fun coding!");
        $this->writeLine($message);
    }
}