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
     * @param object $object
     * @param string $name
     *
     * @return mixed property of $object->$name.
     */
    public static function snatch_property($object, $name)
    {
        $ref_class = new \ReflectionClass($object);
        $ref_prop  = $ref_class->getProperty($name);
        $ref_prop->setAccessible(true);
        return $ref_prop->getValue($object);
    }
}
