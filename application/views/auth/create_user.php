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
                            <h1 class="page-header"><?php echo lang('create_user_heading');?></h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div id="infoMessage"><?php echo $message;?></div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo lang('create_user_subheading');?>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <?php echo form_open("/auth/create_user");?>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="First Name" name="first_name" id="first_name" required>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" placeholder="Last Name" name="last_name" id="last_name" required>
                                            </div>

                                            <?php
                                              if($identity_column!=='email') {
                                                  echo '<p>';
                                                  echo lang('create_user_identity_label', 'identity');
                                                  echo '<br />';
                                                  echo form_error('identity');
                                                  echo form_input($identity);
                                                  echo '</p>';
                                              }
                                              ?>

                                            <div class="form-group">
                                                <input class="form-control" placeholder="Company" name="company" id="company" required>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" placeholder="phone" name="phone" id="phone" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="email" name="email" id="email" required>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" placeholder="password" name="password" id="password" type="password" required>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" placeholder="password confirm" name="password_confirm" id="password_confirm" type="password" required>
                                            </div>
                                            <button type="submit" class="btn btn-outline btn-primary col-lg-5 pull-left"><?php echo lang('create_user_submit_btn');?></button>
                                            <a href="/auth" type="button" class="btn btn-outline btn-warning col-lg-5 pull-right">Cancel</a>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
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
