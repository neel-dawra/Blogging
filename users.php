<?php
session_start();

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}

$con = mysqli_connect("localhost","root","","blogging");

// Check whether logged in user is admin
$data = mysqli_query($con,"SELECT * FROM user WHERE email='{$_SESSION['email']}'");
$admin = mysqli_fetch_assoc($data);

if($admin['role'] != "admin")
{
    echo "<h2>Access Denied!</h2>";
    exit();
}

// Fetch all authors/users
$users = mysqli_query($con,"SELECT * FROM user WHERE role='author'");?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Users</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>

body{
    margin:0;
    background: linear-gradient(to bottom, #9255a5, #b700ff);
    min-height:100vh;
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
    padding:30px;
}

.card{
    border:none;
    border-radius:15px;
}

.table{
    background:white;
    border-radius:10px;
    overflow:hidden;
}

.table th{
    background:#6f42c1;
    color:white;
    text-align:center;
}

.table td{
    text-align:center;
    vertical-align:middle;
}

.btn-danger{
    border-radius:20px;
}

</style>

</head>

<body>

<div class="sidebar">

<h3>Blog Admin</h3>
<a href="dashboard.php">🖥️ Dashboard</a>
<a href="home.php">🏠 Home</a>
<a href="users.php">👥 Users</a>
<a href="profile.php">👤 Profile</a>
<a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

<h2>All Users</h2>

<table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Contact</th>
<th>Role</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($users))
{
    if($row['user_status']=='activated'||$row['user_status']=='deactivated')
    {
?>
<tr>

<td><?php echo $row['ID']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['contact']; ?></td>
<td><?php echo $row['role']; ?></td>
<td><?php echo $row['user_status']; ?></td>

<td>

<?php
if($row['role']!="admin")
{
?>
<div>
    
    <a href="deletepost.php?u_id=<?php echo $row['ID'];?>"><button class="btn btn-danger">Toggle</button></a>
</div>

<?php
}
?>

</td>

</tr>

<?php
}
}
?>

</table>

</div>

</body>
</html>