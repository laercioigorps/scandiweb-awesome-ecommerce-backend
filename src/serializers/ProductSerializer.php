<?php
namespace Serializers;

abstract class ProductSerializer extends \Serializers\Serializer implements \Serializers\ModelSerializerInterface
{

    public function __construct($data = null, $instance = null)
    {
        parent::__construct(data: $data, instance: $instance);
        $this->fields["name"] = new Validators\CharFieldValidator(maxLength: 50, required: true);
        $this->fields["sku"] = new Validators\CharFieldValidator(maxLength: 25, required: true, unique: true, uniqueChecker: function ($sku) {
            return \DB\GeneralProductsDBManager::isValidNewSKU($sku);
        });
        $this->fields["name"] = new Validators\CharFieldValidator(maxLength: 25, required: true);
        $this->fields["price"] = new Validators\DecimalFieldValidator(required: true, positive: true);
        $this->fields["type"] = new Validators\CharFieldValidator(maxLength: 25, required: true);
    }
}