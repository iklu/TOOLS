<?php
use src\library\Facade\Product;

/**
 * @param $file
 * @return array
 */
function getProductFileLines( $file ) {
    return file( $file );
}

/**
 * @param $id
 * @param $productname
 * @return Product
 */
function getProductObjectFromId( $id, $productname ) {
// some kind of database lookup
    return new Product( $id, $productname );
}

/**
 * @param $line
 * @return mixed|string
 */
function getNameFromLine( $line ) {
    if ( preg_match( "/.*-(.*)\s\d+/", $line, $array ) ) {
        return str_replace( '_',' ', $array[1] );
    }
    return '';
}

/**
 * @param $line
 * @return int
 */
function getIDFromLine( $line ) {
    if ( preg_match( "/^(\d{1,3})-/", $line, $array ) ) {
        return $array[1];
    }
    return -1;
}