<!DOCTYPE html>
<html lang="en">
<head>

    <?php $this->load->view('template/assets-header') ?>

</head>
    <body>
        <div id="wrapper">

            <?php $this->load->view('template/nav-menu') ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?php echo lang('forgot_password_heading');?></h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div id="infoMessage"><?php echo $message;?></div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo lang('forgot_password_subheading');?>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php echo form_open("auth/forgot_password");?>
                                            <!-- <div class="form-group">
                                                <input class="form-control" placeholder="Group Name" name="group_name" id="group_name" required>
                                            </div> -->
                                            <p>
                                                <label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
                                                <?php echo form_input($identity);?>
                                              </p>
                                            <button type="submit" class="btn btn-outline btn-primary col-lg-5 pull-left"><?php echo lang('forgot_password_submit_btn');?></button>
                                            <a href="/dashboard/auth" type="button" class="btn btn-outline btn-warning col-lg-5 pull-right">Cancel</a>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php $this->load->view('template/assets-footer') ?>

    </body>
</html>
