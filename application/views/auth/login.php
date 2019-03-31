<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('template/assets-header') ?>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo lang('login_heading');?></h3>
                    </div>
                    <div id="infoMessage"><?php echo $message;?></div>
                    <div class="panel-body">
                        <?php echo form_open("auth/login");?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="identity" type="email" id="identity" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" id="password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember Me
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-outline btn-success col-lg-12"><?php echo lang('login_submit_btn');?></button>
                            </fieldset>
                        <?php echo form_close();?><br>
                        <p>
                        <a href="forgot_password" class="pull-left"><?php echo lang('login_forgot_password');?></a>
                        <a class ="pull-right" href="/">Back To Main</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('template/assets-footer') ?>

</body>

</html>
