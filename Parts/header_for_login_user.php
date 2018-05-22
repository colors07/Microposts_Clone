<?php session_start() ?>
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="navbar-brand" href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/index.php">Microposts Clone</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/users.php">Users</a></li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $_SESSION["user_name"]; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/profile.php?user_id=<?php echo $_SESSION["user_id"] ?>">My profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/Lesson12/Microposts/Systems/logout_system.php">Logout</a></li>
                        </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>