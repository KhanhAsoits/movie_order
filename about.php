<?php include('header.php');
$qry2 = mysqli_query($con, "select * from tbl_movie where movie_id='" . $_GET['id'] . "'");
$movie = mysqli_fetch_array($qry2);
?>
    <section style="background-color: black">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <h4 class="text-white text-start mb-5"><a href="about.php?id=<?= $movie['movie_id'] ?>"
                                                                  class=" text-center nav-link border text-white border-white py-2 font-monospace"><?= $movie['movie_name'] ?></a>
                        </h4>
                        <div class="col-12 col-lg-6">
                            <img src="<?= $movie['image'] ?>" class="img-fluid">
                        </div>
                        <div class="col-12 col-lg-6">
                            <ul class="list-unstyled my-5 my-lg-0">
                                <li class="nav-item font-monospace py-1">
                                    <span class="text-white fw-bold fs-6 text-uppercase">Tên Phim : </span> <span
                                            class="fs-6 text-muted"><?= $movie['movie_name'] ?></span>
                                </li>
                                <li class="nav-item font-monospace  py-1">
                                    <span class="text-white fw-bold fs-6 text-uppercase">Diễn Viên : </span> <a href="#"
                                                                                                                class=" d-inline fs-6 text-muted"><?= $movie['cast'] ?></a>
                                </li>
                                <li class="nav-item font-monospace py-1">
                                    <span class="text-white fw-bold fs-6 text-uppercase">Ngày Khởi Chiếu : </span> <span
                                            href="#"
                                            class=" d-inline fs-6 text-muted"><?= $movie['release_date'] ?></span>
                                </li>
                                <li class="nav-item font-monospace py-1">
                                    <span class="text-white fw-bold fs-6 text-uppercase">Giới thiệu : </span> <span
                                            href="#" class=" d-inline fs-6 text-muted"><?= $movie['desc'] ?></span>
                                </li>

                                <li class="nav-item font-monospace my-3">
                                    <button class="btn btn-outline-danger text-white" data-bs-toggle="modal"
                                            data-bs-target="#trailerModal">Xem Trailer
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-12">
                            <?php
                            $movie_id = $movie['movie_id'];
                            $show_theatre = mysqli_query($con, "SELECT DISTINCT theatre_id FROM tbl_shows WHERE status = 1 and movie_id = $movie_id");
                            $count = mysqli_num_rows($show_theatre);
                            if ($count > 0) {
                                ?>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-white">TÊN RẠP</th>
                                        <th class="text-white">THỜI GIAN</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($theatre_id = mysqli_fetch_array($show_theatre)) {
                                        ?>
                                        <tr>
                                            <?php
                                            $t_id = $theatre_id['theatre_id'];
                                            $theatre = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tbl_theatre WHERE id = $t_id"))
                                            ?>
                                            <th class="text-center text-white"><?= $theatre['name'] ?></th>
                                            <?php
                                            $show_time_id = mysqli_query($con, "SELECT s_id,st_id FROM tbl_shows WHERE status = 1 AND theatre_id = $t_id AND movie_id = $movie_id");
                                            while ($show_t_id = mysqli_fetch_array($show_time_id)) {
                                                ?>
                                                <?php
                                                $st_id = $show_t_id['st_id'];
                                                $show_time = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tbl_show_time where st_id = $st_id"));
                                                echo $show_t_id['s_id'];
                                                ?>
                                                <th>
                                                    <button class="btn btn-outline-light"><a
                                                                class="text-muted nav-link p-0"
                                                                href="check_login.php?show=<?= $show_t_id['s_id'] ?>&movie=<?= $movie_id ?>&theatre=<?= $t_id ?>">
                                                            <?= $show_time['start_time'] ?>
                                                        </a>
                                                    </button>
                                                </th>

                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                </table>
                            <?php } else {
                                ?>
                                <h4 class="text-white text-start mb-5"><a href="about.php?id=<?= $movie['movie_id'] ?>"
                                                                          class=" text-center nav-link border text-white border-white py-2 font-monospace">TẠM THỜI KHÔNG CÓ LỊCH CHIẾU HÃY QUAY LẠI SAU!</a>
                                </h4>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--list films in theatre-->
                <div class="col-12 col-lg-4"></div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="trailerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body bg-dark ">
                        <iframe id="video" class="p-0 m-0" width="100%" height="576px"
                                src="<?= $movie['video_url'] ?>?autoplay=1"
                                title="YouTube video player" frameborder="1"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let video = document.getElementById('video');

        let videoSrc = video.getAttribute('src');
        let trailerModal = document.getElementById('trailerModal');
        video.setAttribute('src', '')
        trailerModal.addEventListener('show.bs.modal', (e) => {
            video.setAttribute('src', videoSrc)
        })
        trailerModal.addEventListener('hidden.bs.modal', (e) => {
            video.setAttribute('src', '')
        })
    </script>
    <!--<div class="content">-->
    <!--	<div class="wrap">-->
    <!--		<div class="content-top">-->
    <!--				<div class="section group">-->
    <!--					<div class="about span_1_of_2">	-->
    <!--						<h3 style="color:#444; font-size:23px;" class="text-center">--><?php //echo $movie['movie_name']; ?><!--</h3>	-->
    <!--							<div class="about-top">	-->
    <!--								<div class="grid images_3_of_2">-->
    <!--									<img src="--><?php //echo $movie['image']; ?><!--" alt=""/>-->
    <!--								</div>-->
    <!--								<div class="desc span_3_of_2">-->
    <!--									<p class="p-link" style="font-size:15px"><b>Cast : </b>--><?php //echo $movie['cast']; ?><!--</p>-->
    <!--									<p class="p-link" style="font-size:15px"><b>Release Date : </b>--><?php //echo date('d-M-Y',strtotime($movie['release_date'])); ?><!--</p>-->
    <!--									<p style="font-size:15px">--><?php //echo $movie['desc']; ?><!--</p>-->
    <!--									<a href="--><?php //echo $movie['video_url']; ?><!--" target="_blank" class="watch_but" style="text-decoration:none;">Watch Trailer</a>-->
    <!--								</div>-->
    <!--								<div class="clear"></div>-->
    <!--							</div>-->
    <!--							--><?php //$s=mysqli_query($con,"select DISTINCT theatre_id from tbl_shows where movie_id='".$movie['movie_id']."'");
//							if(mysqli_num_rows($s))
//							{?>
    <!--							<table class="table table-hover table-bordered text-center">-->
    <!--								<h3 style="color:#444;" class="text-center">Available Shows</h3>-->
    <!---->
    <!--								<thead>-->
    <!--										<tr>-->
    <!--											<th class="text-center" style="font-size:16px;"><b>Theatre</b></th>-->
    <!--											<th class="text-center" style="font-size:16px;"><b>Show Timings</b></th>-->
    <!--										</tr>-->
    <!--									</thead>-->
    <!--							--><?php
//
//
//
//								while($shw=mysqli_fetch_array($s))
//								{
//
//									$t=mysqli_query($con,"select * from tbl_theatre where id='".$shw['theatre_id']."'");
//									$theatre=mysqli_fetch_array($t);
//									?>
    <!--									-->
    <!---->
    <!--									<tbody>-->
    <!--									<tr>-->
    <!--										<td >-->
    <!--											--><?php //echo $theatre['name'].", ".$theatre['place'];?>
    <!--										</td>-->
    <!--										<td>-->
    <!--											--><?php //$tr=mysqli_query($con,"select * from tbl_shows where movie_id='".$movie['movie_id']."' and theatre_id='".$shw['theatre_id']."'");
//											while($shh=mysqli_fetch_array($tr))
//											{
//												$ttm=mysqli_query($con,"select  * from tbl_show_time where st_id='".$shh['st_id']."'");
//												$ttme=mysqli_fetch_array($ttm);
//
//												?>
    <!--												-->
    <!--												<a href="check_login.php?show=--><?php //echo $shh['s_id'];?><!--&movie=--><?php //echo $shh['movie_id'];?><!--&theatre=--><?php //echo $shw['theatre_id'];?><!--"><button class="btn btn-default">--><?php //echo date('h:i A',strtotime($ttme['start_time']));?><!--</button></a>-->
    <!--												--><?php
//											}
//											?>
    <!--										</td>-->
    <!--									</tr>-->
    <!--									</tbody>-->
    <!--									--><?php
//								}
//							?>
    <!--						</table>-->
    <!--							--><?php
//							}
//
//							else
//							{
//								?>
    <!--								<h3 style="color:#444; font-size:23px;" class="text-center">Currently there are no any shows available!</h3>-->
    <!--								<p class="text-center">Please check back later!</p>-->
    <!--								--><?php
//							}
//							?>
    <!--						-->
    <!--					</div>			-->
    <!--				--><?php //include('movie_sidebar.php');?>
    <!--			</div>-->
    <!--				<div class="clear"></div>		-->
    <!--			</div>-->
    <!--	</div>-->
    <!--</div>-->
<?php include('footer.php'); ?>