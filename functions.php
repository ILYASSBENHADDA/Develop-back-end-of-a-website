<?php

define('USE_LEVEL_ADMIN', '1');

function isAdmin() {
    if ( isset( $_SESSION['userlogin']) && $_SESSION['userlogin'] &&
        USE_LEVEL_ADMIN == $_SESSION['userlogin']['user_level']) { 
       return true;
    } else {
        return false;
    }
}



