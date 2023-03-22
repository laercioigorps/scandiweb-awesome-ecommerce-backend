<?php
namespace Serializers\Validators;

class CharFieldValidator extends \Serializers\Validators\FieldValidator
{
    protected $maxLength;

    public function __construct(int $maxLength, bool $required = true, bool $unique = false, callable $uniqueChecker = null)
    {
        parent::__construct(required: $required, unique: $unique, uniqueChecker: $uniqueChecker);
        $this->maxLength = $maxLength;
    }

    private function checkMaxLength($data)
    {
        if (strlen($data) > $this->maxLength) {
            $this->appendErrorMessage("Field can not have more than {$this->maxLength} characters");
        }
    }

    public function validate($data)
    {
        parent::validate($data);
        $this->checkMaxLength($data);
    }

}