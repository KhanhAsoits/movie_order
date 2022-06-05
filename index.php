<html>
<?php
include('header.php');
?>
<body>

<section style="background-color: black">
    <div class="container py-5">
        <div class="row p-3 text-center">
            <h1 class="font-monospace text-white">Phim Sắp Công Bố</h1>
            <?php
            $qry3 = mysqli_query($con, "SELECT * FROM tbl_news LIMIT 8");

            while ($n = mysqli_fetch_array($qry3)) {

                ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="movie-card">
                        <a  href="#" class="text-decoration-none">
                        <div class="movie-header"
                             style="background-image: url(admin/<?= $n["attachment"] ?>);background-size: cover">
                            <div class="header-icon-container h-100 d-flex justify-content-center align-items-center">
                                <i class="fas fs-1 text-white fa-play" style="text-shadow: 1px 2px 10px black"></i>
                            </div>
                        </div><!--movie-header-->
                        <div class="movie-content" style="overflow: hidden;">
                            <h5 class="text-center w-100 font-monospace text-truncate"
                                style=";white-space:nowrap"><?= $n['name'] ?></h5>
                            <div class="movie-content-header">
                                <div class="w-100 " style="overflow: hidden;height: 150px;text-overflow: ellipsis">
                                    <p class="font-monospace text-dark"><?= $n['description'] ?></p>
                                </div>
                                <div class="movie-info">
                                    <div class="info-section">
                                        <label class="fw-bold">Thời Gian</label>
                                        <span><?= $n['news_date'] ?></span>
                                    </div><!--date,time-->
                                    <div class="info-section">
                                        <label class="fw-bold">Rạp phim</label>
                                        <span>01</span>
                                    </div><!--screen-->
                                    <div class="info-section">
                                        <label class="fw-bold">Ghế Ngồi</label>
                                        <span>Chưa Công Bố</span>
                                    </div><!--seat-->
                                </div>
                            </div>
                        </div><!--movie-content-->
                        </a>
                    </div><!--movie-card-->
                </div>
            <?php } ?>

        </div>
        <div class="row p-3 text-center">
            <h1 class="font-monospace text-white">Phim Nổi Bật</h1>
            <?php
            $qry4 = mysqli_query($con, "SELECT * FROM tbl_movie WHERE  tbl_movie.status = 1 LIMIT 6");
            $count = 0;
            while ($movie = mysqli_fetch_array($qry4)) {
                $count++;
                ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="movie-card">
                        <a  href="about.php?id=<?= $movie['movie_id']?>" class="text-decoration-none">
                        <div class="movie-header"
                             style="background-image: url(<?= $movie["image"] ?>);background-size: cover">
                            <div class="header-icon-container h-100 d-flex justify-content-center align-items-center">
                                <i class="fas fs-1 text-white fa-play" style="text-shadow: 1px 2px 10px black"></i>
                            </div>
                        </div><!--movie-header-->
                        <div class="movie-content" style="overflow: hidden;">
                            <h5 class="text-center w-100 text-truncate font-monospace"
                                style=";white-space:nowrap"><?= $movie['movie_name'] ?></h5>
                            <div class="movie-content-header">
                                <div class="w-100" style="overflow: hidden;height: 150px;text-overflow: ellipsis">
                                    <p class="text-dark"><?= $movie['desc'] ?></p>
                                </div>
                                <div class="movie-info">
                                    <div class="info-section">
                                        <label class="fw-bold">Thời Gian</label>
                                        <span><?= $movie['release_date'] ?></span>
                                    </div><!--date,time-->
                                    <?php
                                    $id = $movie['t_id'];
                                    $qry5 = mysqli_query($con, "SELECT * FROM tbl_screens WHERE tbl_screens.t_id = $id");
                                    while ($screen = mysqli_fetch_array($qry5)) {
                                        ?>
                                        <div class="info-section">
                                            <label class="fw-bold">Rạp phim</label>
                                            <span><?= $screen['screen_name'] ?></span>
                                        </div><!--screen-->
                                        <div class="info-section">
                                            <label class="fw-bold">Ghế Ngồi</label>
                                            <span><?= $screen['seats'] ?></span>
                                        </div><!--seat-->
                                    <?php } ?>
                                </div>
                            </div>
                        </div><!--movie-content-->
                        </a>
                    </div><!--movie-card-->
                </div>
            <?php }
            if ($count == 0) {
                echo "<h3 class='text-center text-white font-monospace'>Tạm Thời Không Có Phim</h3>";
            }
            ?>
        </div>
        <div class="row p-3 text-center">
            <h1 class="font-monospace text-white">Phim Chiếu Hôm Nay</h1>

            <?php
            $count_t = 0;

            $list_show = mysqli_query($con, "SELECT st_id,movie_id FROM tbl_shows WHERE status = 1  ORDER BY movie_id LIMIT 8");
            while ($movie_shows = mysqli_fetch_array($list_show)) {
                $count_t++;
                ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <?php
                    if ($movie_shows['movie_id']) {
                        $id = $movie_shows["movie_id"];
                        $movie_query = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id = $id");
                        $movie = mysqli_fetch_array($movie_query);
                        ?>

                        <div class="movie-card">
                            <a  href="about.php?id=<?= $movie['movie_id']?>" class="text-decoration-none">
                            <div class="movie-header"
                                 style="background-image: url(<?= $movie["image"] ?>);background-size: cover">
                                <div class="header-icon-container h-100 d-flex justify-content-center align-items-center">
                                    <i class="fas fs-1 text-white fa-play"
                                       style="text-shadow: 1px 2px 10px black"></i>
                                </div>
                            </div><!--movie-header-->
                            <div class="movie-content" style="overflow: hidden;">
                                <h5 class="text-center w-100 text-truncate font-monospace"
                                    style=";white-space:nowrap"><?= $movie['movie_name'] ?></h5>
                                <div class="movie-content-header">
                                    <div class="w-100" style="overflow: hidden;height: 150px;text-overflow: ellipsis">
                                        <p class="text-dark"><?= $movie['desc'] ?></p>
                                    </div>
                                    <div class="movie-info">
                                        <div class="info-section">
                                            <label class="fw-bold">Thời Gian</label>
                                            <?php
                                                $st_id = $movie_shows['st_id'];
                                                $show_time_query = mysqli_query($con,"SELECT start_time from tbl_show_time WHERE st_id = $st_id");
                                                $show_time = mysqli_fetch_array($show_time_query);
                                            ?>
                                            <span><?= $show_time['start_time'] ?></span>
                                        </div><!--date,time-->
                                        <?php
                                        $id_m = $movie['t_id'];
                                        $qry6 = mysqli_query($con, "SELECT * FROM tbl_screens WHERE tbl_screens.t_id = $id_m");
                                        while ($screen = mysqli_fetch_array($qry6)) {
                                            ?>
                                            <div class="info-section">
                                                <label class="fw-bold">Rạp phim</label>
                                                <span><?= $screen['screen_name'] ?></span>
                                            </div><!--screen-->
                                            <div class="info-section">
                                                <label class="fw-bold">Ghế Ngồi</label>
                                                <span><?= $screen['seats'] ?></span>
                                            </div><!--seat-->
                                        <?php } ?>
                                    </div>
                                </div>
                            </div><!--movie-content-->
                            </a>
                        </div><!--movie-card-->
                    <?php } // end if?>
                </div>

            <?php }
                if ($count_t == 0){
                    echo "<h3 class='text-center text-white font-monospace'>Tạm Thời không có phim</h3>";
                }
            ?>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>
<?php include('searchbar.php'); ?>