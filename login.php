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
            <div class="text-center">
                <h1>Log in</h1>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    
                    <form method="POST" action="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/Systems/login_system.php" accept-charset="UTF-8">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" name="login_mail_address" type="email" id="email">
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" name="login_password" type="password" value="" id="password">
                        </div>
                        
                        <button class="btn btn-primary btn-block" type="submit" name="action" value="login">Log in</button>
                    </form>
                    
                    <p>New user? <a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/signup.php">Sign up now!</a></p>
                </div>
            </div>
        </div>
    </body>
</html>