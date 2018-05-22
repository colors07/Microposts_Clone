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
                <h1>Sign up</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form method="POST" action="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/Systems/signup_system.php" accept-charset="UTF-8">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" name="signup_user_name" type="text" id="name">
                        </div>
        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" name="signup_mail_address" type="email" id="email">
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" name="signup_password" type="password" value="" id="password">
                        </div>
                        
                        <div class="form-group">
                            <label for="password_confirmation">Confirmation</label>
                            <input class="form-control" name="signup_password_confirmation" type="password" value="" id="password_confirmation">
                        </div>
                        
                        <button class="btn btn-primary btn-block" type="submit" name="action" value="signup">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>