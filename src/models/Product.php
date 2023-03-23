<?php

declare(strict_types=1);

namespace Models;
abstract class Product
{
    private ?int $id;
    private ?string $sku;
    private ?string $name;
    private $price;
    protected ?string $type;

    public function __construct($id = null, $sku = null, $name = null, $price = null, $type = null)
    {

        $this->setId($id);
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->setType($type);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }


}