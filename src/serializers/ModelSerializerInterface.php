<?php

declare(strict_types=1);

namespace Serializers;

interface ModelSerializerInterface
{
    public function create();
    public function getInstanceData();
    public function getInstance();
}