<?php
    require_once '../libs/session.handler.php';
?>
<!DOCTYPE html>
<html> 
    <head>
        <title>Play With Languages</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.login.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="landingWallpaper"></div>
            <div class="signin">
                <form action="../controller/signin.controller.php" method="POST">
                    <table>
                        <tr>
                            <td colspan="2"><h1 style="text-align: center;">Sign in</h1></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="username">Username: </label></td>
                            <td><input id="username" type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="password">Password: </label></td>
                            <td><input id="password" type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="repeatPassword">Repeat Password: </label></td>
                            <td><input id="repeatPassword" type="password" name="repeatPassword"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center; padding-top:20px;">
                                <button>Sign in</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <?php if(Session::exists("signinError")): ?>
                                    <h3 class="error-signin-msg"><?php echo Session::flash("signinError") ?></h3>
                                <?php endif ?>
                            </td>
                        </tr>
                    </table>
                    <div class="main-article">
                        <h1 class="main-text">Play with words</h1>
                        <p>
                            Is a WebApp that helps you to learn easier and in funny approach way your favourite languages.
                            It will be your own personalized dictionary! If you dont have a login account you are invited to sign up
                            and you will discover how satisfying is the learning process.
                        </p>
                    </div>
                    <div class="login-link">
                        <a href="login.php">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </body>   
</html>