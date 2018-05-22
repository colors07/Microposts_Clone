<?php
session_start();
if (isset($_SESSION["user_id"])) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Lesson12/Microposts/main.php");
} else {
    include($_SERVER["DOCUMENT_ROOT"] . "/Lesson12/Microposts/welcom.php");
}
?>