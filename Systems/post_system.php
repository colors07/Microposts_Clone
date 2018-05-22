<?php
session_start();
if ($_POST["action"] == "post" && !empty($_POST["post_message"])) {
    $username = "root";
    $password = "";

    $database = new PDO("mysql:host=localhost;dbname=microposts;charset=UTF8;", $username, $password);
    
    $sql = "INSERT INTO microposts (user_id, message) VALUES(:user_id, :message)";
    $statement = $database->prepare($sql);
    $statement->bindParam(":user_id", $_SESSION["user_id"]);
    $statement->bindParam(":message", nl2br($_POST["post_message"]));
    $statement->execute();
    $statement = null;
    $database = null;
}
http_response_code(301);
header("Location: https://" . $_SERVER["HTTP_HOST"] . "/Lesson12/Microposts/index.php");