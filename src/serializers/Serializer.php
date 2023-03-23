<?php

declare(strict_types=1);

namespace Serializers;

abstract class Serializer
{
    protected $data;
    protected $instance;
    protected $valid = false;
    protected $cleanedData = [];
    protected $errors = [];
    protected $fields = [];

    public function __construct(array $data = null, $instance = null)
    {
        $this->data = $data;
        $this->instance = $instance;
    }

    public function isValid(): bool
    {
        $this->validate();
        return $this->valid;
    }

    public function getCleanedData(): array
    {
        return $this->cleanedData;
    }

    protected function setCleanedData($cleanedData)
    {
        $this->cleanedData = $cleanedData;
    }

    public function getErrors(): ?array
    {
        if (count($this->errors) == 0) {
            return null;
        }
        return $this->errors;
    }

    public function validate()
    {
        foreach ($this->fields as $field => $validator) {
            $validator->validate($this->data[$field]);
            if (!$validator->isValid()) {
                $this->errors[$field] = $validator->getErrors();
            } else {
                $this->cleanedData[$field] = $validator->getCleanedData($this->data[$field]);
            }
        }
        if (count($this->errors) == 0) {
            $this->valid = true;
        }
    }
}