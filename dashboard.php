<?php
session_start();

if(!isset($_SESSION['email']))
{
    
header("Location: login.php");
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
<?php 
if($_SESSION['role']=='author'){
?>

<h3>Blog Author</h3>
<a href="dashboard.php">🖥️ Dashboard</a>
<a href="home.php">🏠 Home</a>
<a href="post.php">➕ Add Post</a>
<a href="myblogs.php">📝 My Blogs</a>
<a href="profile.php">👤 Profile</a>
<a href="logout.php">🚪 Logout</a>
<?php }
else{?>

    <h3>Blog Admin</h3>
    <a href="dashboard.php">🖥️ Dashboard</a>
<a href="home.php">🏠 Home</a>
<a href="users.php">👥 Users</a>
<a href="profile.php">👤 Profile</a>
<a href="logout.php">🚪 Logout</a>
<?php } ?>
</div>

<?php
if($_SESSION['role']=='author'){
?>
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
<?php } 
else {
$con = mysqli_connect("localhost","root","","blogging");

$user_query = mysqli_query($con,"SELECT COUNT(*) AS total_users FROM user WHERE role = 'author' AND user_status = 'activated'");
$user_data = mysqli_fetch_assoc($user_query);
$total_users = $user_data['total_users'];

$post_query = mysqli_query($con,"SELECT COUNT(*) AS total_posts FROM post WHERE status = 'activated'");
$post_data = mysqli_fetch_assoc($post_query);
$total_posts = $post_data['total_posts'];
    ?>
<div class="main">

    <nav class="navbar navbar-light bg-white px-3 shadow-sm">
        <h2>Dashboard</h2>

        <div>
            Welcome Admin,
            <b><?php echo $_SESSION['email']; ?></b>
        </div>
    </nav>

    <div class="container mt-5">

        <div class="row">

            <div class="col-md-6 mb-4">
                <div class="card text-white bg-primary shadow-lg">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Users</h5>
                        <h1><?php echo $total_users; ?></h1>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card text-white bg-success shadow-lg">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Posts</h5>
                        <h1><?php echo $total_posts; ?></h1>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?php
}
?>
</body>
</html>