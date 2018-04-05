<div class="row">
    <div class="col-lg-4">
        <div class="box box-primary">
            <Div class="box-header">
                <h3 class="box-title">Add/Edit Rate Form</h3>
            </Div>

            <div class="box-body">
                  <?PHP if (isset ($success_msg)) { ?>
                        <div class="alert alert-success"><?PHP echo $success_msg; ?></div>
                    <?PHP } ?>
                <form id="default_form" method="post" action="<?PHP echo $form['action']; ?>" data-parsley-validate>
                    <div class="form-group">
                        <label class="control-label" form="rate_groups">GYM Working Day</label>
                       

                   
                          <select  name="day" class="form-control" value="" />
           <option>Pick Gym Day</option>
       <option value="Monday" <?PHP echo (isset($form_values) && $form_values->day == 'Monday' ? 'selected' : ''); ?>>Monday</option>
    <option  value="Tuesday"<?PHP echo (isset($form_values) && $form_values->day == 'Tuesday' ? 'selected' : ''); ?>>Tuesday</option>
          <option  value="Wednesday"<?PHP echo (isset($form_values) && $form_values->day == 'Wednesday' ? 'selected' : ''); ?>>Wednesday</option>
         <option  value="Thursday" <?PHP echo (isset($form_values) && $form_values->day == 'Thursday' ? 'selected' : ''); ?>>Thursday</option>
               <option  value="Friday" <?PHP echo (isset($form_values) && $form_values->day == 'Friday' ? 'selected' : ''); ?>>Friday</option>
            <option  value="Saturday" <?PHP echo (isset($form_values) && $form_values->day == 'Saturday' ? 'selected' : ''); ?>>Saturday</option>
              <option  value="Sunday" <?PHP echo (isset($form_values) && $form_values->day == 'Sunday' ? 'selected' : ''); ?>>Sunday</option>
                                      </select>
                         
                    </div>
                    <div class="form-group">
                             
                        <label class="control-label" for="amount">GYM TimeRange</label>
                                 
                <input type="text" name="timerange" class="form-control"         
          value="<?PHP echo (isset($form_values) ? $form_values->timerange : ''); ?>"
                     placeholder="Example 6:00AM - 20:00PM" />
                             
                            
                        </div>

                     <input type="submit"
                           class="btn btn-info"
                           name="<?PHP echo $form['btn_name']; ?>" value="<?PHP echo $form['btn_value']; ?>">
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <Div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Gym Working Hours</h3>
            </div>

            <Div class="box-body">
                <table id="default_table" class="table table-stripped table-hover">
                    <thead>
                    <tr>
                         <td>Name</td>
                            <td>Day</td>
                            <td>Time</td>
                            <td>Actions</td>
                    </tr>
                    </thead>

                    <tbody>
                     <?PHP
                         if (isset($gym_working_hours) && count($gym_working_hours) > 0) {
                             foreach ($gym_working_hours as $value) {
                         ?>

                            <tr>
                                <td><?PHP echo $gym->name; ?></td>
                                <td> <?PHP echo $value->day; ?></td>
                                <td><?PHP echo $value->timerange; ?></td>
                                <td>
                <a href="<?PHP echo base_url(); ?>index.php/gym/gym_working_hours/<?PHP echo $gym->id; ?>/update/<?PHP echo $value->id; ?>" class="btn btn-info">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                    <a href="<?PHP echo base_url(); ?>index.php/gym/gym_working_hours/<?PHP echo $gym->id; ?>/delete/<?PHP echo $value->id;  ?>" class="btn btn-danger">
                                        <span class="fa fa-trash-o"></span>
                                    </a>
                                </td>
                            </tr>
                     <?PHP
                             }}
                         ?>
            
                    </tbody>
                </table>
            </Div>
        </Div>
    </div>
</div>