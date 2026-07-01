<?php
    //require ("config.php");
    session_start();

    if(isset($_SESSION['email']))
        {
            $con = mysqli_connect("localhost","root","","blogging");
            $data = mysqli_query($con,"SELECT * from user where email = '{$_SESSION['email']}'");
            $row = mysqli_fetch_assoc($data); 
    ?>
    <head>
    <title>User Profile</title>
</head>

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

.sidebar a:hover{
    background:#0d6efd;
}

.main{
    margin-left:250px;
}

.navbar{
    box-shadow:0 2px 10px rgba(30, 255, 0, 0.94);
}

.card{
    border:none;
    border-radius:15px;
}
</style>
<?php
if($_SESSION['role']=='author') {
?>
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

    <nav class="navbar navbar-light bg-white px-4 py-3">
        <h3>User Profile</h3>

        
    </nav>

    <div class="container mt-5">

        <div class="card shadow-lg p-4">

            <h4 class="mb-4 text-center">Your Details</h4>

            <table class="table table-bordered">

             <tr>
                    <th>ID</th>
                    <td><?php echo $row['ID']; ?></td>
                </tr>
                <tr>
                    <th width="30%">Name</th>
                    <td><?php echo $row['name']; ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?php echo $row['email']; ?></td>
                </tr>

                <tr>
                    <th>Mobile</th>
                    <td><?php echo $row['contact']; ?></td>
                </tr>

                <tr>
                    <th>Bio</th>
                    <td><?php echo $row['bio']; ?></td>
                </tr>

               
                 <tr>
                    <th>Date of Birth</th>
                    <td><?php echo $row['date']; ?></td>
                </tr>

            </table>

            <div class="text-center mt-3">
                <a href="editprofile.php" class="btn btn-primary" name="editprofile">
                    Edit Profile
                </a>
            </div>

        </div>

    </div>

</div>
</body>
<?php

}
else
{
?>
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

    <nav class="navbar navbar-light bg-white px-4 py-3">
        <h3>Admin Profile</h3>
    </nav>

    <div class="container mt-5">

        <div class="card shadow-lg p-4">

            <h4 class="mb-4 text-center">Admin Details</h4>

            <table class="table table-bordered">

                <tr>
                    <th>ID</th>
                    <td><?php echo $row['ID']; ?></td>
                </tr>

                <tr>
                    <th width="30%">Name</th>
                    <td><?php echo $row['name']; ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?php echo $row['email']; ?></td>
                </tr>

                <tr>
                    <th>Mobile</th>
                    <td><?php echo $row['contact']; ?></td>
                </tr>

                <tr>
                    <th>Bio</th>
                    <td><?php echo $row['bio']; ?></td>
                </tr>

                <tr>
                    <th>Date of Birth</th>
                    <td><?php echo $row['date']; ?></td>
                </tr>

            </table>

            <div class="text-center mt-3">
                <a href="editprofile.php" class="btn btn-primary">
                    Edit Profile
                </a>
            </div>

        </div>

    </div>

</div>

</body>

<?php
}
        }
?>