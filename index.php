<?php

require 'vendor/autoload.php';

use CarWash\Entity\Car;
use CarWash\Entity\Customer;
use CarWash\Notifier\ConsoleNotifier;
use CarWash\Repository\MemoryRepository;
use CarWash\Service\CarWashService;

class ConsoleImplementation
{
    public function init()
    {
        $answers = $this->askToUser();

        list($dni, $name, $cellphone) = $answers['personal'];
        list($brand, $model, $color)  = $answers['car'];

        $customer = new Customer();
        $customer
            ->setDni($dni)
            ->setName($name)
            ->setCellphone($cellphone);

        $car = new Car();
        $car
            ->setBrand($brand)
            ->setModel($model)
            ->setColor($color);

        $carWashService = new CarWashService(new ConsoleNotifier(), new MemoryRepository());
        $job = $carWashService->toWashCar($car, $customer);
        $carWashService->washCompleted($job);
    }

    /**
     * @return array
     */
    protected function askToUser()
    {
        $answers = [];

        echo '> Datos Personales'. PHP_EOL;
        foreach ($this->questions()['personal'] as $question) {
            $answers['personal'][] = $this->input($question);
        }

        echo PHP_EOL . '> Datos del Carro' . PHP_EOL;
        foreach ($this->questions()['car'] as $question) {
            $answers['car'][] = $this->input($question);   
        }

        return $answers;
    }

    /**
     * @return array
     */
    protected function questions()
    {
        return [
            'personal' => ['Cuál es tu dni: ', 'Cómo te llamas: ', 'Cuál es tu celular: '],
            'car' => ['Marca: ', 'Modelo: ', 'Color: ']
        ];
    }

    /**
     * @param string $prompt
     *
     * @return string
     */
    private function input($prompt)
    {
        do {
            echo $prompt;
            $handle = fopen ("php://stdin","r");
            $line = trim(fgets($handle));
        } while ($line === '');

        return $line;
    }
}


$consoleImplementation = new ConsoleImplementation();
$consoleImplementation->init();
