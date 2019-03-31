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
                        <h1 class="page-header">Form Create Biodata</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php if (validation_errors() || isset($error)) : ?>
                                    <div class="alert alert-danger" role="alert" align="center">
                                        <?=validation_errors()?>
                                        <?=(isset($error) ? $error : '')?>
                                    </div>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" action="/create" method="post" enctype="multipart/form-data" />
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input id="nama" type="text" name="nama" class="form-control" value="<?php echo $nama; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Umur</label>
                                                <input id="umur" type="number" name="umur" class="form-control" value="<?php echo $umur; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Upload Foto</label>
                                                <input id="input-1" type="file" class="file" name="userfile">
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </form>
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

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
