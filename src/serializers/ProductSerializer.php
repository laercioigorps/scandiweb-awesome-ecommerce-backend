<?php
require_once('Serializer.php');
require_once('validators/FieldValidator.php');
require_once('validators/CharFieldValidator.php');
require_once('validators/DecimalFieldValidator.php');
abstract class ProductSerializer extends Serializer
{

    public function __construct($data = null, $instance = null)
    {
        parent::__construct(data: $data, instance: $instance);
        $this->fields["name"] = new CharFieldValidator(maxLength: 50, required: true);
        $this->fields["sku"] = new CharFieldValidator(maxLength: 25, required: true, unique: true, uniqueChecker: function ($sku) {
            return ProductDBManager::isValidNewSKU($sku);
        });
        $this->fields["name"] = new CharFieldValidator(maxLength: 25, required: true);
        $this->fields["price"] = new DecimalFieldValidator(required: true, positive: true);
        $this->fields["type"] = new CharFieldValidator(maxLength: 25, required: true);
    }
}