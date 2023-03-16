<?php
namespace Serializers;

class ProductDVDSerializer extends \Serializers\ProductSerializer implements \Serializers\ModelSerializerInterface
{
    public function __construct($data = null, $instance = null)
    {
        parent::__construct(data: $data, instance: $instance);
        $this->fields["size"] = new \Serializers\Validators\DecimalFieldValidator(required: true, positive: true);
    }

    public function create()
    {
        \DB\ProductDVDDBManager::create($this->getInstance());
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
            "type_specific" => ["Size" => $instance->getSize()],
        ];
    }

    public function getInstance()
    {
        $productDVD = new \Models\ProductDVD(
        sku: $this->cleanedData['sku'],
        name: $this->cleanedData['name'],
        price: $this->cleanedData['price'],
        type: $this->cleanedData['type'],
        size: $this->cleanedData['size'],
        );
        return $productDVD;
    }
}