<?php
session_start();

$errors=[
    'login'=>$_SESSION['login_error'] ?? '',
    'register'=>$_SESSION['register_error'] ?? ''
];
$activeform = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName == $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Stack Login & Register Form With User & Admin Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
</head>
<body>
    
    <div class="container">
        <div class="form-box <?= isActiveForm('login', $activeform); ?>" id="login-form">
            <form action="Login-Form.php" method="post">
                <h2>Login Form</h2>


                <?= showError($errors['login']); ?>

            <div class="input-container">
                <span class="fa-solid fa-envelope"></span>
                <input type="email" name="email" class="email-input" placeholder="Email" required>
            </div>

            <div class="input-container">
                <span class="fa-solid fa-lock"></span>
                <input type="password" name="password" class="password-input" placeholder="Password" required>
            </div>

                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>


            </form>
        </div>

        <div class="form-box <?= isActiveForm('register', $activeform); ?>" id="register-form">
            <form action="Login-Form.php" method="post">
                <h2>Register Form</h2>


                <?= showError($errors['register']); ?>

                <div class="input-container">
                    <span class="fa-solid fa-user"></span>
                    <input type="text" name="name" class="name-input" placeholder="Name" required>
                </div>

                <div class="input-container">
                    <span class="fa-solid fa-envelope"></span>
                    <input type="email" name="email" class="email-input" placeholder="Email" required>
                </div>

                <div class="input-container">
                    <span class="fa-solid fa-lock"></span>
                    <input type="password" name="password" class="password-input" placeholder="Password" required>
                </div>

                <select name="role" required>
                    <option value="">Select Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>

            </form>
        </div>

    </div>
    <script src="script.js"></script>
</body>
</html>