<?php
session_start();
$_SESSION["user_id"] = null;
http_response_code(301);
header("Location: https://" . $_SERVER["HTTP_HOST"] . "/Lesson12/Microposts/index.php");