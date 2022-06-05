<?php include('header.php'); ?>
<section style="background-color: black">
    <div class="container py-5">
        <div class="row">
            <div class="col-2 col-md-4"></div>
            <div class="col-12 col-md-4 border border-light p-4">
                <?php include ('msgbox.php')?>
                <h4 class="text-white text-center mb-3">ĐĂNG NHẬP</h4>
                <form class="form-group text-center " action="process_login.php" method="POST">

                    <input name="Email" placeholder="Nhập vào email" class="form-control"/>
                    <input name="Password" type="password" placeholder="Nhập vào mật khẩu" class="form-control my-3"/>
                    <button type="submit" class="btn btn-light">ĐĂNG NHẬP</button>
                </form>
            </div>
            <div class="col-2 col-md-4"></div>
        </div>
</section>

<?php include('footer.php'); ?>
