<?php

abstract class Animal
{
    protected string $specie;

    abstract public function eat();
    abstract public function sleep();
    abstract public function move();
}

class Dog extends Animal
{
    public function getSpecie()
    {
        return $this->specie;
    }
    public function setSpecie($param)
    {
        $this->specie = $param;
    }

    public function eat()
    {
        return 'comendo...';
    }
    public function sleep()
    {
        return 'dormindo...';
    }
    public function move()
    {
        return 'correndo...';
    }
}

$juvenal = new Dog();
$juvenal->setSpecie('Mamífero');
echo $juvenal->getSpecie() . ' ';
echo $juvenal->move() . '<br/>';


abstract class AreaCalculate
{
    abstract public function calcArea(float $arg1, float $arg2, string $geometricShape);
}

class Calculate extends AreaCalculate
{
    public function calcArea(float $arg1, float $arg2, string $geometricShape)
    {
        switch ($geometricShape) {
            case 'quadrado':
            case 'retangulo':
                return $arg1 * $arg2;
            case 'triangulo':
                return ($arg1 * $arg2) / 2;
        }
    }
}

$area = new Calculate();
echo 'A área do quadrado é: ' . $area->calcArea(10, 2, 'quadrado');
echo 'A área do retangulo é: ' . $area->calcArea(10, 2, 'retangulo');
echo 'A área do triangulo é: ' . $area->calcArea(10, 2, 'triangulo');
