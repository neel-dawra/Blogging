<?php
session_start();

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}

$con = mysqli_connect("localhost","root","","blogging");

$email = $_SESSION['email'];

$user = mysqli_query($con,"SELECT ID FROM user WHERE email='$email'");
$row = mysqli_fetch_assoc($user);

$user_id = $row['ID'];

if(isset($_POST['publish']))
{
    $subject = mysqli_real_escape_string($con,$_POST['subject']);
    $category = $_POST['category'];
    $text = mysqli_real_escape_string($con,$_POST['text']);

    $image = "";

    if(isset($_FILES['myphoto']))
    {
        $extension = strtolower(pathinfo($_FILES['myphoto']['name'], PATHINFO_EXTENSION));

        $image = "demo_".time().".".$extension;

        move_uploaded_file($_FILES['myphoto']['tmp_name'], "images/".$image);
    }

    mysqli_query($con,"INSERT INTO post(user_id,subject,category,text,image,status)VALUES('$user_id','$subject','$category','$text','$image','activated')");

    echo "<script>
            alert('Post Published Successfully!');
            window.location='myblogs.php';
          </script>";
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Post</title>

<meta charset="UTF-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    margin:0;
    background:linear-gradient(to bottom,#9255a5,#b700ff);
}

.sidebar{
    position:fixed;
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
    transition:.3s;
}

.sidebar a:hover{
    background:#0d6efd;
}

.main{
    margin-left:250px;
    padding:40px;
}

.card{
    border:none;
    border-radius:15px;
}

textarea{
    resize:none;
}

</style>

</head>

<body>

<div class="sidebar">

<h3>Blog Author</h3>

<a href="home.php">🏠 Home</a>
<a href="dashboard.php">🖥️ Dashboard</a>
<a href="post.php">➕ Add Post</a>
<a href="myblogs.php">📝 My Blogs</a>
<a href="profile.php">👤 Profile</a>
<a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

<div class="card shadow-lg p-4">

<h2 class="text-center mb-4">Create New Blog Post</h2>

<form method="post" enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">Subject</label>

<input type="text" name="subject" class="form-control" required>

</div>

<div class="mb-3">

<label class="form-label">Category</label>

<select name="category" class="form-select" required>
<option value="">Select Category</option>
<option>Technology</option>
<option>Education</option>
<option>Programming</option>
<option>Sports</option>
<option>Business</option>
<option>Travel</option>
<option>Health</option>
<option>Entertainment</option>
</select>

</div>

<div class="mb-3">

<label class="form-label">Write Your Blog</label>

<textarea name="text" rows="7" class="form-control" required></textarea>

</div>

<div class="mb-3">

<label class="form-label">Image (if needed)</label>

<input type="file" name="myphoto" class="form-control">

</div>

<div class="text-center">

<button type="submit" name="publish" class="btn btn-primary px-5">
Publish Post
</button>

</div>

</form>

</div>

</div>

</body>

</html>