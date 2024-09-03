<?php
session_start();

if (isset($_SESSION['loggedin'])) {
    header("Location: dashboard.php");
}
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../dbcon.php';
    $username = $_POST["email"];
    $password = $_POST["pass"];

    $sql = "Select * from admin where email='$username' AND pass='$password'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $username;
        header("location: dashboard.php");
        

        } else {
            $showError = "Invalid Credentials";
        }
    } else {
        // Handle query error
        $showError = "Query execution failed: " . mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    body{
        background: url("img/admin1.jpg");
    }
    .login {
    min-height: 100vh;
    padding: 3rem 1rem;
    display: flex;
    align-items: center;
    filter: drop-shadow(4px 5px 40px black);
    
}

.login .login-content {
    max-width: 22.5rem;
    margin: 0 auto;
    position: relative;
    flex: 1;
}
.login form input{
    padding:0px 35px
}
.login form .fa-solid{
    position: relative;
    top:43px;
}
</style>
<body>

    <?php
// if ($login) {
//     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
//         <strong>Success!</strong> You are logged in
//         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//             <span aria-hidden="true">×</span>
//         </button>
//     </div>';
// }
// if ($showError) {
//     echo '<div class="alert alert-danger  fade show m-0" role="alert">
//         <strong>Error!</strong> ' . $showError . '
//         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//     </div>';
// }
?>


    <div class="login ">

        <div class="login-content border shadow p-3 rounded">
            <a class="navbar-brand" href="#">
                <h2 class="text-center text-light">Admin Login</h2>
            </a>

            <!-- <h1 class="text-center">Sign In</h1> -->
            <div class="text-white text-opacity-50 text-center mb-4">
                <b><i>For your protection, please verify your identity.</i></b>
            </div>
            <?php
if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>';
}
if ($showError) {
    echo '<div class="alert alert-danger  fade show m-0" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
            <form action="login.php" class="" method="post">
                <div class="mb-3">
                    <label class="form-label text-light">User name <span class="text-danger">*</span></label>
                    <i class="fa-solid fa-user" style="right:78px;"></i>
                    <input type="text" class="form-control form-control-lg bg-white bg-opacity-5 "
                        placeholder="User name" name="email" value="" required>
                </div>
                <div class="mb-3">
                    
                        <label class="form-label text-light">Password <span class="text-danger">*</span></label>
                   
                    <i class="fa-solid fa-lock" style="right:65px;"></i>
                    <input type="password" class="form-control form-control-lg bg-white bg-opacity-5"
                        placeholder="Password" name="pass" value="" required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                    </div>
                </div>
                <button type="submit" class="btn btn-danger btn-lg d-block w-100 fw-500 mb-3">Login In</button>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/4dea96499a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>