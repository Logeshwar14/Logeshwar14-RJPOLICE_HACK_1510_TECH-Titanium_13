<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <form method="post" action="login_action.php">
        <div class="form-box">
            <div id="form">
                <h2>Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="Email"
                           name="email" autocomplete="off" required>
                    <label for="email">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password"
                           name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="forget">
                    <label><input type="checkbox">Remember Me? <a href="#">Forgot Password</a></label>
                </div>
                <button class="btn" type="submit" value="Login">Log in</button>
                <!-- <div class="register">
                    <p>Want to add new admin? <a href="signup.php">Add Admin</a></p>
                </div> -->
            </div>
        </div>
    </form>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

