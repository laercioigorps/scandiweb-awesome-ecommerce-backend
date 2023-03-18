<?php
namespace Services\Factories;

interface ProductModelSerializerFactoryInterface{
    public function getModel($data);

    public function getSerializer($data = null, $instance=null);
}
