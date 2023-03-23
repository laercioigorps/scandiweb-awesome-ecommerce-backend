<?php

declare(strict_types=1);

namespace Serializers\Validators;

class DecimalFieldValidator extends FieldValidator
{
    private $positive;

    public function __construct(bool $positive = false, bool $required = true, bool $unique = false, callable $uniqueChecker = null)
    {
        parent::__construct(required: $required, unique: $unique, uniqueChecker: $uniqueChecker);
        $this->positive = $positive;
    }

    private function checkValidNumber($data)
    {
        if ($data && !is_numeric($data)) {
            $this->appendErrorMessage("Please, provide the data of indicated type");
        }
    }

    private function checkPositiveNumber($data)
    {
        if ($data && $this->positive && is_numeric($data) && $data < 0) {
            $this->appendErrorMessage("Field can not be a negative number!");
        }
    }

    public function validate($data)
    {
        parent::validate($data);
        $this->checkValidNumber($data);
        $this->checkPositiveNumber($data);
    }

    public function getCleanedData($data)
    {
        return (float) $data;
    }

}