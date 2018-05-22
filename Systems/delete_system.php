<?php
session_start();
if ($_POST["action"] == "delete") {
    $username = "root";
    $password = "";

    $database = new PDO("mysql:host=localhost;dbname=microposts;charset=UTF8;", $username, $password);
    
    $sql = "SELECT microposts.message_id,user_info.user_id FROM microposts LEFT JOIN user_info ON microposts.user_id = user_info.user_id WHERE microposts.message_id = :delete_message_id";
    $statement = $database->prepare($sql);
    $statement->bindParam(":delete_message_id", $_POST["delete_message_id"]);
    $statement->execute();
    $records = $statement->fetchAll();
    
    if ($records[0]["user_id"] == $_SESSION["user_id"]) {
        $sql = "DELETE FROM microposts WHERE message_id = :delete_message_id";
        $statement = $database->prepare($sql);
        $statement->bindParam(":delete_message_id", $_POST["delete_message_id"]);
        $statement->execute();
    }
    $statement = null;
    $database = null;
}
http_response_code(301);
header("Location: https://" . $_SERVER["HTTP_HOST"] . "/Lesson12/Microposts/index.php");