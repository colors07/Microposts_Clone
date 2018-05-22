<?php
/*
function isFollow($follower_id, $target_id) {
    $username = "root";
    $password = "";
    
    $database = new PDO("mysql:host=localhost;dbname=microposts;charset=UTF8;", $username, $password);
    
    $sql = "SELECT user_info.user_id, user_info.user_name FROM follow LEFT JOIN user_info ON follow.followed_user_id = user_info.user_id WHERE follow.following_user_id = :following_user_id ORDER BY user_info.user_id ASC;";
    $statement = $database->prepare($sql);
    $statement->bindParam(":following_user_id", $_GET["user_id"]);
    $statement->execute();
    $records = $statement->fetchAll();
    
    
    if ($_GET["relation"]=="followings") {
        $sql = "SELECT user_info.user_id, user_info.user_name FROM follow LEFT JOIN user_info ON follow.followed_user_id = user_info.user_id WHERE follow.following_user_id = :following_user_id ORDER BY user_info.user_id ASC;";
        $statement = $database->prepare($sql);
        $statement->bindParam(":following_user_id", $_GET["user_id"]);
        $statement->execute();
        $records = $statement->fetchAll();
    } else if ($_GET["relation"]=="followers") {
        $sql = "SELECT user_info.user_id, user_info.user_name FROM follow LEFT JOIN user_info ON follow.following_user_id = user_info.user_id WHERE follow.followed_user_id = :followed_user_id ORDER BY user_info.user_id ASC;";
        $statement = $database->prepare($sql);
        $statement->bindParam(":followed_user_id", $_GET["user_id"]);
        $statement->execute();
        $records = $statement->fetchAll();
    } else {
        $sql = "SELECT user_id, user_name FROM user_info;";
        $statement = $database->query($sql);
        $records = $statement->fetchAll();
    }
    $statement = null;
    $database = null;
}
*/