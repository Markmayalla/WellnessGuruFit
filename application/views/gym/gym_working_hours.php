<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 3/3/18
 * Time: 6:41 PM
 */ 
?>
<div class="row">
    <div class="col-lg-6">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active">
                    <a href="#about" data-toggle="tab"><span class="fa fa-eye"></span> Preview</a>
                </li>
                <li>
                    <a href="#edit" data-toggle="tab"><span class="fa fa-plus"></span> Add</a>
                </li>
                <li class="navbar-header pull-right">
                    <span class="fa fa-clock-o"></span> Working hours <?PHP echo strtoupper($gym->name); ?>
                </li>
            </ul>

            <div class="tab-content">
                <div id="edit" class="tab-pane">
                    <?PHP if (isset ($success_msg)) { ?>
                        <div class="alert alert-success"><?PHP echo $success_msg; ?></div>
                    <?PHP } ?>
                    <form id="default_form" method="post" action="<?PHP echo base_url(); ?>index.php/gym/gym_working_hours/<?PHP echo $gym->id; ?>/insert">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">GYM Working Day</span>
                                <select type="text" name="day" class="form-control" value="" />
           <option>Pick Gym Day</option>
         <option   value="Monday" >Monday</option>
          <option  value="Tuesday">Tuesday</option>
              <option  value="Wednesday">Wednesday</option>
         <option  value="Thursday">Thursday</option>
               <option  value="Friday">Friday</option>
            <option  value="Saturday">Saturday</option>
              <option  value="Monday">Sunday</option>
                                      </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            	
                                <span class="input-group-addon">GYM TimeRange</span>
                                <input type="text" name="timerange" class="form-control" value=""  placeholder="Example 6:00AM - 20:00PM" />
                            </div>
                            
                        </div>
                        <input type="submit" class="btn btn-info" name="save" value="Save" />
                    </form>

                </div>
                <div id="about" class="tab-pane active">
                     <div class="tab-pane" id="list_view">
                    <table class="table table-stripped table-hover" id="table">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Day</td>
                            <td>Time</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody id="gyms_list">
                         <?PHP
                         if (isset($gym_working_hours) && count($gym_working_hours) > 0) {
                             foreach ($gym_working_hours as $gym_working_hour) {
                         ?>

                             <tr>
                                 <td><?PHP echo $gym->name; ?></td>
                                 <td><?PHP echo $gym_working_hour->day; ?></td>
                                 <td><?PHP echo $gym_working_hour->timerange; ?></td>
                                 <td>
                            <a href="#" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> </a>
            <a href="<?PHP echo base_url(); ?>index.php/gym/gym_working_hours/delete/<?PHP echo $gym_working_hour->id; ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span> </a>
                                 </td>
                             </tr>
                         <?PHP
                             }}
                         ?>
            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
  
    </div>

    <div class="col-lg-6">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Address Information</h3>
            </div>
            <div class="box-body">
                <div id="address_map">
                    <input type="hidden" id="lng" name="lng" value="<?PHP echo $gym->lng; ?>" />
                    <input type="hidden" id="lat" name="lat" value="<?PHP echo $gym->lat; ?>" />
                </div>
                <div id="address_info">
                    <p><strong><?PHP echo strtoupper($gym->name); ?></strong></p>
                    <p><?PHP echo $gym->country; ?>, <?PHP echo $gym->region; ?></p>
                    <p><?PHP echo $gym->ward; ?>, <?PHP echo $gym->street; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    console.log("Running page javascript: Page: About_Gym");
    show_address_map();
    function show_address_map() {
        if (typeof google === 'object' && typeof google.maps === 'object') {
            console.log("google Maps Active");

            var lng = $('#lng').val();
            var lat = $('#lat').val();
            console.log("lat: " + lat + ", lng: " + lng);
            var position = {lat: parseFloat(lat), lng: parseFloat(lng)};
            console.log(position);
            var address_map = new google.maps.Map(document.getElementById('address_map'), {
                center: position,
                zoom: 17
            });

            var marker = new google.maps.Marker({
                position: position,
                map: address_map
            });

            var infoWindow = new google.maps.InfoWindow({
                content: document.getElementById('address_info')
            })

            infoWindow.open(address_map, marker);

        } else {
            console.log("Google Maps Down !!!");
            setTimeout(function() { show_address_map() }, 50);
        }

    }
</script>