<?php

namespace DivyaGovardhan\PHPUnit;

class Collect
{
    protected $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function keys()
    {
        return array_keys($this->items);
    }

    public function values()
    {
        return array_values($this->items);
    }

    public function get($key)
    {
        return $this->items[$key] ?? null;
    }

    public function except(array $keys)
    {
        return new static(array_diff_key($this->items, array_flip($keys)));
    }

    public function toArray()
    {
        return $this->items;
    }
}