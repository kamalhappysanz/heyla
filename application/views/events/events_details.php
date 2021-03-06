<?php
    function get_times( $default = '10:00', $interval = '+15 minutes' )
	{
		$output = '';
		$current = strtotime( '00:00:00' );
		$end = strtotime( '23:59:00' );
		while( $current <= $end ) {
			$time = date( 'H:i:s', $current );
			$sel = ( $time == $default ) ? ' selected' : '';
			$output .= "<option value=\"{$time}\">" . date( 'h.i A', $current ) .'</option>';
			$current = strtotime( $interval, $current );
		}
		return $output;
    }
?>
<style type="text/css">
   .img-circle{
          width: 200px;
         border-radius: 30px;
         margin-top: 10px;
       }
</style>

   <div class="page-content-wrapper ">
     <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-block">
                 <h4 class="mt-0 header-title"> Event Details </h4>

                <form method="post" enctype="multipart/form-data" action="" name="eventform">
                  <?php foreach($view as $rows){}?>
                        <div class="form-group row">

                            <label for="Category" class="col-sm-2 col-form-label">Category: </label>
                            <div class="col-sm-4">
                            <h4 class="header-title"> <?php echo $rows->category_name ; ?> </h4>
                            </div>

                            <label for="Name" class="col-sm-2 col-form-label">Event Name: </label>
                            <div class="col-sm-4">
                               <h4 class="header-title"> <?php echo $rows->event_name ; ?> </h4>
                            </div>

                        </div>
                       <div class="form-group row">
                            <label for="country" class="col-sm-2 col-form-label">Country: </label>
                            <div class="col-sm-4">
                                <h4 class="header-title"> <?php echo $rows->country_name ; ?> </h4>
                            </div>
                             <label for="city" class="col-sm-2 col-form-label">City/Area: </label>
                            <div class="col-sm-4">
                            <h4 class="header-title"> <?php echo $rows->city_name ; ?> </h4>
                               </div>
                            </div>

                        <div class="form-group row">

                            <label for="Venue" class="col-sm-2 col-form-label">Venue: </label>
                            <div class="col-sm-4">
                              <h4 class="header-title"> <?php echo $rows->event_venue ; ?> </h4>
                            </div>
                             <label for="Address" class="col-sm-2 col-form-label">Address: </label>
                            <div class="col-sm-4">
                                <h4 class="header-title"> <?php echo $rows->event_address ; ?> </h4>

                            </div>

                        </div>

                       <div class="form-group row">

                            <label for="sdate" class="col-sm-2 col-form-label">Start Date: </label>
                            <div class="col-sm-4">
                              <div class="input-group">

                                   <h4 class="header-title"> <?php echo $rows->start_date ; ?> </h4>


                            </div>
                            </div>

                             <label for="edate" class="col-sm-2 col-form-label">End Date: </label>
                            <div class="col-sm-4">
                               <div class="input-group">
                                  <h4 class="header-title"> <?php echo $rows->end_date ; ?> </h4>

                            </div>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="stime" class="col-sm-2 col-form-label">Start Time: </label>
                            <div class="col-sm-4">

                              <h4 class="header-title"> <?php echo date("g:i a",strtotime(" $rows->start_time")); ?> </h4>

                            </div>

                             <label for="etime" class="col-sm-2 col-form-label">End Time: </label>
                            <div class="col-sm-4">
                               <h4 class="header-title"> <?php echo date("g:i a",strtotime(" $rows->end_time")); ?> </h4>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label for="latitude" class="col-sm-2 col-form-label">Event Latitude: </label>
                            <div class="col-sm-4">
                              <h4 class="header-title"> <?php echo $rows->event_latitude ; ?> </h4>

                            </div>
                              <label for="longitude" class="col-sm-2 col-form-label">Event Longitude: </label>
                            <div class="col-sm-4">
                               <h4 class="header-title"> <?php echo $rows->event_longitude ; ?> </h4>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="primarycell" class="col-sm-2 col-form-label">Phone Number: </label>
                            <div class="col-sm-4">

                               <h4 class="header-title"> <?php echo $rows->primary_contact_no ; ?> </h4>

                            </div>
                            <label for="seccell" class="col-sm-2 col-form-label">Alternate Phone Number: </label>
                            <div class="col-sm-4">
                              <h4 class="header-title"> <?php echo $rows->secondary_contact_no ; ?> </h4>

                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="Person" class="col-sm-2 col-form-label">Contact Person : </label>
                            <div class="col-sm-4">
                                <h4 class="header-title"> <?php echo $rows->contact_person ; ?> </h4>

                            </div>
                            <label for="Email" class="col-sm-2 col-form-label">Email ID: </label>
                            <div class="col-sm-4">
                                <h4 class="header-title"> <?php echo $rows->contact_email ; ?> </h4>

                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="Status" class="col-sm-2 col-form-label">Event Advertisement: </label>
                            <div class="col-sm-4">
                              <h4 class="header-title"> <?php $as=$rows->adv_status ;  if($as=='Y'){ echo "Enable";}else{ echo "Disable"; }?> </h4>

                            </div>
                            <label for="ecost" class="col-sm-2 col-form-label">Event Type: </label>
                              <div class="col-sm-2">
                                     <h4 class="header-title"> <?php echo $rows->event_type ; ?> </h4>
                              </div>

                       </div>

                        <div class="form-group row">

                            <label for="Status" class="col-sm-2 col-form-label">Hotspot: </label>
                            <div class="col-sm-4">
                                 <h4 class="header-title">
                                  <?php $hs=$rows->hotspot_status ; if($hs=='Y'){ echo "Yes";}else{ echo "No"; } ?> </h4>
                            </div>




                        </div>


                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Event Banner : </label>
                              <div class="col-sm-4">
                               <img src="<?php echo base_url(); ?>assets/events/banner/<?php echo $rows->event_banner; ?>" class="img-circle">
                              </div>
                            </div>
                         <div class="form-group row">
                            <label for="Description" class="col-sm-2 col-form-label">Description : </label>
                            <div class="col-sm-10">
                              <h4 class="header-title"> <?php echo $rows->description ; ?> </h4>
                            </div>
                        </div>


                     </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

   </div><!-- container -->
   </div>
   <!-- Page content Wrapper -->
</div>
<!-- content -->

<script type="text/javascript">
$('#vieweve').addClass("active");
  $('#events').addClass("has_sub active nav-active");

 function getcityname(cid) {
           //alert(cid);
            $.ajax({
               type: 'post',
               url: '<?php echo base_url(); ?>events/get_city_name',
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
                var cityname='';
                if(test!='')
                 {    //alert(len);
                   for(var i=0; i<len; i++)
                   {
                     var cityid = test[i].id;
                     var city_name = test[i].city_name;
                     //alert(city_name);
                     cityname +='<option value=' + cityid + '> ' + city_name + ' </option>';
                  }
                  $("#ctname").html(cityname).show();
                  $("#cmsg").hide();
                  $("#cityid").hide();
                  $("#new").show();
                  }else{
                  $("#cmsg").html('<p style="color: red;">City Not Found</p>').show();
                  $("#ctname").hide();
                 }
            }
          });
       }

function check()
{
  if(document.eventform.txtLatitude.value=="")
    {
            //alert("Please enter Latitude.");
            $("#ermsg").html('<p style="color: red;">Please enter Latitude.</p>');
            document.eventform.txtLatitude.focus();
            return false;
    }

    if(document.eventform.txtLongitude.value=="")
    {
            //alert("Please enter Longitude.");
            $("#ermsg1").html('<p style="color: red;">Please enter Longitude.</p>');
            document.eventform.txtLongitude.focus();
            return false;
    }

  if(document.eventform.txtLatitude.value!="")
    {
            sLatitude = document.eventform.txtLatitude.value
            if(isNaN(sLatitude) || sLatitude.indexOf(".")<0)
            {
                $("#ermsg2").html('<p style="color:red;">Please enter valid Latitude.</p>').show();
                $("#ermsg").hide();
                //alert ("Please enter valid Latitude.")
                document.eventform.txtLatitude.focus();
                return false;
            }else{
                 $("#ermsg").hide();
                 $("#ermsg2").hide();
            }
    }

    if(document.eventform.txtLongitude.value!="")
    {
            sLongitude = document.eventform.txtLongitude.value

            if(isNaN(sLongitude) || sLongitude.indexOf(".")<0)
            {
                //alert ("Please enter valid Longitude.")
                 $("#ermsg3").html('<p style="color: red;">Please enter valid Longitude.</p>').show();
                 $("#ermsg1").hide();
                document.eventform.txtLongitude.focus();
                return false;
            }else{
                 $("#ermsg1").hide();
                 $("#ermsg3").hide();
            }
    }

    // if(document.eventform.txtLatitude.value!="")

    // {
    //     var latitude = document.eventform.txtLatitude.value;
    //     var longitude = document.eventform.txtLongitude.value;

    //     var reg = new RegExp("^[-+]?[0-9]{1,3}(?:\.[0-9]{1,10})?$");

    //     if( reg.exec(latitude) ) {
    //      //do nothing
    //     } else {
    //          $("#ermsg2").html('<p style="color: red;">Please enter valid Latitude.</p>').show();
    //          $("#ermsg").hide();
    //         //alert("Please enter valid Latitude.");
    //         document.eventform.txtLatitude.focus();
    //         return false;
    //     }

    //     if( reg.exec(longitude) ) {
    //      //do nothing
    //     } else {
    //         //alert("Please enter valid Longitude.");
    //         $("#ermsg3").html('<p style="color: red;">Please enter valid Longitude.</p>').show();
    //         $("#ermsg1").hide();
    //         document.eventform.txtLongitude.focus();
    //         return false;
    //     }
    // }

}

</script>
