
      <div class="page-content-wrapper">
         <div class="container">

            <div class="row">
               <div class="col-lg-8">
                  <div class="card m-b-20">
                     <div class="card-block">
                        <h4 class="mt-0 header-title"> Add City/Area </h4>

                        <form method="post" action="<?php echo base_url();?>city/add_city" name="cityform" id="cityform" onSubmit='return check();'>

                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Country <span class="error">*</span></label>
                              <div class="col-sm-6">
                                 <select class="form-control" name="countryid" onchange="getstatename(this.value)">
                                     <option value="">Select Country</option>
                                     <?php foreach($countyr_list as $cntry){ ?>
                                                <option value="<?php echo $cntry->id; ?>"><?php echo $cntry->country_name; ?></option>
                                     <?php } ?>
                                 </select>
                              </div>
                           </div>


                           <div class="form-group row">
                              <label class="col-sm-4 col-form-label">State <span class="error">*</span></label>
                              <div class="col-sm-6">
                                 <select class="form-control" name="stateid" id="staname" >

                                 </select>
                                 <div id="msg"></div>
                              </div>
                           </div>


                            <div class="form-group row">
                              <label for="example-text-input" class="col-sm-4 col-form-label">City/Area <span class="error">*</span></label>
                              <div class="col-sm-6">
                                 <input class="form-control"  type="text" id="cityid" name="cityname" id="example-text-input" maxlength="50">
                              </div>
                           </div>

                           <div class="form-group row">

                            <label for="latitude" class="col-sm-4 col-form-label">City/Area Latitude <span class="error">*</span></label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="txtLatitude"  id="latu" maxlength="30">
                                <div id="ermsg"></div> <div id="ermsg2"></div>
                            </div>
                          </div>
                           <div class="form-group row">
                              <label for="longitude" class="col-sm-4 col-form-label">City/Area Longitude <span class="error">*</span></label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="txtLongitude" id="lon" maxlength="30">
                                 <div id="ermsg1"></div> <div id="ermsg3"></div>
                            </div>
                        </div>


                           <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Status <span class="error">*</span></label>
                              <div class="col-sm-6">
                                 <select class="form-control"  name="eventsts">
                                    <option value="">Select Status</option>
                                    <option value="Y">Active</option>
                                    <option value="N">Inactive</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-4 col-form-label"></label>
                              <button type="submit" id="save" class="btn btn-success waves-effect waves-light">
                              Add </button>

                           </div>
                     </div>
                     </form>
                  </div>
               </div>

               <!--div class="col-lg-4">
    <div id="dvMap" style="width:300px; height:300px"> </div>
               </div-->
            </div>
            <!-- end row -->
            <div class="row">
               <div class="col-12">
                  <div class="card m-b-20">
                     <div class="card-block">
                        <h4 class="mt-0 header-title">View All Cities/Areas</h4>
                           <?php if($this->session->flashdata('msg')): ?>
                        <div class="alert <?php $msg=$this->session->flashdata('msg');
                        if($msg=='City/area added successfully' || $msg=='Changes made are saved'){ echo "alert-success"; }else{ echo "alert-danger"; } ?>">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                           ×</button> <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                        <?php endif; ?>

                        <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                           <thead>
                              <tr>
							                   <th>S. No</th>
                                 <th>Country</th>
                                 <th>State</th>
                                 <th>City/Area</th>
                                 <th>Status</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
						        <?php
                                $i=1;
                                foreach($result as $rows) {
								                $status=$rows->event_status;
                                ?>
                              <tr>
                                 <td><?php  echo $i; ?></td>
                                 <td><?php  echo $rows->country_name; ?></td>
                                 <td><?php  echo $rows->state_name; ?></td>
                                 <td><?php  echo $rows->city_name; ?></td>
                                 <td><?php if($status=='Y'){ echo'<button type="button" class="btn btn-secondary btn-success btn-sm"> Active </button>'; }else{ echo'<button type="button" class="btn btn-secondary btn-primary btn-sm"> Deactive </button>'; }?></td>
								         <td><a href="<?php echo base_url();?>city/edit_city/<?php echo $rows->id;?>"><img title="Edit" src="<?php echo base_url();?>assets/icons/edit.png" /></a></td>
                              </tr>
                             <?php $i++;  }  ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- end col -->
            </div>
            <!-- end row -->
         </div>
		   <!-- container -->
      </div>
     <!-- Page content Wrapper -->
   </div>
    <!-- Top Bar Start -->
</div>
<!-- content -->
<!--script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByz7sU142AeFwpK3KiFilK0IOoa2GU9tw"></script-->
<script type="text/javascript">
 
   $(document).ready(function () {

	$(document).on("preInit.dt", function(){
		$(".dataTables_filter input[type='search']").attr("maxlength", 20);
	});
	
	$('table').DataTable({
         "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "iDisplayLength": 25,
		"ordering": false
    });
	
    $('#cityform').validate({ // initialize the plugin
       rules: {
         countryid:{required:true },
         stateid:{required:true },
         cityname:{required:true },
         eventsts:{required:true },
         txtLatitude:{required:true },
         txtLongitude:{required:true }

        },
        messages: {
        countryid:"Select Country",
        stateid:"Select State",
        cityname:"Enter City/Area",
        eventsts:"Select Status",
        txtLatitude:"Enter Latitude",
        txtLongitude:"Enter Longitude",
               },
         });
   });

function check()
{
if(document.cityform.txtLatitude.value!="")
    {
            sLatitude = document.cityform.txtLatitude.value
            if(isNaN(sLatitude) || sLatitude.indexOf(".")<0)
            {
                $("#ermsg2").html('<p style="color:red;">Please enter valid Latitude.</p>').show();
                $("#ermsg").hide();
                //alert ("Please enter valid Latitude.")
                document.cityform.txtLatitude.focus();
                return false;
            }else{
                 $("#ermsg").hide();
                 $("#ermsg2").hide();
            }
    }

    if(document.cityform.txtLongitude.value!="")
    {
            sLongitude = document.cityform.txtLongitude.value

            if(isNaN(sLongitude) || sLongitude.indexOf(".")<0)
            {
                //alert ("Please enter valid Longitude.")
                 $("#ermsg3").html('<p style="color: red;">Please enter valid Longitude.</p>').show();
                 $("#ermsg1").hide();
                document.cityform.txtLongitude.focus();
                return false;
            }else{
                 $("#ermsg1").hide();
                 $("#ermsg3").hide();
            }
    }
  }

 function getstatename(cid) {
           //alert(cid);
            $.ajax({
               type: 'post',
               url: '<?php echo base_url(); ?>city/get_sate_name',
               data: {
                   country_id:cid
               },
             dataType: "JSON",
             cache: false,
            success:function(test)
            {
              // alert(test);
               var len = test.length;
               //alert(len);
                var statename='';
                 var title='<option>Select State</option>';
                if(test!='')
                 {       //alert(len);
                   for(var i=0; i<len; i++)
                   {
                     var stateid = test[i].id;
                     var state_name = test[i].state_name;
                     //alert(state_name);
                     statename +='<option value=' + stateid + '> ' + state_name + ' </option>';
                  }
                  $("#staname").html(title+statename).show();
                  $("#msg").hide();
                  $("#cityid").show();
                  $("#save").show();
                  $("#save1").show();
                  }else{
                  $("#msg").html('<p style="color: red;">State Name Not Found</p>').show();
                  $("#staname").hide();
                  $("#cityid").hide();
                  $("#save").hide();
                  $("#save1").hide();

                 }
            }
          });
       }

</script>
