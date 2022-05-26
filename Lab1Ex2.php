<?php

require_once 'Employee.php';
require_once 'Department.php';

function findMaxSalary($departments): Department
{
    $max = $departments[0];
    foreach ($departments as $department) {
        if ($department->getSalary() > $max->getSalary()) {
            $max = $department;
        }
    }

    return $max;
}

function findMinSalary($departments): Department
{
    $min = $departments[0];
    foreach ($departments as $department) {
        if ($department->getSalary() < $min->getSalary()) {
            $min = $department;
        }
    }

    return $min;
}

echo "<pre>";

$jessica = new Employee(1, 'Jessica', 120, $dateOfHire = ["day" => 8, "month" => 11, "year" => 2004]);
$roman = new Employee(2, 'Roman', 160, $dateOfHire = ["day" => 7, "month" => 1, "year" => 2002]);
$bob = new Employee(3, 'Bob', 80, $dateOfHire = ["day" => 9, "month" => 2, "year" => 2003]);
$stacy = new Employee(4, 'Stacy', 25, $dateOfHire = ["day" => 8, "month" => 4, "year" => 2001]);
$katy = new Employee(5, 'Katy', 290, $dateOfHire = ["day" => 15, "month" => 1, "year" => 2001]);
$stephen = new Employee(6, 'Stephen', 200, $dateOfHire = ["day" => 2, "month" => 9, "year" => 2004]);
$will = new Employee(7, 'Will', 70, $dateOfHire = ["day" => 19, "month" => 7, "year" => 2000]);


$department = new Department("Department No1", array($jessica, $bob, $roman));
$department1 = new Department("Department No2", array($katy, $bob, $stephen));
$department2 = new Department("Department No3", array($stacy, $will, $katy));
$department3 = new Department("Department No4", array($roman, $will, $stephen));
$department4 = new Department("Department No5", array($jessica, $stacy, $katy));

$departments = array ($department, $department1, $department2, $department3, $department4);

foreach ($departments as $department) {
    print_r("{$department->getName()}, salary = {$department->getSalary()}.\n");
}
print_r("\n");

$maxDepartment = findMaxSalary($departments);
print_r("The biggest salary has {$maxDepartment->getName()}. It's salary is {$maxDepartment->getSalary()}$\n");

$minDepartment = findMinSalary($departments);
print_r("The lowest salary has {$minDepartment->getName()}. It's salary is {$minDepartment->getSalary()}$\n");

echo "</pre>";