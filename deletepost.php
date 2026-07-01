<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "blogging");

if (isset($_GET['id'])) {

    $id = (int)$_GET['id'];
    $data = mysqli_query($con, "SELECT status FROM post WHERE blog_id = $id");
    $row = mysqli_fetch_assoc($data);

    if ($row) {

        if ($row['status'] == 'activated') {

            mysqli_query($con, "UPDATE post SET status = 'deactivated' WHERE blog_id = $id");

        } else {

            mysqli_query($con, "UPDATE post SET status = 'activated' WHERE blog_id = $id");

        }
    }

    header("Location: home.php");
    exit();
}
?>


<?php
session_start();
if (isset($_GET['u_id'])) {

    $id = (int)$_GET['u_id'];
    $result = mysqli_query($con, "SELECT user_status FROM user WHERE ID = $id");
    $row = mysqli_fetch_assoc($result);

    if ($row) {

        if ($row['user_status'] == 'activated') {

            mysqli_query($con, "UPDATE user SET user_status = 'deactivated' WHERE ID = $id");

        } else {

            mysqli_query($con, "UPDATE user SET user_status = 'activated' WHERE ID = $id");

        }
    }

    header("Location: users.php");
    exit();
}
?>

