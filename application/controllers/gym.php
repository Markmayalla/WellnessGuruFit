<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/7/17
 * Time: 12:38 PM
 */

include 'ChromePhp.php';

class Gym extends CI_Controller {

    

    public function index() {
        $this->dashboard();
        $this->load->model('gym_model');

    }

    public function dashboard() {
        $data['menu_active'] = 'dashboard';
        $data['main_content'] = 'dashboard';
        $this->load->view('includes/gym', $data);
    }

    public function ajaxRequestGyms() {
        $this->load->model('gym_model');
        $gyms = $this->gym_model->get_many_by(array('admin_id' => $this->session->userdata('user_id')));
    
        if (count($gyms) > 0) {

            echo json_encode($gyms);

        } else {
            echo json_encode("No Gyms Found");
        }
    }

    public function manage_gym() {
        //Instantiating URI segments
        $uri_Segment3 = $this->uri->segment(3);

        //Loading Important Models
        $this->load->model('gym_model');

        $gym = $this->gym_model->get($uri_Segment3);
        if (count($gym) > 0) {
            $data['gym'] = $gym;

        }

        $data['menu_active'] = 'view_gym';
        $data['main_content'] = 'dashboard';
        $this->load->view('includes/gym', $data);
    }

    public function about_gym() {
        //Instantiation URI Segments
        $uri_segment3 = $this->uri->segment(3);
        $uri_segment4 = $this->uri->segment(4);

        //Loading Important Models
        $this->load->model('gym_model');

        if ($uri_segment4 == "update") {
            $form_data = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'update') {
                    $form_data[$key] = $value;
                }
            }
            $this->gym_model->update($uri_segment3, $form_data);
            $data['success_msg'] = "Update Successfull";
        }

        $gym = $this->gym_model->get($uri_segment3);
        $data['gym'] = $gym;

        $data['menu_active'] = 'about_gym';
        $data['main_content'] = 'about_gym';
        $this->load->view('includes/gym', $data);
    }

    public function gym_photos() {
        //Instantiation URI Segments
        $uri_segment3 = $this->uri->segment(3);
        $uri_segment4 = $this->uri->segment(4);

        //Loading Important Models
        $this->load->model('gym_model');

        $gym = $this->gym_model->get($uri_segment3);
        $data['gym'] = $gym;
        $data['menu_active'] = 'gym_photos';
        $data['main_content'] = 'gym_photos';
        $this->load->view('includes/gym', $data);
    }

    public function gym_address() {
        ChromePhp::log("Gym Address Controller function triggered");
        //Instantiation URI Segments
        $uri_segment3 = $this->uri->segment(3);
        $uri_segment4 = $this->uri->segment(4);

        //Loading Important Models
        $this->load->model('gym_model');

        if ($uri_segment4 == "update") {
            $form_data = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'update') {
                    $form_data[$key] = $value;
                }
            }
            $this->gym_model->update($uri_segment3, $form_data);
            $data['success_msg'] = "Update Successfull";
        }

        $gym = $this->gym_model->get($uri_segment3);
        $data['gym'] = $gym;
        $data['main_content'] = "gym_address";
        $data['menu_active'] = "gym_address";
        $this->load->view('includes/gym', $data);
    }

    public function gym_classes() {
        //Instantiation URI Segments
        $uriSegment3 = $this->uri->segment(3);
        $uriSegment4 = $this->uri->segment(4);
        $uriSegment5 = $this->uri->segment(5);
        $uriSegment6 = $this->uri->segment(6);

        //Loading Important Models
        $this->load->model('gym_model');
        $this->load->model('class_model');
        $this->load->model('class_schedual_model');

        if ($uriSegment4 == 'classes' || $uriSegment4 == false) {

            if ($uriSegment5 == 'insert' || $uriSegment5 == false) {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_classes/" . $uriSegment3 . '/classes/insert',
                    'btn_name' => 'add_class',
                    'btn_value' => 'Add Class'
                );

                if (isset($_POST['add_class'])) {
                    $formData = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_class') {
                            $formData[$key] = $value;
                        }
                    }
                    $formData['gyms_id'] = $uriSegment3;
                    $this->class_model->insert($formData);
                    $data['success_msg'] = 'Class Added Successfully';
                }

            }

            if ($uriSegment5 == 'update') {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_classes/" . $uriSegment3 . '/classes/update/' . $uriSegment6,
                    'btn_name' => 'edit_class',
                    'btn_value' => 'Edit Class'
                );
                $form_values = $this->class_model->get($uriSegment6);
                $data['form_values'] = $form_values;

                if (isset($_POST['edit_class'])) {
                    $formData = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_class') {
                            $formData[$key] = $value;
                        }
                    }

                    $this->class_model->update($uriSegment6, $formData);
                    $data['success_msg'] = 'Class Updated Successfully';
                }



            }

            if ($uriSegment5 == 'delete') {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_classes/" . $uriSegment3 . '/classes/insert',
                    'btn_name' => 'add_class',
                    'btn_value' => 'Add Class'
                );
                
                $this->class_schedual_model->delete_by(array('classes_id' => $uriSegment6));
                $this->class_model->delete($uriSegment6);

            }

            $result = $this->class_model->get_many_by(array('gyms_id' => $uriSegment3));

            if (count($result) > 0) {
                $data['classes'] = $result;
            }

            $data['active'] = 'classes';
            $data['sub_content'] = 'classes';
        }

        if ($uriSegment4 == 'scheduals') {

            if ($uriSegment5 == 'insert' || $uriSegment5 == false) {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_classes/" . $uriSegment3 . '/scheduals/insert',
                    'btn_name' => 'add_schedual',
                    'btn_value' => 'Add Schedual'
                );

                if (isset($_POST['add_schedual'])) {
                    $formData = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_schedual') {
                            $formData[$key] = $value;
                        }
                    }
                    $formData['gyms_id'] = $uriSegment3;
                    $this->class_schedual_model->insert($formData);
                    $data['success_msg'] = 'Schedual Added Successfully';
                }

            }

            if ($uriSegment5 == 'update') {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_classes/" . $uriSegment3 . '/scheduals/update/' . $uriSegment6,
                    'btn_name' => 'edit_schedual',
                    'btn_value' => 'Edit Schedual'
                );
                $form_values = $this->class_schedual_model->get($uriSegment6);
                $data['form_values'] = $form_values;

                if (isset($_POST['edit_schedual'])) {
                    $formData = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_schedual') {
                            $formData[$key] = $value;
                        }
                    }

                    $this->class_schedual_model->update($uriSegment6, $formData);
                    $data['success_msg'] = 'Schedual Updated Successfully';
                }



            }

            if ($uriSegment5 == 'delete') {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_classes/" . $uriSegment3 . '/schedual/insert',
                    'btn_name' => 'add_schedual',
                    'btn_value' => 'Add Schedual'
                );
                $this->class_schedual_model->delete($uriSegment6);
            }

            $result = $this->class_schedual_model->get_many_by(array('gyms_id' => $uriSegment3));
            $classes = $this->class_model->get_many_by(array('gyms_id' => $uriSegment3));

            if (count($classes) > 0) {
                $data['classes'] = $classes;
            }

            if (count($result) > 0) {
                $data['scheduals'] = $result;
            }

            $data['active'] = 'scheduals';
            $data['sub_content'] = 'scheduals';
        }

        $gym = $this->gym_model->get($uriSegment3);
        $data['gym'] = $gym;
        $data['menu_active'] = 'gym_classes';
        $data['main_content'] = 'gym_classes';
        $this->load->view('includes/gym', $data);
    }

    public function gym_working_hours(){

         $uriSegment3 = $this->uri->segment(3);
         $uriSegment4 = $this->uri->segment(4);
         $uriSegment5 = $this->uri->segment(5);


        //Loading Important Models
        $this->load->model('gym_model');
         $this->load->model('gym_working_hour_model');


        //my input data to database table gym_working_hours
                 if ($uriSegment4 == 'insert' || $uriSegment4 == false) {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_working_hours/" . $uriSegment3 .'/insert/',
                    'btn_name' => 'add_schedule',
                    'btn_value' => 'Add schedule'
                );

                if (isset($_POST['add_schedule'])) {
                    $formData = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_schedule') {
                            $formData[$key] = $value;
                        }
                    }
                    $formData['gym_id'] = $uriSegment3;
                    $this->gym_working_hour_model->insert($formData);
                    $data['success_msg'] = 'schedule Added Successfully';
                }

            }

            if ($uriSegment4 == 'update') {
                $data['form'] = array(
              'action' => base_url() . "index.php/gym/gym_working_hours/" . $uriSegment3 . '/update/' . $uriSegment5,
                 'btn_name' => 'edit_schedule',
                'btn_value' => 'Edit schedule'
                );
                $form_values = $this->gym_working_hour_model->get($uriSegment5);
                $data['form_values'] = $form_values;

                if (isset($_POST['edit_schedule'])) {
                    $formData = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_schedule') {
                            $formData[$key] = $value;
                        }
                    }

                    $this->gym_working_hour_model->update($uriSegment5, $formData);
                    $data['success_msg'] = 'schedule Updated Successfully';
                }



            }

            if ($uriSegment4 == 'delete') {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_working_hours/" . $uriSegment3 . '/insert',
                    'btn_name' => 'add_schedule',
                    'btn_value' => 'Add schedule'
                );
                $this->gym_working_hour_model->delete($uriSegment5);
            
            }
        
 
        //Geting Gym Working Hours with respect to the Gym ID
        $gym_working_hours = $this->gym_working_hour_model->get_many_by(array('gym_id' => $uriSegment3));
        $data['gym_working_hours'] = $gym_working_hours; 
       
        $gym = $this->gym_model->get($uriSegment3);
        $data['gym'] = $gym;
        $data['main_content'] = "gym_working_hours";
        $data['menu_active'] = "gym_working_hours";
        $this->load->view('includes/gym', $data);



    }

    //The Gym Rates Controller Method

    public function gym_rates() {

        //INstatiating Uri Segments
        $uriSegment3 = $this->uri->segment(3);
        $uriSegment4 = $this->uri->segment(4);
        $uriSegment5 = $this->uri->segment(5);
        $uriSegment6 = $this->uri->segment(6);


        //Loading Impontant Models
        $this->load->model('gym_model');
        $this->load->model('gym_rate_model');
        $this->load->model('gym_rate_group_model');
        $this->load->model('gym_rate_duration_bundle_model');


        if ($uriSegment4 == 'groups' || $uriSegment4 == false) {

            if ($uriSegment5 == 'insert' || $uriSegment5 == false) {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_rates/" . $uriSegment3 . '/groups/insert',
                    'btn_name' => 'add_group',
                    'btn_value' => 'Add Group'
                );

                if (isset($_POST['add_group'])) {
                    $formData = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_group') {
                            $formData[$key] = $value;
                        }
                    }
                    $formData['gym_id'] = $uriSegment3;
                    $this->gym_rate_group_model->insert($formData);
                    $data['success_msg'] = 'Group Added Successfully';
                }

            }

            if ($uriSegment5 == 'update') {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_rates/" . $uriSegment3 . '/groups/update/' . $uriSegment6,
                    'btn_name' => 'edit_group',
                    'btn_value' => 'Edit Group'
                );
                $form_values = $this->gym_rate_group_model->get($uriSegment6);
                $data['form_values'] = $form_values;

                if (isset($_POST['edit_group'])) {
                    $formData = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_group') {
                            $formData[$key] = $value;
                        }
                    }

                    $this->gym_rate_group_model->update($uriSegment6, $formData);
                    $data['success_msg'] = 'Group Updated Successfully';
                }



            }

            if ($uriSegment5 == 'delete') {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_rates/" . $uriSegment3 . '/groups/insert',
                    'btn_name' => 'add_group',
                    'btn_value' => 'Add Group'
                );
                $this->gym_rate_group_model->delete($uriSegment6);
                $this->gym_rate_model->delete_by(array('group_id' => $uriSegment6));
            }

            $result = $this->gym_rate_group_model->get_many_by(array('gym_id' => $uriSegment3));

            if (count($result) > 0) {
                $data['groups'] = $result;
            }

            $data['active'] = 'groups';
            $data['sub_content'] = 'groups';


        }

        if ($uriSegment4 == 'bundles') {
            if ($uriSegment5 == 'insert' || $uriSegment5 == false) {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_rates/" . $uriSegment3 . '/bundles/insert',
                    'btn_name' => 'add_bundle',
                    'btn_value' => 'Add Bundle'
                );

                if (isset($_POST['add_bundle'])) {
                    $formData = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_bundle') {
                            $formData[$key] = $value;
                        }
                    }
                    $formData['gym_id'] = $uriSegment3;
                    $this->gym_rate_duration_bundle_model->insert($formData);
                    $data['success_msg'] = 'Bundle Added Successfully';
                }

            }

            if ($uriSegment5 == 'update') {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_rates/" . $uriSegment3 . '/bundles/update/' . $uriSegment6,
                    'btn_name' => 'edit_bundle',
                    'btn_value' => 'Edit Bundle'
                );
                $form_values = $this->gym_rate_duration_bundle_model->get($uriSegment6);
                $data['form_values'] = $form_values;

                if (isset($_POST['edit_bundle'])) {
                    $formData = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_bundle') {
                            $formData[$key] = $value;
                        }
                    }

                    $this->gym_rate_duration_bundle_model->update($uriSegment6, $formData);
                    $data['success_msg'] = 'Bundle Updated Successfully';
                }



            }

            if ($uriSegment5 == 'delete') {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_rates/" . $uriSegment3 . '/bundles/insert',
                    'btn_name' => 'add_bundle',
                    'btn_value' => 'Add bundle'
                );
                $this->gym_rate_duration_bundle_model->delete($uriSegment6);
                $this->gym_rate_model->delete_by(array('bundle_id' => $uriSegment6));
            }

            $result = $this->gym_rate_duration_bundle_model->get_many_by(array('gym_id' => $uriSegment3));

            if (count($result) > 0) {
                $data['bundles'] = $result;
            }

            $data['active'] = 'bundles';
            $data['sub_content'] = 'bundles';
        }

        if ($uriSegment4 == 'rates') {

            if ($uriSegment5 == 'insert' || $uriSegment5 == false) {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_rates/" . $uriSegment3 . '/rates/insert/',
                    'btn_name' => 'add_rate',
                    'btn_value' => 'Add Rate'
                );

                if (isset($_POST['add_rate'])) {
                    $formData = array();

                    $flag = true;
                    foreach ($_POST as $key => $value) {
                        if ($key != 'add_rate') {
                            $formData[$key] = $value;
                        }
                    }
                    $group = $this->input->post('group_id');
                    $bundle = $this->input->post('bundle_id');

                    $validator = $this->gym_rate_model->get_many_by(array('gym_id' => $uriSegment3));
                    if (isset($validator) && count($validator) > 0) {
                        ChromePhp::log($validator);
                        foreach ($validator as $value) {
                            if ($value->group_id == $group
                                && $value->bundle_id == $bundle) {
                                $flag = false;
                            }
                        }
                    }

                    $formData['gym_id'] = $uriSegment3;
                    if ($flag) {
                        $this->gym_rate_model->insert($formData);
                        $data['success_msg'] = "Gym Rate Added Successfully";
                    } else {
                        $data['error_msg'] = "Group Bundle Pair Exists";
                    }

                }
            }

            if ($uriSegment5 == 'update') {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_rates/" . $uriSegment3 . '/rates/update/' . $uriSegment6,
                    'btn_name' => 'edit_rate',
                    'btn_value' => 'Edit Rate'
                );

                $form_values = $this->gym_rate_model->get($uriSegment6);
                $data['form_values'] = $form_values;

                if (isset($_POST['edit_rate'])) {
                    $formData = array();
                    foreach ($_POST as $key => $value) {
                        if ($key != 'edit_rate') {
                            $formData[$key] = $value;
                        }
                    }

                    $this->gym_rate_model->update($uriSegment6, $formData);
                    $data['success_msg'] = "Gym Rate Edited Successfully";
                }
            }

            if ($uriSegment5 == 'delete') {
                $data['form'] = array(
                    'action' => base_url() . "index.php/gym/gym_rates/" . $uriSegment3 . '/rates/insert/',
                    'btn_name' => 'add_rate',
                    'btn_value' => 'Add Rate'
                );

                $this->gym_rate_model->delete($uriSegment6);
            }

            $groups = $this->gym_rate_group_model->get_many_by(array('gym_id' => $uriSegment3));
            $bundles = $this->gym_rate_duration_bundle_model->get_many_by(array('gym_id' => $uriSegment3));
            $rates = $this->gym_rate_model->get_many_by(array('gym_id' => $uriSegment3));

            $groupsView = array();
            $bundlesView = array();
            if (isset($rates) && count($rates) > 0) {
                foreach ($rates as $key => $value) {
                    $groupsView[$key] = $this->gym_rate_group_model->get($value->group_id);
                    $bundlesView[$key] = $this->gym_rate_duration_bundle_model->get($value->bundle_id);
                }
            }
            $data['groupsView'] = $groupsView;
            $data['bundlesView'] = $bundlesView;
            $data['rates'] = $rates;
            $data['groups'] = $groups;
            $data['bundles'] = $bundles;
            $data['active'] = 'rates';
            $data['sub_content'] = 'rates';
        }

        $gym = $this->gym_model->get($uriSegment3);
        $data['gym'] = $gym;
        $data['menu_active'] = 'gym_rates';
        $data['main_content'] = 'gym_rates';
        $this->load->view('includes/gym', $data);


    }



}

