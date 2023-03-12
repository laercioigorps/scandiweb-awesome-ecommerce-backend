<?php
abstract class Serializer
{
    protected $data;
    protected $instance;
    protected $valid = false;
    protected $cleanedData;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public function isValid()
    {
        $this->validate();
        return $this->valid;
    }

    protected function setValid($valid){
        $this->valid = $valid;
    }

    public abstract function validate();

    public function getCleanedData()
    {
        return $this->cleanedData;
    }

    protected function setCleanedData($cleanedData)
    {
        $this->cleanedData = $cleanedData;
    }
}