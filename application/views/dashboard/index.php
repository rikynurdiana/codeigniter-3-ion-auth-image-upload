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
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <?php if ( $this->session->flashdata('message') ): ?>
                        <div class="alert alert-info">
                            <?php echo $this->session->flashdata('message'); ?>
                            Welcome <?= $this->session->userdata('first_name'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

    <?php $this->load->view('template/assets-footer') ?>

</body>

</html>
