<?php

namespace src\library\Observer\Monitors;
use src\library\Observer\LoginObserver;
use src\library\Observer\Login;
/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 10.03.2016
 * Time: 15:47
 */
class SecurityMonitor extends LoginObserver
{
    function doUpdate( Login $login ) {
        $status = $login->getStatus();
        if ( $status[0] == Login::LOGIN_WRONG_PASS ) {
            // send mail to sysadmin
            print __CLASS__.":\tsending mail to sysadmin\n";
        }
    }
}