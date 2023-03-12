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

    public function IsValid()
    {
        $this->validate();
        return $this->valid;
    }

    public abstract function validate();

    public function getCleanedData()
    {
        return $this->cleanedData;
    }
}