
    <div class="row">
        <div class="col-lg-3">

            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">Sub Menu</h3>
                </div>

                <div class="box-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="<?PHP echo (isset($active) && $active == 'groups' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url() ?>index.php/gym/gym_rates/<?PHP echo $gym->id; ?>/groups">Rate Groups</a>
                        </li>
                        <li class="<?PHP echo (isset($active) && $active == 'bundles' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url() ?>index.php/gym/gym_rates/<?PHP echo $gym->id; ?>/bundles">Rate Bundles</a>
                        </li>
                        <li class="<?PHP echo (isset($active) && $active == 'rates' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url() ?>index.php/gym/gym_rates/<?PHP echo $gym->id; ?>/rates">Rates Amounts</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="col-lg-9">
            <div class="row">
                <Div class="col-lg-12">
                    <?PHP if (isset($success_msg)) { ?>
                        <div class="alert alert-success"><?PHP echo $success_msg; ?></div>
                    <?PHP } ?>
                    <?PHP if (isset($error_msg)) { ?>
                        <div class="alert alert-danger"><?PHP echo $error_msg; ?></div>
                    <?PHP } ?>

                </Div>
            </div>

            <?PHP $this->load->view('gym/gym_rates/' . $sub_content); ?>
        </div>
    </div>
