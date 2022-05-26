<?php

require_once 'vendor/autoload.php';

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class Employee
{
    private $id, $salary, $name, $dateOfHire = ["day" => 0, "month" => 0, "year" => 0];

    function __construct($id = 1, $name = "Tom", $salary = 100, $dateOfHire = ["day" => 1, "month" => 1, "year" => 2000])
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->dateOfHire = $dateOfHire;
    }

    function getSalary()
    {
        return $this->salary;
    }

    function getCurrentDate()
    {
        $currentDate = ["day" => getdate()["mday"], "month" => getdate()["mon"], "year" => getdate()["year"]];
        return $currentDate;
    }

    function getExperience()
    {       
        return $this->getCurrentDate()["year"] - $this->dateOfHire["year"];
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints('name',  [
            new Assert\NotBlank([
                'message' => 'Id shouldn\'t be blank',
            ]),
            new Assert\Length([
                'min' => 3,
                'minMessage' => 'Name is too short!',
            ]),
            new Assert\Length([
                'max' => 20,
                'maxMessage' => 'Name is too long!',
            ]),
        ]);

        $metadata->addPropertyConstraints('id', [
            new Assert\NotBlank([
                'message' => 'Id shouldn\'t be blank',
            ]),
            new Assert\Positive([
                'message' => 'Id shouldn\'t be negative',
            ]),
        ]);

        $metadata->addPropertyConstraints('salary', [
            new Assert\NotBlank([
                'message' => 'Salary shouldn\'t be blank',
            ]),
            new Assert\Positive([
                'message' => 'Salary shouldn\'t be negative',
            ]),
        ]);

        $metadata->addPropertyConstraint('dateOfHire', new Assert\Collection([
            'fields' => [
                'day' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThan(1),
                    new Assert\LessThan(13),
                ],
                'month' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThan(1),
                    new Assert\LessThan(12),
                ],
                'year' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThan(1950),
                    new Assert\LessThan(2022),
                ],
            ],
            'allowMissingFields' => false,
        ]));
        
    }
}