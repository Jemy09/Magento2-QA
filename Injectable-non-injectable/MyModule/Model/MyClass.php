<?php
namespace Vendor\MyModule\Model;

use Vendor\MyModule\Model\InjectableInterface;
use Vendor\MyModule\Model\NonInjectableInterfaceFactory;
use Vendor\MyModule\Model\NonInjectableClass2;

class MyClass
{
    private $injectable;
    private $nonInjectable1;
    private $nonInjectable2;

    public function __construct(InjectableInterface $injectable, NonInjectableInterfaceFactory $nonInjectableFactory)
    {
        $this->injectable = $injectable;
        $this->nonInjectable1 = $nonInjectableFactory;
    }

    public function doSomething( $someParam )
    {
        // Use the injectable object
        $this->injectable->myFunc( $someParam );

        // Now use the non-injectable object initiated in the constructor
        $someResult = $this->nonInjectable1->create()->mySpecialFunc( $someParam );

        // Now use the second non-injectable object wrapped in a conditional statement (just an example)
        if ( $someResult ) {
            $this->nonInjectable2 = new NonInjectableClass2();
            $this->nonInjectable2->doSomethingAgain( $someResult );
        }
        
    }
}