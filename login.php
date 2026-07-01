<?php
session_start();

$con = mysqli_connect("localhost","root","","blogging");


if(isset($_POST['Login']))
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $pass = md5($password);

    // Check email first
    $q = mysqli_query($con,"SELECT * FROM user WHERE email='$email'");

    if(mysqli_num_rows($q) > 0)
    {
        $row = mysqli_fetch_assoc($q);
        if($row['user_status']=='activated')
        {
        if($row['password'] == $pass)
        {
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];

            header("Location: dashboard.php");
            exit();
        }
        else
        {
            echo "<script>alert('Invalid Password');</script>";
        }
        }
        else
            {
                echo "<script>alert('Account Deactivated');</script>";
            }
    }
    else
    {
        echo "<script>alert('Email not registered');</script>";
    }
}
    
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            font-family: Arial, sans-serif;
        }

        .card {
            background: white;
            padding: 100px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Login Form</h2>

        <form action="login.php" method="POST">

            <label class="label">Email</label>
            <input type="email" name="email" required><br><br>

            <label class="label">Password</label>
            <input type="password" name="password" required><br><br>

            <input type="submit" name="Login" value="Login">
            
            <p>Don't Have an Account??<a href="reg.html">Register</a></p>
            

        </form>
    </div>
</body>

</html>