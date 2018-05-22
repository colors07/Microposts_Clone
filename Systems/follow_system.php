<?php
session_start();
if ($_POST["action"] == "follow") {
    $username = "root";
    $password = "";

    $database = new PDO("mysql:host=localhost;dbname=microposts;charset=UTF8;", $username, $password);
    
    $sql = "SELECT * FROM follow WHERE following_user_id = :following_user_id AND followed_user_id = :followed_user_id";
    $statement = $database->prepare($sql);
    $statement->bindParam(":following_user_id", $_SESSION["user_id"]);
    $statement->bindParam(":followed_user_id", $_POST["followed_user_id"]);
    $statement->execute();
    $records = $statement->fetchAll();
    
    if (empty($records)) {
        $sql = "INSERT INTO follow (following_user_id, followed_user_id) VALUES(:following_user_id, :followed_user_id)";
        $statement = $database->prepare($sql);
        $statement->bindParam(":following_user_id", $_SESSION["user_id"]);
        $statement->bindParam(":followed_user_id", $_POST["followed_user_id"]);
        $statement->execute();
    }
    
    $statement = null;
    $database = null;
}
http_response_code(301);
header("Location: https://" . $_SERVER["HTTP_HOST"] . "/Lesson12/Microposts/index.php");
exit;