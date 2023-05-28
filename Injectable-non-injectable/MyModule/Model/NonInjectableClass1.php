<?php
namespace Vendor\MyModule\Model;

class NonInjectableClass1 implements NonInjectableInterface
{
    public function mySpecialFunc($message)
    {
        echo "Special Function Output: " . $message . "\n";
    }
}