<?php

declare(strict_types=1);

namespace Services\Factories;

interface ProductModelSerializerFactoryInterface
{
    public function getModel(array $data);

    public function getSerializer($data = null, $instance = null);
}