<?php $this->load->view('layout/head') ?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('layout/navbar') ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Detail Data</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?= site_url() ?>peserta/import" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Import Data</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="csv">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Data <?= $peserta->nama_peserta ?>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Potition</th>
                                                <th>Jabatan</th>
                                                <th>Area</th>
                                                <th>Email</th>
                                                <th>Batch</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $peserta->nama_peserta ?></td>
                                                <td><?= $peserta->posisi_peserta ?></td>
                                                <td><?= $peserta->jabatan_peserta ?></td>
                                                <td><?= $peserta->area_peserta ?></td>
                                                <td><?= $peserta->email_peserta ?></td>
                                                <td><?= $peserta->batch_peserta ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    Direct Superior
                                </div>
                                <div class="card-body">
                                    <table id="data" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Potition</th>
                                                <th>Jabatan</th>
                                                <th>Area</th>
                                                <th>Email</th>
                                                <th>Batch</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($direct_superior as $data) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->nama_peserta ?></td>
                                                    <td><?= $data->posisi_peserta ?></td>
                                                    <td><?= $data->jabatan_peserta ?></td>
                                                    <td><?= $data->area_peserta ?></td>
                                                    <td><?= $data->email_peserta ?></td>
                                                    <td><?= $data->batch_peserta ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    Superior Name
                                </div>
                                <div class="card-body">
                                    <table id="data" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Potition</th>
                                                <th>Jabatan</th>
                                                <th>Area</th>
                                                <th>Email</th>
                                                <th>Batch</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($superior_name as $data) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->nama_peserta ?></td>
                                                    <td><?= $data->posisi_peserta ?></td>
                                                    <td><?= $data->jabatan_peserta ?></td>
                                                    <td><?= $data->area_peserta ?></td>
                                                    <td><?= $data->email_peserta ?></td>
                                                    <td><?= $data->batch_peserta ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <?php $this->load->view('layout/footer'); ?>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view('layout/script'); ?>
</body>

</html>