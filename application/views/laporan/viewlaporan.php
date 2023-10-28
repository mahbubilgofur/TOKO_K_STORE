<!-- C O N T E N T -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row">
                <!-- /.card-body -->
                <div class="card col-4">
                    <div class="card-header">
                        <div class="alert alert-info" role="alert">
                            LAPORAN HARIAN
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php echo form_open('laporan/laporan_harian') ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <select name="tanggal" class="form-control">
                                            <?php
                                            $mulai = 1;
                                            for ($i = $mulai; $i < $mulai + 31; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Bulan</label>
                                        <select name="bulan" class="form-control">
                                            <?php
                                            $mulai = 1;
                                            for ($i = $mulai; $i < $mulai + 12; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <select name="tahun" class="form-control">
                                            <?php
                                            $mulai = date('Y');
                                            for ($i = $mulai; $i < $mulai + 10; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>

                <div class="card col-4">
                    <div class="card-header">
                        <div class="alert alert-info" role="alert">
                            LAPORAN BULANAN
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php echo form_open('laporan/laporan_bulanan') ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bulan</label>
                                        <select name="bulan" class="form-control">
                                            <?php
                                            $mulai = 1;
                                            for ($i = $mulai; $i < $mulai + 12; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <select name="tahun" class="form-control">
                                            <?php
                                            $mulai = date('Y');
                                            for ($i = $mulai; $i < $mulai + 10; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="card col-4">
                    <div class="card-header">
                        <div class="alert alert-info" role="alert">
                            LAPORAN TAHUNAN
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php echo form_open('laporan/laporan_tahunan') ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <select name="tahun" class="form-control">
                                            <?php
                                            $mulai = date('Y');
                                            for ($i = $mulai; $i < $mulai + 10; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

    </section>
    <!-- /.content -->
</div>