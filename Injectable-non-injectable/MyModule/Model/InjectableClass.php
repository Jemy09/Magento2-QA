<?php
namespace Vendor\MyModule\Model;

use Vendor\MyModule\Model\InjectableInterface;

class InjectableClass implements InjectableInterface
{
    public function myFunc($string_param)
    {
        echo "Function Output: " . $string_param . "\n";
    }
}