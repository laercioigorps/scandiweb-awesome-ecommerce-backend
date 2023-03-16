<?php
namespace Serializers;
interface ModelSerializerInterface
{
    public function create();
    public function getInstanceData();
    public function getInstance();
}