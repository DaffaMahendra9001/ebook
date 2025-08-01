<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];

        if ($data['role'] == 'admin') {
            header("Location: adminDashboard.php");
        } elseif ($data['role'] == 'user') {
            header("Location: userDashboard.php");
        }
    } else {
        echo "Login gagal!";
    }
}
?>

<form method="post">
    <h2>Login</h2>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit" name="login">Login</button>
</form>
<p>Belum punya akun? <a href="register.php">Register di sini</a></p>

<style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(120deg, #2980b9, #6dd5fa);
    height: 100vh;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

form {
    background: #ffffff;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 400px;
}

form h2 {
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

form input[type="text"],
form input[type="password"] {
    width: 100%;
    padding: 12px 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    transition: border 0.3s;
}

form input[type="text"]:focus,
form input[type="password"]:focus {
    border-color: #3498db;
}

form button {
    width: 100%;
    padding: 12px;
    background-color: #3498db;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

form button:hover {
    background-color: #2980b9;
}

form p {
    margin-top: 15px;
    text-align: center;
}

form a {
    color: #3498db;
    text-decoration: none;
}

form a:hover {
    text-decoration: underline;
}

</style>