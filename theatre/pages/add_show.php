<?php
include('header.php');
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('../../form.php');
    $frm=new formBuilder;      
  ?> 
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm lịch chiếu
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Thêm lịch chiếu phim</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-body">
          <?php include('../../msgbox.php');?>
          <form action="process_addshow.php" method="post" id="form1">
            <div class="form-group">
              <label class="control-label">Chọn phim</label>
              <select name="movie" class="form-control">
                <option value>Chọn phim</option>
                <?php
                  $mv=mysqli_query($con,"select * from tbl_movie where status='0'");
                  while($movie=mysqli_fetch_array($mv))
                  {
                    ?>
                    <option value="<?php echo $movie['movie_id'];?>"><?php echo $movie['movie_name']; ?></option>
                    <?php
                  }
                ?>
              </select>
              <?php $frm->validate("movie",array("required","label"=>"Movie")); // Validating form using form builder written in form.php ?>
            </div>
            <div class="form-group">
              <label class="control-label">Chọn rạp phim</label>
              <select name="screen" class="form-control" id="screen">
                <option value>Select Screen</option>
                <?php
                  $sc=mysqli_query($con,"select * from tbl_screens where t_id='".$_SESSION['theatre']."'");
                  while($screen=mysqli_fetch_array($sc))
                  {
                    ?>
                    <option value="<?php echo $screen['screen_id']; ?>"><?php echo $screen['screen_name']; ?></option>
                    <?php
                  }
                ?>
              </select>
              <?php $frm->validate("screen",array("required","label"=>"Screen")); // Validating form using form builder written in form.php ?>
            </div>
            <div class="form-group">
              <label class="control-label">Chọn thời gian chiếu phim (Nhấn giữ phím CTRL để chọn nhiều thời gian chiếu)</label>
              <select name="stime[]" class="form-control" id="stime" multiple>
                <option value="0">Chọn thời gian chiếu phim</option>
              </select>
              
            </div>
            <div class="form-group">
              <label class="control-label">Ngày bắt đầu</label>
              <input type="date" name="sdate" class="form-control"/>
              <?php $frm->validate("sdate",array("required","label"=>"Start Date")); // Validating form using form builder written in form.php ?>
            </div>
            <div class="form-group">
              <button class="btn btn-success">Thêm lịch chiếu phim</button>
            </div>
          </form>
        </div> 
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>
<script type="text/javascript">
  $('#screen').change(function(){
    screen=$(this).val();
    $.ajax({
			url: 'get_showtime.php',
			type: 'POST',
			data: 'screen='+screen,
			dataType: 'html'
		})
		.done(function(data){
			//console.log(data);	
			$('#stime').html(data);    
		})
		.fail(function(){
			$('#stime').html('<option><i class="glyphicon glyphicon-info-sign"></i> Đã xảy ra lỗi. Vui lòng thử lại...</option>');
		});
  });
</script>
<script>
        <?php $frm->applyvalidations("form1");?>
    </script>