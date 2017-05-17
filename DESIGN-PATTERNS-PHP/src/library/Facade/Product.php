<?php

namespace src\library\Facade;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 22.03.2016
 * Time: 11:22
 */
class Product
{
    public $id;
    public $name;
    function __construct( $id, $name ) {
        $this->id = $id;
        $this->name = $name;
    }
}