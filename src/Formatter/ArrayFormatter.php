<?php


namespace Najva\Src\Formatter;


use Najva\Src\Exceptions\FormatterObjectIsEmpty;

class ArrayFormatter implements FormatterInterface
{
    protected $object;

    public function __construct(ObjectFormatterInterface $object)
    {
        $this->object = $object;
    }

    public function formatObject()
    {
        if(empty($this->object) || !count((array)$this->object))
            throw new FormatterObjectIsEmpty("Object is empty for formatting");
        return (array) $this->object->prepareData();
    }
}