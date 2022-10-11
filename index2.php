<?php
class A
{
    public static function quiEstCe()
    {
        print("a");
    }
    public static function appelerQuiEstCe()
    {
        static::quiEstCe();
    }
}
class B extends A
{
    public static function quiEstCe()
    {
        print("b");
    }
    public static function test()
    {
        self::appelerQuiEstCe();
    }
}
class C extends B
{
    public static function quiEstCe()
    {
        print("c");
    }
}
c::test();
