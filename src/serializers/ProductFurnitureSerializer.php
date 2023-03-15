<?php
require_once('Serializer.php');
require_once('ModelSerializerInterface.php');
require_once('../src/db/ProductFurnitureDBManager.php');
class ProductFurnitureSerializer extends Serializer implements ModelSerializerInterface
{
    public function __construct($data = null, $instance = null)
    {
        parent::__construct(data: $data, instance: $instance);
        $this->fields["name"] = new CharFieldValidator(maxLength: 50, required: true);
        $this->fields["sku"] = new CharFieldValidator(maxLength: 25, required: true);
        $this->fields["name"] = new CharFieldValidator(maxLength: 25, required: true);
        $this->fields["price"] = new FieldValidator(required: true);
        $this->fields["type"] = new CharFieldValidator(maxLength: 25, required: true);
        $this->fields["height"] = new FieldValidator(required: true);
        $this->fields["width"] = new FieldValidator(required: true);
        $this->fields["length"] = new FieldValidator(required: true);
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