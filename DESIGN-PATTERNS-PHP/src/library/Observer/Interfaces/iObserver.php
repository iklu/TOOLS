<?php
namespace src\library\Observer\Interfaces;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 10.03.2016
 * Time: 15:46
 */
interface iObserver
{
    function update( iObservable $observable );
}