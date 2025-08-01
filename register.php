<?php
include "db.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role']; // admin/user

    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    if (mysqli_query($conn, $query)) {
        echo "Registrasi berhasil. <a href='index.php'>Login di sini</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="post">
    <h2>Register</h2>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Role: 
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit" name="register">Register</button>
</form>

<style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(120deg, #6a11cb, #2575fc);
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
form input[type="password"],
form select {
    width: 100%;
    padding: 12px 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    transition: border 0.3s;
}

form input:focus,
form select:focus {
    border-color: #6a11cb;
}

form button {
    width: 100%;
    padding: 12px;
    background-color: #6a11cb;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

form button:hover {
    background-color: #4a0fb8;
}

form a {
    color: #6a11cb;
    text-decoration: none;
}

form a:hover {
    text-decoration: underline;
}

</style>