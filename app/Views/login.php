<?php
header("Content-type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #001F3F;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        h1 {
            color: white;
            margin-bottom: 20px;
        }

        #signin-box {
            background-color: #003366;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            margin-top: 20px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
            width: 100%;
            margin-right: 100px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .remember-submit {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .remember {
            display: flex;
            align-items: center;
        }

        input[type="checkbox"] {
            width: 15px;
        }

        input[type="submit"] {
            background-color: #ff6600;
            width: 80%; 
            padding: 10px; 
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ff8533;
        }

        .remember label {
           font-size: 14px;
        }

        .forgot {
            margin-top: 10px;
            color: white;
           
        }

       
    </style>
    <title>Signup Page</title>
</head>
<body>
    <h1>Kastam Bond</h1>

    <div id="signin-box">
        <h2>Sign In</h2>
        <form method="post" action="<?= base_url('login/login') ?>">
        <?= csrf_field() ?>

<label for="inputLogname">Login Name</label>
<input type="text" id="inputLogname" name="inputLogname" required placeholder="Login Name">

<label for="inputpassword">Password</label>
<input type="password" id="inputpassword" name="inputpassword" required placeholder="Password">
            
<div class="remember-submit">
                <div class="remember">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>

                    <input type="submit" value="Sign In">
                </div>
                <div class="forgot">
                    <a href="#" style="color: white;">Forgot Password?</a>
                </div>
            </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </form>
</body>
</html>
