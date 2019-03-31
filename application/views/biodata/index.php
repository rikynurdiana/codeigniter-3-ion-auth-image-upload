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
                            Biodata
                            <div class="pull-right"><a href="/input" type="button" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a></div>
                            <div class="clearfix"></div>
                        </h1>
                    </div>
                </div>

                <?php if ( $this->session->flashdata('add_success') ): ?>
                    <div class="alert alert-info">
                        <?php echo $this->session->flashdata('add_success'); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $this->session->flashdata('edit_success') ): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('edit_success'); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $this->session->flashdata('delete_success') ): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('delete_success'); ?>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                List Biodata
                            </div>
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">NAMA</th>
                                            <th class="text-center">UMUR</th>
                                            <th class="text-center">FOTO</th>
                                            <th class="text-center">CREATE AT</th>
                                            <th class="text-center">UPDATE AT</th>
                                            <th class="text-center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d): ?>
                                            <tr>
                                                <td><?= $d->id ?></td>
                                                <td><?= $d->nama ?></td>
                                                <td><?= $d->umur ?></td>
                                                <?php if ($d->foto == ''): ?>
                                                    <td>
                                                        <img src="/uploads/noimage.jpg" alt="no image" width="80px">
                                                    </td>
                                                <?php else: ?>
                                                    <td>
                                                        <img src="/uploads/foto/<?= $d->foto; ?>" alt="<?= $d->nama; ?>" width="80px">
                                                    </td>
                                                <?php endif ?>
                                                <td><?= $d->create_at ?></td>
                                                <td><?= $d->update_at ?></td>
                                                <td class="text-center">
                                                    <a href="/edit/<?= $d->id ?>" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
                                                    <a href="/read/<?= $d->id ?>" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                                                    <a href="/delete/<?= $d->id ?>" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a> &nbsp;&nbsp;
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
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

    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

</body>

</html>
