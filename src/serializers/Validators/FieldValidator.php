<?php
namespace Serializers\Validators;
class FieldValidator
{

    protected $required;
    protected $errors = [];
    protected $unique;
    protected $uniqueChecker;

    public function __construct($required = true, $unique = false, $uniqueChecker = null)
    {
        $this->required = $required;
        $this->unique = $unique;
        $this->uniqueChecker = $uniqueChecker;
    }

    public function validate($data)
    {
        $this->checkRequired($data);
        $this->checkUnique($data);
    }

    protected function appendErrorMessage($message)
    {
        $this->errors[] = $message;
    }

    protected function checkRequired($data)
    {
        if ($this->required && ($data == null || $data === '')) {
            $this->appendErrorMessage("Field is required");
        }
    }

    protected function checkUnique($data)
    {
        if ($this->unique && $data) {
            $is_unique = call_user_func($this->uniqueChecker, $data);
            if (!$is_unique) {
                $this->appendErrorMessage("Field value already exist!");
            }
        }
    }

    public function isValid()
    {
        if (count($this->errors) == 0) {
            return true;
        }
        return false;
    }

    public function getErrors()
    {
        if (count($this->errors) == 0) {
            return null;
        }
        return $this->errors;
    }
}