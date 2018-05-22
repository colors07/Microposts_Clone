<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=microposts;charset=UTF8;", $username, $password);

if(isset($_GET["user_id"])) {
    $sql = "SELECT microposts.message_id,microposts.message,microposts.posted_at,user_info.user_id,user_info.user_name FROM microposts LEFT JOIN user_info ON microposts.user_id = user_info.user_id WHERE user_info.user_id = :user_id ORDER BY microposts.posted_at DESC";
    $statement = $database->prepare($sql);
    $statement->bindParam(":user_id", $_GET["user_id"]);
    $statement->execute();
    $records = $statement->fetchAll();
} else {
    session_start();
    
    $sql = "SELECT followed_user_id FROM follow WHERE following_user_id = :following_user_id;";
    $statement = $database->prepare($sql);
    $statement->bindParam(":following_user_id", $_SESSION["user_id"]);
    $statement->execute();
    $follow_list = $statement->fetchAll();
    
    $sql = "SELECT microposts.message_id,microposts.message,microposts.posted_at,user_info.user_id,user_info.user_name FROM microposts LEFT JOIN user_info ON microposts.user_id = user_info.user_id WHERE user_info.user_id = :user_id ";
    for ($i = 0; $i < count($follow_list); $i++) {
        $sql = $sql . "OR user_info.user_id = :user_id_" . $i . " ";
    }
    $sql = $sql . "ORDER BY microposts.posted_at DESC";
    $statement = $database->prepare($sql);
    $statement->bindParam(":user_id", $_SESSION["user_id"]);
    for ($i = 0; $i < count($follow_list); $i++) {
        $bindString = ":user_id_" . $i;
        $statement->bindParam($bindString, $follow_list[$i]["followed_user_id"]);
    }
    $statement->execute();
    $records = $statement->fetchAll();
}
$statement = null;
$database = null;
    
if ($records) {
    foreach ($records as $record) {
?>
<ul class="media-list">
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="https://secure.gravatar.com/avatar/525dbd2277b707e73978941b367855a4?s=50&amp;r=g&amp;d=identicon" alt="">
        </div>
        <div class="media-body">
            <div>
                <a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/profile.php?user_id=<?php echo $record["user_id"] ?>"><?php echo $record["user_name"]; ?></a> <span class="text-muted"><?php echo $record["posted_at"]; ?></span>
            </div>
            <div>
                <?php print $record["message"]; ?>
            </div>
<?php
        if ($record["user_id"] == $_SESSION["user_id"]) {
?>
            <div>
                <form method="POST" action="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/Systems/delete_system.php" accept-charset="UTF-8">
                    <input name="delete_message_id" type="hidden" value="<?php print $record["message_id"]; ?>">
                    <button class="btn btn-danger btn-xs" type="submit" name="action" value="delete">Delete</button>
                </form>
            </div>
<?php
        }
?>
        </div>
    </li>
</ul>
<?php
    }
}
?>