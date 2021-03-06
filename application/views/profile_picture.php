<script src="<?php echo base_url(); ?>assets/front/js/jquery.form.js"></script>
<style>
.card-block{
  background-color: #fff;
  padding-bottom: 100px;
  padding-top: 50px;
  margin-left: 50px;
  margin-right: 50px;
  box-shadow: 3px 11px 15px 0px #959696;
}
.profile_picture_active{
  border-left: 4px solid #458ecc;
}
#form {
    display: none;
    padding-top: 20px;
}

.upload-button {
    border: 1px solid black;
    border-radius: 20px;
    width: 150px;
    text-align: center;
    color: #fff;
    border-color: #fff;
    margin-top: 5px;
    margin-left: 5px;
    display: none;
}

.profile-pic {
    max-width: 200px;
    max-height: 200px;
    border-radius: 50px;
    margin-top: 10px;
    margin-left: 20px;
    height: 200px;

}
.file-upload{
  margin-top: 30px;
}
.profile-img{
  text-align: center;
}
</style>
<div class="col-sm-12 col-md-12 " id="content">
    <h3 class="dashboard_tab"></h3>
</div>

<?php  foreach($res as $rows){} ?>
<div class="container">
  <div class="card-block">
<!-- <img src="<?php echo base_url(); ?>assets/front/images/trophy.png" class="img-center"> -->
<div class="form-group row">
  <div class="profile-img">
    <?php if(empty($rows->user_picture)){ ?>
        <img src="<?php echo base_url(); ?>assets/images/profile/noimage.png" class="img-circle  profile-pic">
  <?php  }else{ ?>
      <img src="<?php echo base_url(); ?>assets/users/profile/<?php echo $rows->user_picture; ?>" class="img-circle  profile-pic">
  <?php  } ?>

  <form  action="<?php echo base_url(); ?>home/change_pic" method="post" id="image_upload_form" enctype="multipart/form-data">
        <div class="upload-button">Change Picture</div>

        <center>  <input class="file-upload" name="profilepic" id="profilepic" type="file" accept="image/x-png,image/jpeg" /></center>
          <div id="preview"></div>
      </form>

  </div>
</div>
</div>
</div>

<script>

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function() {
        readURL(this);
    });

    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });

    $(document).ready(function() {

        $('#profilepic').on('change', function() {

          var f=this.files[0]
			     var actual=f.size||f.fileSize;
           var orgi=actual/1024;
            if(orgi<1024){
              $("#preview").html('');
              $("#preview").html('<img src="<?php echo base_url(); ?>assets/loader.gif" alt="Uploading...." style="width:10%;"/>');
              $("#image_upload_form").ajaxForm({
                  target: '#preview'
              }).submit();
            }else{
              alert("File Size Must be  Lesser than 1 MB");
            }


        });
    });
</script>
