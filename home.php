<?php
session_start();
    $con = mysqli_connect("localhost","root","","blogging");
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Home</title>
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
    font-size: 28px;
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

.container{
    width:75%;
    margin-left:270px;
    padding:20px;
}

.blog{
    background:white;
    padding:20px;
    margin-top:20px;
    border-radius:10px;
    box-shadow:0px 0px 10px lightgray;
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
</div>

<div class="container">

<h1>All Blogs</h1>

<?php

$sql="SELECT * FROM post ORDER BY blog_id DESC";

$result=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($result))
{
if($row['status']=='activated')
    {
?>

<div class="blog">

<h2><?php echo $row['subject']; ?></h2>

<b>Category :</b>
<?php echo $row['category']; ?>

<br><br>

<?php echo $row['text']; ?>

<br><br>

<b>Posted By User ID :</b>

<?php echo $row['user_id']; ?>

</div>

<?php
}}
}
else
{
?>
<h3>Blog Admin</h3>
<a href="dashboard.php">🖥️ Dashboard</a>
<a href="home.php">🏠 Home</a>
<a href="users.php">👥 Users</a>
<a href="profile.php">👤 Profile</a>
<a href="logout.php">🚪 Logout</a>
</div>

<div class="container" >

<h1>All Blogs</h1>

<?php

$sql="SELECT * FROM post ORDER BY blog_id DESC";

$result=mysqli_query($con,$sql);


while($row=mysqli_fetch_assoc($result))
{

?>

<div class="blog">


<h2><?php echo $row['subject']; ?></h2>

<b>Category :</b>
<?php echo $row['category']; ?>

<br><br>

<?php echo $row['text']; ?>

<br><br>

<b>Posted By User ID :</b>

<?php echo $row['user_id']; ?>
<br>
<br>
<b>Status: </b>
<?php echo $row['status']; ?>
<br>
<br>
<div class="d-flex justify-content-start">
    
    <a href="deletepost.php?id=<?php echo $row['blog_id'];?>"><button class="btn btn-danger">Toggle</button></a>
</div>



</div>

<?php
}}
?>


</body>
</html>