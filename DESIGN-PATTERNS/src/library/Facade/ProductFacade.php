<?php

namespace src\library\Facade;

include_once('functions.php');
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 22.03.2016
 * Time: 11:07
 */
class ProductFacade
{
    /**
     * @var array
     */
    private $products = array();

    /**
     * @param $file
     */
    function __construct( $file ) {
        $this->file = '/var/www/html/PATTERNS/src/library/Facade/'.$file;
        $this->compile();
    }

    /**
     *
     */
    private function compile() {
        $lines = getProductFileLines( $this->file );
        foreach ( $lines as $line ) {
            $id = getIDFromLine( $line );
            $name = getNameFromLine( $line );
            $this->products[$id] = getProductObjectFromID( $id, $name );
        }
    }

    /**
     * @return array
     */
    function getProducts() {
        return $this->products;
    }

    /**
     * @param $id
     * @return null
     */
    function getProduct( $id ) {
        if ( isset( $this->products[$id] ) ) {
            return $this->products[$id];
        }
        return null;
    }
}