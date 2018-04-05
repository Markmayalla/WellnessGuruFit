<div class="row">
    <div class="col-lg-5">
        <div class="box box-primary">
            <Div class="box-header">
                <h3 class="box-title">Add/Edit Schedule Form</h3>
            </Div>

            <div class="box-body">
                <form id="default_form" method="post" action="<?PHP echo $form['action']; ?>" data-parsley-validate>
                    <div class="form-group">
                        <label class="control-label" form="rate_groups">Rate Groups</label>
                        <select name="group_id" class="form-control">
                            <option value="">Choose...</option>
                            <?PHP foreach ($groups as $value) { ?>
                                <option value="<?PHP echo $value->id; ?>"
                                    <?PHP echo (isset($form_values) && $form_values->group_id == $value->id ? 'selected' : ''); ?>>
                                    <?PHP echo $value->gym_groupname; ?>
                                </option>
                            <?PHP } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" form="rate_bundles">Rate Bundles</label>
                        <select name="bundle_id" class="form-control">
                            <option value="">Choose...</option>
                            <?PHP foreach ($bundles as $value) { ?>
                                <option value="<?PHP echo $value->id; ?>"
                                    <?PHP echo (isset($form_values) && $form_values->bundle_id == $value->id ? 'selected' : ''); ?>>
                                    <?PHP echo $value->bundle_name; ?>
                                </option>
                            <?PHP } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="amount">Amount</label>
                        <input type="text" name="amount"
                               value="<?PHP echo (isset($form_values) ? $form_values->amount : ''); ?>"
                               class="form-control" placeholder="amount" />
                    </div>

                    <input type="submit"
                           class="btn btn-info"
                           name="<?PHP echo $form['btn_name']; ?>" value="<?PHP echo $form['btn_value']; ?>">
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <Div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Gym Rates</h3>
            </div>

            <Div class="box-body">
                <table id="default_table" class="table table-stripped table-hover">
                    <thead>
                    <tr>
                        <th>Group</th>
                        <th>Bundle</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?PHP

                    if (isset($rates) && count($rates) > 0) {
                        foreach ($rates as $key => $value) {
                            ?>

                            <tr>
                                <td><?PHP echo $groupsView[$key]->gym_groupname; ?></td>
                                <td><?PHP echo $bundlesView[$key]->bundle_name; ?></td>
                                <td><?PHP echo $value->amount; ?></td>
                                <td>
                                    <a href="<?PHP echo base_url(); ?>index.php/gym/gym_rates/<?PHP echo $gym->id; ?>/rates/update/<?PHP echo $value->id; ?>" class="btn btn-info">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                    <a href="<?PHP echo base_url(); ?>index.php/gym/gym_rates/<?PHP echo $gym->id; ?>/rates/delete/<?PHP echo $value->id; ?>" class="btn btn-danger">
                                        <span class="fa fa-trash-o"></span>
                                    </a>
                                </td>
                            </tr>

                        <?PHP
                        }
                    }

                    ?>
                    </tbody>
                </table>
            </Div>
        </Div>
    </div>
</div>