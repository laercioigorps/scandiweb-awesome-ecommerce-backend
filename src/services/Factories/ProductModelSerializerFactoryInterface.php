<?php

namespace Services\Factories;

interface ProductModelSerializerFactoryInterface
{
    public function getModel(array $data);

    public function getSerializer($data = null, $instance = null);
}