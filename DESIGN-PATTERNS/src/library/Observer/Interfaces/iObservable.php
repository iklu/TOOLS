<?php

namespace src\library\Observer\Interfaces;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 10.03.2016
 * Time: 15:42
 */
interface iObservable
{
    function attach(iObserver $observer);
    function detach(iObserver $observer);
    function notify();
}