<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="icon" href="../images/logo_dhbkdn.jpg">
        <link rel="stylesheet" href="css/style_login.css">
    </head>
    <body>
        <div class="login-page">
            <div class="form">
                <form class="register-form">
                    <input type="text" placeholder="name"/>
                    <input type="password" placeholder="password"/>
                    <input type="text" placeholder="email address"/>
                    <button>create</button>
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form>
                <form class="login-form" action="index.php?c=auth&a=postLogin" method="POST">
                    <?php if (isset($_SESSION['danger'])):?>
                        <span class="help-block">
                            <strong style="color: red"><?php echo $_SESSION['danger'];?></strong>
                        </span>
                        <?php
                        unset($_SESSION['danger']);
                    endif ?>
                    <input type="text" name="username" placeholder="username"/>
                    <input type="password" name="password" placeholder="password"/>
                    <input style="background:green" type="submit" name="submit" value="Login"/>
                    <p class="message">Not registered? <a href="#">Create an account</a></p>
                </form>
            </div>
        </div>
        <script src='js/jquery-2.2.3.min.js'></script>
        <script>
            $('.message a').click(function(){
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });
        </script>
    </body>
</html>