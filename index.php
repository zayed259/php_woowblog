<?php
if (isset($_GET['page'])) {
    if ($_GET['page'] != '') {
        if (($_GET['page'] == 1)) {
            include_once 'login.php';
        } elseif ($_GET['page'] == 2) {
            include_once 'register.php';
        } elseif ($_GET['page'] == 3) {
            include_once 'logout.php';
        } else {
            include_once '404.php';
        }
    } else {
        include_once 'home.php';
    }
} else {
    include_once 'home.php';
}
