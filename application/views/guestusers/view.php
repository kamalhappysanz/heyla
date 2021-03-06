<!--div class="content-page"> 
<!- Start content ->
<div class="content">
    <!- Top Bar Start ->
  <div class="topbar">
      <nav class="navbar-custom">
         <ul class="list-inline float-right mb-0">
            <!-li class="list-inline-item dropdown notification-list">
               <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                  aria-haspopup="false" aria-expanded="false">
               <i class="ion-ios7-bell noti-icon"></i>
               <span class="badge badge-success noti-icon-badge">3</span>
               </a>
            </li!->
            <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
            <img src="<?php echo base_url(); ?>assets/images/admin/admin.png" alt="user" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
            <a class="dropdown-item" href="#"><span class="badge badge-success pull-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
            <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a!->
            <a class="dropdown-item" href="<?php echo base_url(); ?>adminlogin/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
            </div>
            </li>
         </ul>
         <ul class="list-inline menu-left mb-0">
         <li class="list-inline-item">
         <button type="button" class="button-menu-mobile open-left waves-effect">
         <i class="ion-navicon"></i>
         </button>
         </li>
         <li class="hide-phone list-inline-item app-search">
         <h3 class="page-title">View Guestusers List</h3>
         </li>
         </ul>
         <div class="clearfix"></div>
      </nav>
      </div>
    <!- Top Bar End -->

    <div class="page-content-wrapper ">
        <div class="container">
            <div class="row">
      
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-block">

                    <h4 class="mt-0 header-title"> View Guestusers List </h4>

                     <?php if($this->session->flashdata('msg')): ?>
                        <div class="alert alert-success">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                           ×</button> <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                        <?php endif; ?>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                            <table  id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                           $i=1;
                           foreach($list as $rows){ 
                            $guid=$rows->user_id;
                              ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rows->name ; ?></td>
                            <td><?php echo $rows->category_name ; ?></td>

                            <td>
                             <a href="<?php echo base_url();?>guestuser/view_all_details/<?php echo $rows->user_id;?>">
                              <img  title="View Followers Details" src="<?php echo base_url();?>assets/icons/view.png"/>
                            </a>
                              <!--a onclick="confirmGetMessage(<?php echo $guid;?>)" > 
                              <img title="Delete" src="<?php echo base_url();?>assets/icons/delete.png"/></a-->
                            </td>
                        </tr>
                       <?php $i++; }  ?>
                        </tbody>
                    </table>
                  </div>
                 </div> 
                </div>
            </div>
        </div>
      </div> <!-- end row -->

     </div><!-- container -->
    </div> <!-- Page content Wrapper href="<?php echo base_url();?>guestuser/delete/<?php echo $rows->user_id;?>"-->

</div> <!-- content -->
<script type="text/javascript">
  function confirmGetMessage(guid)
  {
    var r=confirm("Do you want to delete this?")
    if (r==true) {
    $.ajax({
      url: "<?php echo base_url(); ?>guestuser/delete",
      type: 'POST',
      data: { guserid: guid },
      success: function(response) {
      //alert(response);exit;
          if (response == "success") {
              swal({
                  title: "Success",
                  text: "Deleted Successfully",
                  type: "success"
              }).then(function() { 
                  location.href = '<?php echo base_url(); ?>guestuser/home';
              });
          } else {
              sweetAlert("Oops...", response, "error");
          }
      }
    });
    }else{
        swal("Cancelled", "Process Cancel :)", "error");
       }
 }
  $(document).ready(function() {
   
} );
</script>