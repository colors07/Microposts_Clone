<ul class="media-list">
<?php
session_start();
$username = "root";
$password = "";

$database = new PDO("mysql:host=localhost;dbname=microposts;charset=UTF8;", $username, $password);

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

if ($records) {
    foreach ($records as $record) {
?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="https://secure.gravatar.com/avatar/e79e636c493e13e803ace5afcddb87a5?s=50&amp;r=g&amp;d=identicon" alt="">
        </div>
        <div class="media-body">
            <div>
                <?php echo $record["user_name"]; ?>
            </div>
            <div>
                <p><a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/profile.php?user_id=<?php echo $record["user_id"]; ?>">View profile</a></p>
            </div>
        </div>
    </li>
<?php
    }
}
?>
</ul>