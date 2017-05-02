<?php
namespace src\library\Observer;
use src\library\Observer\Interfaces\iObservable;
use src\library\Observer\Interfaces\iObserver;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 10.03.2016
 * Time: 15:39
 */
class Login implements iObservable
{
    private $observers=array();
    private $storage;
    const LOGIN_USER_UNKNOWN = 1;
    const LOGIN_WRONG_PASS = 2;
    const LOGIN_ACCESS = 3;
    private $status = array();

    /**
     * Attach function for observers
     *
     * @param iObserver $observer
     */
    function attach( iObserver $observer ) {
        $this->observers[] = $observer;
    }

    /**
     * Detach function for observers
     *
     * @param iObserver $observer     *
     */
    function detach( iObserver $observer ) {
        $this->observers = array_filter( $this->observers, function( $a ) use ( $observer ) {
            return (! ($a === $observer )); });
    }

    /**
     * Trigger the observer
     *
     * Call the doUpdate function from the observer
     */
    function notify(){
        foreach ($this->observers as $obs) {
            $obs->doUpdate($this);
        }
    }

    /**
     * Handle login
     *
     * @param $user
     * @param $pass
     * @param $ip
     * @return bool
     */
    function handleLogin( $user, $pass, $ip ) {
        switch ( rand(1,3) ) {
            case 1:
                $this->setStatus( self::LOGIN_ACCESS, $user, $ip );
                $isvalid = true;
                break;
            case 2:
                $this->setStatus( self::LOGIN_WRONG_PASS, $user, $ip );
                $isvalid = false;
                break;
            case 3:
                $this->setStatus( self::LOGIN_USER_UNKNOWN, $user, $ip );
                $isvalid = false;
                break;
        }
        //trigger the observer
        $this->notify();
        return $isvalid;
    }

    private function setStatus( $status, $user, $ip ) {
        $this->status = array( $status, $user, $ip );
    }

    function getStatus() {
        return $this->status;
    }

}