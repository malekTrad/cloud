<!DOCTYPE html>
<html>
<head>
<script src="dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="dist/sweetalert2.min.css">

</head>
<body>
<?php
include "dbconnect.php";
$log =mysqli_real_escape_string($connect, $_POST['username']);
$pass = mysqli_real_escape_string($connect,$_POST['password']);

$stmt=$connect->prepare('select * from users where username=? and password=? ');
$stmt->bind_param('ss',$log,$pass);
$stmt->execute();
$result = $stmt->get_result();

session_start();
$_SESSION["name"] = $log;

if ( mysqli_num_rows($result) != 0) {
    ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Welcome',
            confirmButtonText: 'okP',
            showConfirmButton: false,
            timer: 1000
        })  .then((result) => {
            window.location = "comment_page.php";
          })
    </script>
    <?php
} 
 else {
    ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Wrong Login',
            showConfirmButton: false,
            timer: 1500
        })  .then((result) => {
            window.location = "index.php";
            })
    </script>
    <?php
}
?>
</body>
</html>
