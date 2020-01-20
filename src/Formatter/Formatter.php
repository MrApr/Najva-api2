<?php


namespace Najva\Src\Formatter;


class Formatter
{
    public static function format(FormatterInterface $formatter)
    {
        return $formatter->formatObject();
    }
}