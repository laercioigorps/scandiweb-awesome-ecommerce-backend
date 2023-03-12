<?php
require_once('../src/serializers/ProductDVDSerializer.php');
require_once('../src/serializers/ProductFurnitureSerializer.php');
require_once('../src/serializers/ProductBookSerializer.php');
class ProductSerializerFactory
{
    public static function getProductSerializer($data)
    {
        if ($data['type'] == 'dvd') {
            $serializer = new ProductDVDSerializer($data);
        } else if ($data['type'] == 'furniture') {
            $serializer = new ProductFurnitureSerializer($data);
        } else if ($data['type'] == 'book') {
            $serializer = new ProductBookSerializer($data);
        }
        return $serializer;
    }
}