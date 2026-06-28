
<?php

if(isset($_POST['Register']))
{
    $con = mysqli_connect("localhost","root","","blogging");

    $nm   = $_POST['name'];
    $cont = $_POST['contact'];
    $em   = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $pass = md5($pass);
    $bio  = $_POST['bio'];
    $date = $_POST['date'];

    $i = mysqli_query($con,"INSERT INTO user(name,contact,email,password,bio,date)VALUES('$nm','$cont','$em','$pass','$bio','$date')"
    );

    if($i==1)
    {
?>
<html>
<head>

    <style>
        body{
            margin:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#4facfe,#00f2fe);
            font-family:Arial,sans-serif;
        }

        .card{
            background:white;
            padding:40px;
            border-radius:15px;
            text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
            width:350px;
        }

        h2{
            color:#333;
        }

        p{
            color:#666;
        }

        .btn{
            display:inline-block;
            margin-top:15px;
            padding:12px 25px;
            background:#28a745;
            color:white;
            text-decoration:none;
            border-radius:5px;
        }

        
    </style>
</head>
<body>

<div class="card">
    <h2>Registration Successful!</h2>
    <p>Your account has been created successfully.</p>
    <a href="login.html" class="btn">Go to Login</a>
</div>

</body>
</html>

<?php
    }
    else
    {
?>
<html>
<head>
    <style>
        body{
            margin:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#ff416c,#ff4b2b);
            font-family:Arial,sans-serif;
        }

        .card{
            background:white;
            padding:40px;
            border-radius:15px;
            text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
            width:350px;
        }

        h2{
            color:#333;
        }

        p{
            color:#666;
        }

        .btn{
            display:inline-block;
            margin-top:15px;
            padding:12px 25px;
            background:#dc3545;
            color:white;
            text-decoration:none;
            border-radius:5px;
        }

    </style>
</head>
<body>

<div class="card">
    <h2>Registration Failed!</h2>
    <p>Please try again.</p>
    <a href="reg.html" class="btn">Back to Register</a>
</div>

</body>
</html>

<?php
    }
}
?>
