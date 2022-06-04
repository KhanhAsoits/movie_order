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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm rạp phim
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li class="active">Thêm rạp phim</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-body">
            <form action="process_add_theater.php" method="post" id="form1">
              <div class="form-group">
                <label class="control-label">Tên rạp phim</label>
                <input type="text" name="name" placeholder="Tên rạp phim" class="form-control"/>
                <?php $frm->validate("name",array("required","label"=>"Tên rạp phim")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                <label class="control-label">Địa chỉ rạp phim</label>
                <input type="text" name="address" placeholder="Địa chỉ rạp phim" class="form-control"/>
                <?php $frm->validate("address",array("required","label"=>"Địa chỉ rạp")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                <label class="control-label">Địa điểm rạp phim</label>
                <!-- <input type="text" name="place" id="autocomplete" class="form-control"> -->
                <input type="text" name="place" placeholder="Địa điểm rạp phim" class="form-control">
                <?php $frm->validate("place",array("required","label"=>"Place")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                 <label class="control-label">Trạng thái</label>
                <input type="text" name="state" id="administrative_area_level_1" placeholder="Trạng thái" class="form-control">
                <?php $frm->validate("state",array("required","label"=>"Trạng thái")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                <label class="control-label">Mã rạp phim</label>
                 <input type="text" name="pin" id="postal_code" placeholder="Mã rạp phim" class="form-control">
                 <?php $frm->validate("pin",array("required","label"=>"Mã rạp phim","regexp"=>"pin")); // Validating form using form builder written in form.php ?>
              </div>
              <?php
                start:
                $username="THR".rand(123456,999999);
                $u=mysqli_query($con,"select * from tbl_login where username='$username'");
                if(mysqli_num_rows($u))
                {
                  goto start;
                }
              ?>
              <div class="form-group">
                <label class="control-label">Tên đăng nhập</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
                <?php $frm->validate("username",array("required","label"=>"Tên đăng nhập")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                <label class="control-label">Mật khẩu</label>
                <input type="text" name="password" class="form-control" value="<?php echo "PWD".rand(123456,999999);?>">
                <?php $frm->validate("password",array("required","label"=>"Mật khẩu")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                <button class="btn btn-success">Thêm rạp phim</button>
              </div>
              <input type="hidden" name="country" class="form-control" id="country">
              <input type="hidden" class="field" id="route" disabled="true">
              <input type="hidden" class="field" id="street_number" disabled="true">
              <input type="hidden" class="field" id="locality"disabled="true">
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
 <script>
        // google auto complete API
      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfO40iueprTDv0WCf0BCIlbj56JO-HylA&libraries=places&callback=initAutocomplete"
            async defer></script>
            <script>
        <?php $frm->applyvalidations("form1");?>
    </script>