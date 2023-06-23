<?php
define("ROOT", substr($_SERVER['PHP_SELF'], 0,-9));
include "core/DB.php";
DB::createInstance();
DB::connect("localhost", "root", "", "music");
include "config/config.php";
include "controllers/Controller.php";
include "controllers/PostController.php";
include "models/Post.php";
include "core/Router.php";
include "middleware/CSRF.php";
include "core/web.php";
?>