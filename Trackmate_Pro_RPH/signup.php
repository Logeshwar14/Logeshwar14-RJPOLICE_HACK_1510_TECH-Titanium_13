<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
</head>
<body>
    <form method="post" action="signup_action.php">
        <h2>SignUp Form</h2>
        <!-- Fullname<br>
        <input type="text" name="name"><br><br> -->
        Email<br>
        <input type="text" name="email" required><br><br>
        Password<br>
        <input type="password" name="password" required><br>
        Already have an account? <a href="login.php">Sign In</a><br><br>
        <input type="submit" value="SignUp"><br>
    </form>
</body>
</html>
