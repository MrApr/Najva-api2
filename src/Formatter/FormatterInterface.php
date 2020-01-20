<?php


namespace Najva\Src\Formatter;


interface FormatterInterface
{
    public function __construct(ObjectFormatterInterface $object);

    public function formatObject();
}