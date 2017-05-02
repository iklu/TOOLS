<?php
namespace tests\library\Facade;
use src\library\Facade\ProductFacade;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 22.03.2016
 * Time: 11:13
 */
class FacadeTest extends  \PHPUnit_Framework_TestCase
{
    public function testProductFacade() {
        $facade = new ProductFacade( 'test.txt' );
        $product = $facade->getProduct(234);

        print_r($product);
    }
}