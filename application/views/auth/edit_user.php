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
                            <h1 class="page-header"><?php echo lang('edit_user_heading');?></h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div id="infoMessage"><?php echo $message;?></div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo lang('edit_user_subheading');?>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <?php echo form_open(uri_string());?>
                                            <div class="form-group">
                                                <input class="form-control" value="<?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?>" name="first_name" id="first_name" required>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" value="<?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?>" name="last_name" id="last_name" required>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" value="<?php echo htmlspecialchars($user->company,ENT_QUOTES,'UTF-8');?>" name="company" id="company" required>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" value="<?php echo htmlspecialchars($user->phone,ENT_QUOTES,'UTF-8');?>" name="phone" id="phone" required>
                                            </div>
                                            <hr>
                                            <?php if ($this->ion_auth->is_admin()): ?>

                                              <h3><?php echo lang('edit_user_groups_heading');?></h3>
                                              <?php foreach ($groups as $group):?>
                                                  <label class="checkbox">
                                                  <?php
                                                      $gID=$group['id'];
                                                      $checked = null;
                                                      $item = null;
                                                      foreach($currentGroups as $grp) {
                                                          if ($gID == $grp->id) {
                                                              $checked= ' checked="checked"';
                                                          break;
                                                          }
                                                      }
                                                  ?>
                                                  <div class="row col-lg-6">
                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                                  <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                                  </div>
                                                  </label>
                                              <?php endforeach?>

                                          <?php endif ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" value="<?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?>" name="email" id="email" required>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" placeholder="password" name="password" id="password" type="password">
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" placeholder="password confirm" name="password_confirm" id="password_confirm" type="password">
                                            </div>

                                            <?php echo form_hidden('id', $user->id);?>
                                            <?php echo form_hidden($csrf); ?>
                                            <button type="submit" class="btn btn-outline btn-primary col-lg-5 pull-left"><?php echo lang('edit_user_submit_btn');?></button>
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
