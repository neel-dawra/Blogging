<?php
session_start();

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}

$con = mysqli_connect("localhost","root","","blogging");

$email = $_SESSION['email'];

// Get logged-in user's ID
$user = mysqli_query($con,"SELECT ID FROM user WHERE email='$email'");
$row = mysqli_fetch_assoc($user);

$user_id = $row['ID'];

// Get only this user's blogs
$sql = "SELECT * FROM post WHERE user_id='$user_id' ORDER BY blog_id DESC";
$result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>My Blogs</title>

<style>

body{
    margin:0;
    background: linear-gradient(to bottom, #9255a5, #b700ff);
    font-family: Arial, sans-serif;
}

.sidebar{
    position:fixed;
    width:250px;
    height:100vh;
    background:linear-gradient(to bottom, #1f1c2c, #928dab);
}

.sidebar h3{
    color:white;
    text-align:center;
    padding:20px;
    border-bottom:1px solid gray;
    font-size:28px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 25px;
    transition:.3s;
}

.sidebar a:hover{
    background:#0d6efd;
}

.main{
    margin-left:250px;
}

.navbar{
    background:white;
    padding:15px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.navbar h1{
    margin:0;
    color:#333;
}

.container{
    width:75%;
    margin-left:270px;
    padding:20px;
}

.blog{
    background:white;
    padding:20px;
    margin-bottom:20px;
    border-radius:15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.15);
}

.blog h2{
    margin-top:0;
    color:#6a1b9a;
}

.blog p{
    color:#444;
    line-height:1.6;
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

<div class="container">

<h1>My Blogs</h1>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<div class="blog">

<h2><?php echo $row['subject']; ?></h2>

<p><b>Category:</b> <?php echo $row['category']; ?></p>

<p><?php echo $row['text']; ?></p>

</div>

<?php
}
?>

</div>

</body>

</html>