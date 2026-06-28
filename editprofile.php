<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$con = mysqli_connect("localhost", "root", "", "blogging");

$email = $_SESSION['email'];

if (isset($_POST['editprofile'])) {

    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];

    $query = "UPDATE user
              SET name='$name',
                  contact='$contact',
                    date='$date'
              WHERE email='$email'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Profile Updated Successfully');</script>";
    } else {
        echo "<script>alert('Update Failed');</script>";
    }
}

$data = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>

<title>Update Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>

body{
    margin:0;
    padding:0;
    background:linear-gradient(to bottom,#9255a5,#b700ff);
}

.sidebar{
    position:fixed;
    padding:0;
    width:250px;
    height:100vh;
    background:linear-gradient(to bottom,#1f1c2c,#928dab);
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
}

.sidebar a:hover{
    background:#0d6efd;
}

.main{
    margin-left:250px;
    padding:0;
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

<div class="container mt-0">

<div class="card shadow p-4">

<h3 class="text-center mb-4">Update Profile</h3>

<form method="post">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control"
value="<?php echo $row['name']; ?>" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" class="form-control"
value="<?php echo $row['email']; ?>" readonly>
</div>

<div class="mb-3">
<label>Contact</label>
<input type="text" name="contact" class="form-control"
value="<?php echo $row['contact']; ?>">
</div>

<div class="mb-3">
<label>Date of Birth</label>
<input type="date" name="date" class="form-control"
value="<?php echo $row['date']; ?>">
</div>
</div>

<div class="text-center">
    <br>
<button type="submit" name="editprofile" class="btn btn-primary">
    Update Profile
</button>

<a href="profile.php" class="btn btn-secondary">
    Back
</a>

</div>

</form>

</div>

</div>

</div>

</body>
</html>