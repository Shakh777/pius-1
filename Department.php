<?php
require_once 'Employee.php';

class Department
{
    private $name;
    private $employees = array();
    function __construct($name, $employees)
    {
        $this->name = $name;
        $this->employees = $employees;
    }

    public function getSalary()
    {
        $sum = 0;
        foreach ($this->employees as $employee) {
            $sum += $employee->getSalary();
        }

        return $sum;
    }

    public function getName()
    {
        return $this->name;
    }
}