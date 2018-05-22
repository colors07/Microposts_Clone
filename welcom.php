<!DOCTYPE html>
<html>
    <head>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/Lesson12/Microposts/Parts/head.php"); ?>
    </head>
    <body>
        <header>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/Lesson12/Microposts/Parts/header_for_logout_user.php"); ?>
        </header>        
        <div class="container">
            <div class="center jumbotron">
                <div class="text-center">
                    <h1>Welcome to the Microposts Clone</h1>
                    <a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/signup.php" class="btn btn-lg btn-primary">Sign up now!</a>
                </div>
            </div>
        </div>
    </body>
</html>