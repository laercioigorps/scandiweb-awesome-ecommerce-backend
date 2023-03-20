<?php
namespace Serializers\Validators;

class DecimalFieldValidator extends \Serializers\Validators\FieldValidator
{
    private $positive;

    public function __construct($positive = false, $required = true, $unique = false, $uniqueChecker = null)
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

}