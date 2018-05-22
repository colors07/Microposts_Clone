<?php
if ($_POST["action"] == "login" && !empty($_POST["login_mail_address"]) && !empty($_POST["login_password"])) {
    $username = "root";
    $password = "";

    $database = new PDO("mysql:host=localhost;dbname=microposts;charset=UTF8;", $username, $password);
    
    $sql = "SELECT * FROM user_info WHERE mail_address = :mail_address";
    $statement = $database->prepare($sql);
    $statement->bindParam(":mail_address", $_POST["login_mail_address"]);
    $statement->execute();
    $records = $statement->fetchAll();
    
    var_dump($records);
    
    if (!empty($records)) {
        $record = $records[0];
        if ($record["password"] == $_POST["login_password"]) {
            session_start();
            
            $_SESSION["user_id"] = $record["user_id"];
            $_SESSION["user_name"] = $record["user_name"];
        }
    }
    
    $statement = null;
    $database = null;
}
http_response_code(301);
header("Location: https://" . $_SERVER["HTTP_HOST"] . "/Lesson12/Microposts/index.php");