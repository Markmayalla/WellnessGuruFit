 <div class="row">
    <div class="col-lg-4">
        <div class="box box-primary">
            <Div class="box-header">
                <h3 class="box-title">Add/Edit Bundle</h3>
            </Div>

            <div class="box-body">
        <form id="default_form" method="post" action="<?PHP echo $form['action']; ?>" data-parsley-validat>
            <input type="text"
                   value="<?PHP echo (isset($form_values) ? $form_values->bundle_name : ''); ?>"
                   name="bundle_name" class="form-control" placeholder="Group name" required/><br></br>
            <input type="submit" name="<?PHP echo $form['btn_name']; ?>" class="btn btn-info" value="<?PHP echo $form['btn_value']; ?>" />
        </form>
    </div>
    </div>
</div>

    <div class="col-lg-5">
        <Div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Gym Rate Bundles</h3>
            </div>

            <Div class="box-body">
        <table id="default_table" class="table table-hover table-stripped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <?PHP

            if (isset($bundles) && count($bundles) > 0) {
                foreach ($bundles as $value) {
                    ?>

                    <tr>
                        <td><?PHP echo $value->bundle_name; ?></td>
                        <td>
                            <a href="<?PHP echo base_url(); ?>index.php/gym/gym_rates/<?PHP echo $gym->id; ?>/bundles/update/<?PHP echo $value->id; ?>" class="btn btn-info">
                                <span class="fa fa-pencil"></span>
                            </a>
                            <a href="<?PHP echo base_url(); ?>index.php/gym/gym_rates/<?PHP echo $gym->id; ?>/bundles/delete/<?PHP echo $value->id; ?>" class="btn btn-danger">
                                <span class="fa fa-trash-o"></span>
                            </a>
                        </td>
                    </tr>

                <?PHP
                }
            }

            ?>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
</Div>
</Div>