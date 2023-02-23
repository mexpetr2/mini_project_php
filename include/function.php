<?php 

session_start();

function userConnectAndAdmin() {

    if (isset($_SESSION['auth']) && $_SESSION['auth']['role']===1) {
        return true;
    } else {
        return false;
    }

}
?>
