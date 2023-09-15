<?php

namespace App\Services\SuperVisor\Iterators;

use ArrayIterator;
use IteratorAggregate;
use Supervisor\Process;

class SupervisorProcessesIterator implements IteratorAggregate
{
    protected array $data = [];

    public function __construct(array $collection)
    {
        foreach ($collection as $item) {
            $this->data[] = new SupervisorProcessIterator(
                $item['group'],
                $item['statename']
            );
        }
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->data);
    }
}
