<?php session_start(); ?>
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
                <aside class="col-md-4">
                    <form method="POST" action="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/Systems/post_system.php" accept-charset="UTF-8">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="post_message" cols="50"></textarea>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" name="action" value="post">Post</button>
                    </form>
                </aside>
                <div class="col-xs-8">
<?php include($_SERVER["DOCUMENT_ROOT"] . "/Lesson12/Microposts/Parts/timeline.php"); ?>
                </div>
            </div>
        </div>
    </body>
</html>
