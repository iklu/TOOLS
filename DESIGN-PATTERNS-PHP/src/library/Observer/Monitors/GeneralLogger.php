<?php
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 16.03.2016
 * Time: 18:08
 */

namespace src\library\Observer\Monitors;
use src\library\Observer\LoginObserver;
use src\library\Observer\Login;

class GeneralLogger extends LoginObserver
{
    function doUpdate( Login $login ) {
        $status = $login->getStatus();
        // add login data to log
        print __CLASS__.":\tadd login data to log\n";
    }
}