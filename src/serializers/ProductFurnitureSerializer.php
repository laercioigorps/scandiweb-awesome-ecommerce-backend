<?php
require_once('ProductSerializer.php');
require_once('ModelSerializerInterface.php');
require_once('../src/db/ProductFurnitureDBManager.php');
require_once('validators/DecimalFieldValidator.php');
class ProductFurnitureSerializer extends ProductSerializer implements ModelSerializerInterface
{
    public function __construct($data = null, $instance = null)
    {
        parent::__construct(data: $data, instance: $instance);
        $this->fields["height"] = new DecimalFieldValidator(required: true, positive: true);
        $this->fields["width"] = new DecimalFieldValidator(required: true, positive: true);
        $this->fields["length"] = new DecimalFieldValidator(required: true, positive: true);
    }

    public function create()
    {
        ProductFurnitureDBManager::create($this->getCleanedData());
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
}