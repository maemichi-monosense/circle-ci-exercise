<?php
/**
 * Created by PhpStorm.
 * User: Yuya
 * Date: 2016/07/20
 * Time: 12:17
 */

namespace UnitTest\Sample\Test;

class TestUtil
{
    /**
     * @see \ReflectionClass
     * @see \ReflectionProperty
     *
     * @param object|string $object
     * @param string        $name
     *
     * @return mixed
     */
    public static function snatch_property($object, $name)
    {
        $ref_class = new \ReflectionClass($object);
        return $ref_class->getProperty($name)->getValue();
    }
}
