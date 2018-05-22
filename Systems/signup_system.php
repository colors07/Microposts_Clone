<?php
if ($_POST["action"] == "signup" && !empty($_POST["signup_user_name"]) && !empty($_POST["signup_mail_address"]) && !empty($_POST["signup_password"])) {
    $username = "root";
    $password = "";

    $database = new PDO("mysql:host=localhost;dbname=microposts;charset=UTF8;", $username, $password);
    
    $sql = "SELECT * FROM user_info WHERE mail_address = :mail_address";
    $statement = $database->prepare($sql);
    $statement->bindParam(":mail_address", $_POST["signup_mail_address"]);
    $statement->execute();
    $records = $statement->fetchAll();
    
    if (empty($records)) {
        $sql = "INSERT INTO user_info (user_name, mail_address, password) VALUES(:user_name, :mail_address, :password)";
        $statement = $database->prepare($sql);
        $statement->bindParam(":user_name", $_POST["signup_user_name"]);
        $statement->bindParam(":mail_address", $_POST["signup_mail_address"]);
        $statement->bindParam(":password", $_POST["signup_password"]);
        $statement->execute();
    }
    
    $statement = null;
    $database = null;
}
http_response_code(301);
header("Location: https://" . $_SERVER["HTTP_HOST"] . "/Lesson12/Microposts/index.php");