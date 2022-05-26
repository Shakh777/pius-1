<?php

require_once 'vendor/autoload.php';
require_once 'Employee.php';
use Symfony\Component\Validator\Validation;


function validateEmployee(Employee $employee): bool
{
    $validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
    $errors = $validator->validate($employee);

    if (count($errors) > 0) {
        foreach($errors as $error) {
            echo $error->getMessage() . "\n";
        }
        return false;
    }

    return true;
}

echo "<pre>";
print_r("Employee1: \n");
$employee = new Employee();
if (validateEmployee($employee)) {
    print_r($employee->getExperience());
    print_r(" years\n");
}


print_r("Employee2: \n");
$employee1 = new Employee(-9, 't', -1, $dateOfHire = ["day" => 0, "month" => 19, "year" => 2004]);
if (validateEmployee($employee1)) {
    print_r($employee1->getExperience());
    print_r(" years\n");
}
echo "</pre>";