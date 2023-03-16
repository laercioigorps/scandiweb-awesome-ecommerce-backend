<?php
namespace Services;

class ProductSerializerFactory
{
    public static function getProductSerializer($data)
    {
        if ($data['type'] == 'dvd') {
            $serializer = new \Serializers\ProductDVDSerializer($data);
        } else if ($data['type'] == 'furniture') {
            $serializer = new \Serializers\ProductFurnitureSerializer($data);
        } else if ($data['type'] == 'book') {
            $serializer = new \Serializers\ProductBookSerializer($data);
        }
        return $serializer;
    }

    public static function getProductSerializerFromProduct($product)
    {
        $type = $product->getType();
        if ($type == 'dvd') {
            $serializer = new \Serializers\ProductDVDSerializer(null, $product);
        } else if ($type == 'furniture') {
            $serializer = new \Serializers\ProductFurnitureSerializer(null, $product);
        } else if ($type == 'book') {
            $serializer = new \Serializers\ProductBookSerializer(null, $product);
        }
        return $serializer;
    }
}