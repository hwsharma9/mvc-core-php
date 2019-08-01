<?php
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('base_url', "http://" . $_SERVER['SERVER_NAME'].'/test/oop/public/');

require_once ('../app/init.php');

new App;

?>
