<?php

namespace lesson03\example2\demo00;

abstract class Animal
{
    public $color;
    public $weight;

    public function sleep()
    {
        // ...
    }

    abstract public function voice();
}

interface Eatable
{

}

class Dog extends Animal implements Eatable
{
    public function voice()
    {
        return 'gav-gav';
    }

    public function aport()
    {

    }
}

class Cat extends Animal implements Eatable
{
    public function voice()
    {
        return 'mau-mau';
    }
}

class Skuns extends Animal
{
    public function voice()
    {
        return '';
    }
}

class Tiger extends Animal
{
    public function voice()
    {
        return 'rour';
    }

    public function eat(Eatable $eat)
    {
        /*if ($eat instanceof Tiger) {
            throw new \Exception('Я не ...');
        }*/
    }
}

$dog = new Dog();
echo $dog->voice();
echo $dog->color;
$dog->aport();

$cat = new Cat();
echo $cat->voice();
echo $cat->color;

$tiger = new Tiger();
$tiger->eat($cat);
$tiger->eat($dog);






















class A
{
    // 5 методов, 3 общих
}

class B
{
    // 12 методов, 3 общих
}
