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

class PartnershipTool extends LoginObserver
{
    function doUpdate( Login $login ) {
        $status = $login->getStatus();
        // check IP address
        // set cookie if it matches a list
        print __CLASS__.":\tset cookie if IP matches a list\n";
    }
}