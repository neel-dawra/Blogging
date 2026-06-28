<?php
session_start();

if(!isset($_SESSION['email']))
{
    
header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    margin:0;
background: linear-gradient(to bottom, #9255a5, #b700ff);
}

.sidebar{
    position:fixed;
    width:250px;
    height:100vh;
    background:linear-gradient(to bottom, #1f1c2c, #928dab);;
}

.sidebar h3{
    color:white;
    text-align:center;
    padding:20px;
    border-bottom:1px solid gray;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 25px;
    transition:.3s;
}

.main{
    margin-left:250px;
}

.card{
    border:none;
    border-radius:15px;
}


</style>

</head>

<body>


<div class="sidebar">

<h3>Blog Admin</h3>
<a href="home.php">🏠 Home</a>
<a href="dashboard.php">🖥️ Dashboard</a>
<a href="post.php">➕ Add Post</a>
<a href="myblogs.php">📝 My Blogs</a>
<a href="profile.php">👤 Profile</a>
<a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

<nav class="navbar navbar-light bg-white px-3">

<h1>Dashboard</h1>

<div>
Welcome,
<b><?php echo $_SESSION['email']; ?></b>
</div>

</nav>

<div class="container mt-4">

<div class="container mt-5">

    <div class="card shadow-lg border-0 p-5 text-center">

        <hr>    

        <h1 class="text-secondary">
            Happy Blogging!
        </h1>

        <p class="mt-2 text-muted">
            Share your thoughts, ideas, and stories with the world.
        </p>

        <hr>

    </div>

</div>

<br>

</div>

</div>

</body>
</html>