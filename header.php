<?php
include('config.php');
session_start();
date_default_timezone_set('Asia/Kathmandu');
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>MOVIET</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4 sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="200"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse  px-md-4" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fs-6 font-monospace" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 font-monospace" href="movies_events.php">MOVIES</a>
                    </li>

                    <?php if (isset($_SESSION['user'])) {
                        $us = mysqli_query($con, "select * from tbl_registration where user_id='" . $_SESSION['user'] . "'");
                        $user = mysqli_fetch_array($us); ?>
                        <li class="nav-item"><a class="nav-link f-6" href="profile.php"><?php echo $user['name']; ?></a>
                        </li>
                        <li class="nav-item"><a
                                    class="nav-link fs-6 font-monospace" href="logout.php">LOGOUT</a></li> <?php } else { ?>
                        <li class="nav-item"><a class="nav-link fs-6 font-monospace" href="login.php">LOGIN</a></li>
                        <li class="nav-item"><a
                                    class="nav-link fs-6 font-monospace" href="registration.php">REGISTER</a></li><?php } ?>
                </ul>
                <form action="process_search.php" class="my-auto" id="reservation-form" method="post" onsubmit="myFunction()">
                    <div class="input-group my-auto">
                        <input type="text" class="form-control" id="search111" name="search"
                               placeholder="Tìm kiếm phim">
                        <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm
                            Kiếm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</div>
<script>
    function myFunction() {
        if ($('#hero-demo').val() == "") {
            alert("Please enter movie name...");
            return false;
        } else {
            return true;
        }
    }
</script>
