<?php

include_once 'Employee.php';
include_once 'Intern.php';
include_once 'Manager.php';

$employee = new Employee('John', 1000);
echo $employee . PHP_EOL;
echo $employee->__clone() . PHP_EOL;

echo Employee::getTypeDescription() . PHP_EOL; //static

$intern = new Intern('Peter', 700);
echo $intern . PHP_EOL;
echo $intern->calculateSalary() . PHP_EOL;
echo $intern->getTypeDescription() . PHP_EOL;
$cloneIntern = clone $intern;
print_r($cloneIntern);

$manager = new Manager('Steve', 1200, 10);
echo $manager . PHP_EOL;
echo $manager->calculateSalary() . PHP_EOL;
echo $manager->getTypeDescription() . PHP_EOL;