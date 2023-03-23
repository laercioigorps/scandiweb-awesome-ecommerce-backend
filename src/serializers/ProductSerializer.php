<?php

declare(strict_types=1);

namespace Serializers;

use Models\Product;
use Serializers\Validators\{CharFieldValidator, DecimalFieldValidator};
use DB\GeneralProductsDBManager;

abstract class ProductSerializer extends Serializer implements ModelSerializerInterface
{

    public function __construct(array $data = null, Product $instance = null)
    {
        parent::__construct(data: $data, instance: $instance);
        $this->fields["name"] = new CharFieldValidator(maxLength: 50, required: true);
        $this->fields["sku"] = new CharFieldValidator(maxLength: 25, required: true, unique: true, uniqueChecker: function ($sku) {
            return GeneralProductsDBManager::isValidNewSKU($sku);
        });
        $this->fields["name"] = new CharFieldValidator(maxLength: 25, required: true);
        $this->fields["price"] = new DecimalFieldValidator(required: true, positive: true);
        $this->fields["type"] = new CharFieldValidator(maxLength: 25, required: true);
    }
}