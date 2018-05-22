<?php
session_start();
if(isset($_GET["user_id"])) {
    $username = "root";
    $password = "";
    
    $database = new PDO("mysql:host=localhost;dbname=microposts;charset=UTF8;", $username, $password);
    
    $sql = "SELECT user_id, user_name FROM user_info WHERE user_id=:user_id;";
    $statement = $database->prepare($sql);
    $statement->bindParam(":user_id", $_GET["user_id"]);
    $statement->execute();
    $records = $statement->fetchAll();
    $record = $records[0];
    
    $sql = "SELECT COUNT(message_id) FROM microposts WHERE user_id = :user_id;";
    $statement = $database->prepare($sql);
    $statement->bindParam(":user_id", $_GET["user_id"]);
    $statement->execute();
    $records = $statement->fetchAll();
    $posts_count = $records[0][0];
    if(empty($posts_count)) $followers_count = "0";
    
    $sql = "SELECT COUNT(follow_relation_id) FROM follow WHERE following_user_id = :following_user_id;";
    $statement = $database->prepare($sql);
    $statement->bindParam(":following_user_id", $_GET["user_id"]);
    $statement->execute();
    $records = $statement->fetchAll();
    $followings_count = $records[0][0];
    if(empty($followings_count)) $followers_count = "0";
    
    $sql = "SELECT COUNT(follow_relation_id) FROM follow WHERE followed_user_id = :followed_user_id;";
    $statement = $database->prepare($sql);
    $statement->bindParam(":followed_user_id", $_GET["user_id"]);
    $statement->execute();
    $records = $statement->fetchAll();
    $followers_count = $records[0][0];
    if(empty($followers_count)) $followers_count = "0";
    
    $sql = "SELECT follow_relation_id FROM follow WHERE following_user_id = :following_user_id AND followed_user_id = :followed_user_id;";
    $statement = $database->prepare($sql);
    $statement->bindParam(":following_user_id", $_SESSION["user_id"]);
    $statement->bindParam(":followed_user_id", $_GET["user_id"]);
    $statement->execute();
    $records = $statement->fetchAll();
    $follow_relation_id = $records[0][0];
    
    $statement = null;
    $database = null;
?>
<!DOCTYPE html>
<html>
    <head>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/Lesson12/Microposts/Parts/head.php"); ?>
    </head>
    <body>
        <header>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/Lesson12/Microposts/Parts/header_for_login_user.php"); ?>
        </header>        
        <div class="container">
            <div class="row">
                <aside class="col-xs-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $record["user_name"]; ?></h3>
                        </div>
                        <div class="panel-body">
                            <img class="media-object img-rounded img-responsive" src="https://secure.gravatar.com/avatar/525dbd2277b707e73978941b367855a4?s=500&amp;r=g&amp;d=identicon" alt="">
                        </div>
<?php
    if($_GET["user_id"] != $_SESSION["user_id"]) {
        if(!isset($follow_relation_id)) {
?>
                        <form method="POST" action="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/Systems/follow_system.php" accept-charset="UTF-8">
                            <input type="hidden" name="followed_user_id" value="<?php echo $_GET["user_id"]; ?>">
                            <button class="btn btn-primary btn-block" type="submit" name="action" value="follow">Follow</button>
                        </form>
<?php
        } else {
?>
                        <form method="POST" action="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/Systems/unfollow_system.php" accept-charset="UTF-8">
                            <input type="hidden" name="unfollowed_user_id" value="<?php echo $_GET["user_id"]; ?>">
                            <button class="btn btn-danger btn-block" type="submit" name="action" value="unfollow">Unfollow</button>
                        </form>
<?php
        }
    }
?>
                    </div>
                </aside>
                <div class="col-xs-8">
                    <ul class="nav nav-tabs nav-justified">
                        <li role="presentation" class="active"><a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/profile.php?user_id=<?php echo $_GET["user_id"] ?>">Microposts <span class="badge"><?php echo $posts_count; ?></span></a></li>
                        <li role="presentation" class=""><a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/profile_followings.php?user_id=<?php echo $_GET["user_id"] ?>&relation=followings">Followings <span class="badge"><?php echo $followings_count; ?></span></a></li>
                        <li role="presentation" class=""><a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/profile_followers.php?user_id=<?php echo $_GET["user_id"] ?>&relation=followers">Followers <span class="badge"><?php echo $followers_count; ?></span></a></li>
                    </ul>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/Lesson12/Microposts/Parts/timeline.php"); ?>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
} else {
    http_response_code(404);
    exit;
}
?>