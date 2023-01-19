<?php

include_once 'Employee.php';
include_once 'Intern.php';
include_once 'Manager.php';

$employee = new Employee('John', 1000);
echo $employee . PHP_EOL;
echo $employee->__clone() . PHP_EOL;
echo $employee->calculateSalary() . PHP_EOL; // trinti

echo Employee::getTypeDescription() . PHP_EOL; //static

$intern = new Intern('Peter', 700) .PHP_EOL;
var_dump($intern);
echo $intern . PHP_EOL;
// echo $intern->calculateSalary() . PHP_EOL;
// echo $intern->getTypeDescription() . PHP_EOL;
// $cloneIntern = clone $inter;
// print_r($cloneIntern);

$manager = new Manager('Steve', 1200, 10) . PHP_EOL;
var_dump($manager);
echo $manager . PHP_EOL;
// echo $manager->calculateSalary() . PHP_EOL;
// echo $manager->getTypeDescription() . PHP_EOL;