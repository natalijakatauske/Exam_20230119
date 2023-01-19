<?php

class Manager extends Employee
{
    public const EMPLOYEE_TYPE = 2;
    public string $name;
    protected int $salary;
    protected int $experience;
    private int $id;
    protected int $owertimeHours;

    public function __construct(string $name, int $salary, int $owertimeHours)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->owertimeHours = $owertimeHours;
        parent::__construct($name, $salary);
    }

    public function calculateSalary()
    {
        return $this->salary + ($this->salary / 40 * $this->owertimeHours) * 2;
    }
}