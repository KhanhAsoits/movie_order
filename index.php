<html>
<body>
<?php
include('header.php');
?>
<section style="background-color: black">
    <div class="container">
        <div class="row p-3">
            <h3 class="font-monospace text-white">Phim Sắp Công Bố</h3>
            <?php
            $qry3 = mysqli_query($con, "SELECT * FROM tbl_news LIMIT 8");

            while ($n = mysqli_fetch_array($qry3)) {

                ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="movie-card">
                        <div class="movie-header"
                             style="background-image: url(admin/<?= $n["attachment"] ?>);background-size: cover">
                            <div class="header-icon-container h-100 d-flex justify-content-center align-items-center">
                                <a href="#">
                                    <i class="fas fs-1 text-white fa-play" style="text-shadow: 1px 2px 10px black"></i>
                                </a>
                            </div>
                        </div><!--movie-header-->
                        <div class="movie-content" style="overflow: hidden;">
                            <a href="">
                                <h5 class="text-center w-100 text-truncate"
                                    style=";white-space:nowrap"><?= $n['name'] ?></h5>
                            </a>
                            <div class="movie-content-header">
                                <div class="w-100">
                                    <p><?= $n['description'] ?></p>
                                </div>
                                <div class="movie-info">
                                    <div class="info-section">
                                        <label class="fw-bold">Thời Gian</label>
                                        <span><?= $n['news_date'] ?></span>
                                    </div><!--date,time-->
                                    <div class="info-section">
                                        <label class="fw-bold">Màn</label>
                                        <span>01</span>
                                    </div><!--screen-->
                                    <div class="info-section">
                                        <label class="fw-bold">Ghế Ngồi</label>
                                        <span>Chưa Công Bố</span>
                                    </div><!--seat-->
                                </div>
                            </div>

                        </div><!--movie-content-->
                    </div><!--movie-card-->
                </div>
            <?php } ?>

        </div>
        <div class="row p-3">
            <h3 class="font-monospace text-white">Phim Nổi Bật</h3>
            <?php
            $qry4 = mysqli_query($con, "SELECT * FROM tbl_movie WHERE  tbl_movie.status = 1 LIMIT 6");
            $count = 0;
            while ($movie = mysqli_fetch_array($qry4)) {
                $count++;
                ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="movie-card">
                        <div class="movie-header"
                             style="background-image: url(<?= $movie["image"] ?>);background-size: cover">
                            <div class="header-icon-container h-100 d-flex justify-content-center align-items-center">
                                <a href="about.php?id=<?= $movie['movie_id'] ?>">
                                    <i class="fas fs-1 text-white fa-play" style="text-shadow: 1px 2px 10px black"></i>
                                </a>
                            </div>
                        </div><!--movie-header-->
                        <div class="movie-content" style="overflow: hidden;">
                            <a href="">
                                <h5 class="text-center w-100 text-truncate"
                                    style=";white-space:nowrap"><?= $movie['movie_name'] ?></h5>
                            </a>
                            <div class="movie-content-header">
                                <div class="w-100">
                                    <p><?= $movie['desc'] ?></p>
                                </div>
                                <div class="movie-info">
                                    <div class="info-section">
                                        <label class="fw-bold">Thời Gian</label>
                                        <span><?= $n['release_date'] ?></span>
                                    </div><!--date,time-->
                                    <?php
                                    $id = $movie['t_id'];
                                    $qry5 = mysqli_query($con, "SELECT * FROM tbl_screens WHERE tbl_screens.t_id = $id");
                                    while ($screen = mysqli_fetch_array($qry5)) {
                                        ?>
                                        <div class="info-section">
                                            <label class="fw-bold">Màn</label>
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
                    </div><!--movie-card-->
                </div>
            <?php }
            if ($count == 0) {
                echo "<h3 class='text-center text-white font-monospace'>Tạm Thời Không Có Phim</h3>";
            }
            ?>
        </div>
        <div class="row p-3">
            <h3 class="font-monospace text-white">Phim Có Thể Đặt</h3>

            <?php
            $list_show = mysqli_query($con, "SELECT movie_id FROM tbl_shows ORDER BY movie_id LIMIT 8");
            while ($movie_id = mysqli_fetch_array($list_show)) {
                ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <?php
                    if ($movie_id['movie_id']) {
                        $id = $movie_id["movie_id"];
                        $movie_query = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id = $id");
                        $movie = mysqli_fetch_array($movie_query);
                        ?>

                        <div class="movie-card">
                            <div class="movie-header"
                                 style="background-image: url(<?= $movie["image"] ?>);background-size: cover">
                                <div class="header-icon-container h-100 d-flex justify-content-center align-items-center">
                                    <a href="about.php?id=<?= $movie['movie_id'] ?>">
                                        <i class="fas fs-1 text-white fa-play"
                                           style="text-shadow: 1px 2px 10px black"></i>
                                    </a>
                                </div>
                            </div><!--movie-header-->
                            <div class="movie-content" style="overflow: hidden;">
                                <a href="">
                                    <h5 class="text-center w-100 text-truncate"
                                        style=";white-space:nowrap"><?= $movie['movie_name'] ?></h5>
                                </a>
                                <div class="movie-content-header">
                                    <div class="w-100">
                                        <p><?= $movie['desc'] ?></p>
                                    </div>
                                    <div class="movie-info">
                                        <div class="info-section">
                                            <label class="fw-bold">Thời Gian</label>
                                            <span><?= $n['release_date'] ?></span>
                                        </div><!--date,time-->
                                        <?php
                                        $id_m = $movie['t_id'];
                                        $qry6 = mysqli_query($con, "SELECT * FROM tbl_screens WHERE tbl_screens.t_id = $id_m");
                                        while ($screen = mysqli_fetch_array($qry6)) {
                                            ?>
                                            <div class="info-section">
                                                <label class="fw-bold">Màn</label>
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
                        </div><!--movie-card-->
                    <?php } // end if?>
                </div>

            <?php } ?>
        </div>
    </div>
</section>

<!--<div class="content">-->
<!--	<div class="wrap">-->
<!--		<div class="content-top">-->
<!--				<div class="listview_1_of_3 images_1_of_3">-->
<!--					<h2 style="color:#555;">Upcoming Movies</h2>-->
<!--					--><?php //
//					$qry3=mysqli_query($con,"SELECT * FROM tbl_news LIMIT 5");
//
//					while($n=mysqli_fetch_array($qry3))
//					{
//					?>
<!--				<div class="content-left">-->
<!--					<div class="listimg listimg_1_of_2">-->
<!--						 <img src="admin/--><?php //echo $n['attachment'];?><!--">-->
<!--					</div>-->
<!--					<div class="text list_1_of_2">-->
<!--						  <div class="extra-wrap">-->
<!--						  	<span style="text-color:#000" class="data"><strong>-->
<?php //echo $n['name'];?><!--</strong><br>-->
<!--						  	<span style="text-color:#000" class="data"><strong>Cast :-->
<?php //echo $n['cast'];?><!--</strong><br>-->
<!--                                <div class="data">Release Date :--><?php //echo $n['news_date'];?><!--</div>-->
<!--                                -->
<!--                                -->
<!--                                -->
<!--                                <span class="text-top">--><?php //echo $n['description'];?><!--</span>-->
<!--                          </div>-->
<!--					</div>-->
<!--					<div class="clear"></div>-->
<!--				</div>-->
<!--				--><?php
//				}
//				?>
<!--				-->
<!--			-->
<!--		</div>				-->
<!--		<div class="listview_1_of_3 images_1_of_3">-->
<!--					<h2 style="color:#555;">Movie Trailers</h2>-->
<!--						<div class="middle-list">-->
<!--					--><?php //
//					$qry4=mysqli_query($con,"SELECT * FROM tbl_movie ORDER BY rand() LIMIT 6");
//
//					while($nm=mysqli_fetch_array($qry4))
//					{
//					?>
<!--					-->
<!--						<div class="listimg1">-->
<!--							 <a target="_blank" href="--><?php //echo $nm['video_url'];?><!--"><img src="-->
<?php //echo $nm['image'];?><!--" alt=""/></a>-->
<!--							 <a target="_blank" href="-->
<?php //echo $nm['video_url'];?><!--" class="link" style="text-decoration:none; font-size:14px;">-->
<?php //echo $nm['movie_name'];?><!--</a>-->
<!--						</div>-->
<!--						--><?php
//					}
//					?>
<!--					</div>-->
<!--					-->
<!--					-->
<!--		</div>			-->
<!--		--><?php //include('movie_sidebar.php');?>
<!--	</div>-->
<!--</div>-->
<!--</div>-->
<?php include('footer.php'); ?>
<?php include('searchbar.php'); ?>