<?php

namespace Core\Traits;

trait Hydratable
{
    public function __construct(array $data = null)
    {
        if (!is_null($data)) {
            foreach ($data as $property => $value) {
                if (property_exists($this, $property)) {
                    $this->$property = $value;
                }
            }
        }
    }
}
