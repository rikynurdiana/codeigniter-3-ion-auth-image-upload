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
                            <h1 class="page-header"><?php echo lang('edit_group_heading');?></h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div id="infoMessage"><?php echo $message;?></div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo lang('edit_group_subheading');?>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php echo form_open(current_url());?>
                                            <div class="form-group">
                                                <input class="form-control" value="<?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8');?>" name="group_name" id="group_name">
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" value="<?php echo htmlspecialchars($group->description,ENT_QUOTES,'UTF-8');?>" name="group_description" id="group_description">
                                            </div>

                                            <button type="submit" class="btn btn-outline btn-primary col-lg-5 pull-left"><?php echo lang('edit_group_submit_btn');?></button>
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
