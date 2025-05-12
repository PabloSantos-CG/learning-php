<?php

class Car
{
    // readonly define a variável como variável de leitura, sendo possível apenas atribuir valor uma única vez
    public readonly string $name;
    public int $year;
    public int $doorsQtd;
    public float $enginePower;

    public function __construct(string $name, int $year, int $doorsQtd, float $enginePower)
    {
        $this->name = $name;
        $this->year = $year;
        $this->doorsQtd = $doorsQtd;
        $this->enginePower = $enginePower;
    }

    public function showCarSpecifications(): void
    {
        echo var_dump($this);
    }
}

$vw = new Car('Gol', 2008, 2, 1.0);

print_r($vw);
echo '<br />';
$vw->showCarSpecifications();


$vw->enginePower = 2.8;
echo '<br />';
$vw->showCarSpecifications();
