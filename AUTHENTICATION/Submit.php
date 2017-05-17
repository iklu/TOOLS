<?php
require_once 'Cookie.php';
require_once 'Authentication.php';

if (isset($_POST["name"])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $uri = $_REQUEST['originating_uri'];
}
if (!isset($uri)) {
    $uri = '/';
}
try {
    $userid = Authentication::check_credentials ($name, $password);
    $cookie = new Cookie($userid);
    $cookie->set();
    header("Location: $uri");
    exit;
} catch (AuthException $e) {
    echo "err";
}
?>
