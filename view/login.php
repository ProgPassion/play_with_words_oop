<!DOCTYPE html>
<html> 
    <head>
        <title>Play With Languages</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <style>
            html, body {
                margin: 0;
                padding: 0;
                height: 100%;
                font-family: 'Lato', sans-serif;
            }
            .wrapper {
                display: flex;
                height: 100%;
            }
            .landingWallpaper {
                background-image: url("../assets/images/landing_img.jpg");
                background-size: cover;
                width: 50%;
                height: 100%;
            }
            .login {
                background-color: #d1d1ca;
                width: 50%;
                height: 100%;
            }
            table {
                background-color: #424242;
                color: #eee;
                width: 100%;
                padding-top: 100px;
                padding-bottom: 80px;
            }
            td {
                padding: 3px 10px;
                width: 50%;
            }
            input {
                font-size: 18px;
            }
            button {
                width: 40%;
                font-size: 20px;
                padding: 2px;
                font-weight: 900;
                cursor: pointer;
            }
            .main-text {
                text-align: center;
                font-size: 3.5rem;
                color: #7a6d6d;
            }
            .main-article {
                padding: 0 35px;
            }
            .main-article > p {
                font-size: 18px;
            }
        </style>
    </head>
    <body>

        <div class="wrapper">
            <div class="landingWallpaper"></div>
            <div class="login">
                <form action="../controller/login.controller.php" method="POST">
                    <table>
                        <tr>
                            <td colspan="2"><h1 style="text-align: center;">Login</h1></td>
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
                            <td colspan="2" style="text-align: center; padding-top:20px;">
                                <button>Login</button>
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
                </form>
            </div>
        </div>
    </body>   
</html>