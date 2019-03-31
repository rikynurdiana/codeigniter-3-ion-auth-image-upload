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
                        <h1 class="page-header">Detail Biodata <?php echo $data->nama; ?></h1>
                    </div>
                </div>

                <div class="clearfix"></div>

                <table class="table table-striped">
                    <tr>
                        <td>ID</td>
                        <td><?php echo $data->id; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><?php echo $data->nama; ?></td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td><?php echo $data->umur; ?></td>
                    </tr>
                    <?php if ($data->foto == ''): ?>
                        <tr>
                            <td>Foto</td>
                            <td><img src="/uploads/noimage.jpg" alt="no image" width="250px"></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td>Foto</td>
                            <td><img src="/uploads/foto/<?= $data->foto; ?>" alt="<?= $data->nama; ?>" width="250px"></td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <td>Create at</td>
                        <td><?php echo $data->create_at; ?></td>
                    </tr>
                    <tr>
                        <td>Update at</td>
                        <td><?php echo $data->update_at; ?></td>
                    </tr>
                  </table>
                  <a href="/biodata" type="button" class="btn btn-warning">Kembali</a>
            </div>
        </div>

    </div>

    <?php $this->load->view('template/assets-footer') ?>

</body>

</html>