<?php
namespace Serializers;

class ProductFurnitureSerializer extends \Serializers\ProductSerializer
{
    public function __construct($data = null, $instance = null)
    {
        parent::__construct(data: $data, instance: $instance);
        $this->fields["height"] = new \Serializers\Validators\DecimalFieldValidator(required: true, positive: true);
        $this->fields["width"] = new \Serializers\Validators\DecimalFieldValidator(required: true, positive: true);
        $this->fields["length"] = new \Serializers\Validators\DecimalFieldValidator(required: true, positive: true);
    }

    public function create()
    {
        \DB\ProductFurnitureDBManager::create($this->getInstance());
    }

    public function getInstanceData()
    {
        $instance = $this->instance;
        return $this->data = [
            "id" => $instance->getId(),
            "sku" => $instance->getSku(),
            "name" => $instance->getName(),
            "price" => $instance->getPrice(),
            "type" => $instance->getType(),
            "type_specific" => ["Dimentions" => $instance->getHeight() . 'x' . $instance->getWidth() . 'x' . $instance->getLength()],
        ];
    }

    public function getInstance()
    {
        $productFurniture = new \Models\ProductFurniture(
        sku: $this->cleanedData['sku'],
        name: $this->cleanedData['name'],
        price: $this->cleanedData['price'],
        type: $this->cleanedData['type'],
        height: $this->cleanedData['height'],
        width: $this->cleanedData['width'],
        length: $this->cleanedData['length'],
        );
        return $productFurniture;
    }
}