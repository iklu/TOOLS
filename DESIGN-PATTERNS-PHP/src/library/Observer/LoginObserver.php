<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 16.03.2016
 * Time: 17:54
 */

namespace src\library\Observer;
use src\library\Observer\Interfaces\iObserver;
use src\library\Observer\Interfaces\iObservable;



abstract class LoginObserver implements iObserver
{
    private $login;

    /**
     * Attach the observer to Login
     *
     * @param Login $login
     */
    function __construct( Login $login ) {
        $this->login = $login;
        $login->attach( $this );
    }

    function update( iObservable $observable ) {
        if ( $observable === $this->login ) {
            $this->doUpdate( $observable );
        }
    }

    abstract function doUpdate( Login $login );
}