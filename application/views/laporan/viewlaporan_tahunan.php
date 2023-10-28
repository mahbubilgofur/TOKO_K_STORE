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
        <div class="container-fluid">
            <div class="row">
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <div class="col-12">
                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i>LAPORAN HARIAN
                                            <small class="float-right">Date: Tahun:<?= $tahun ?></small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NO ORDER</th>
                                                    <th>TANGGAL ORDER</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $grand_total = 0;
                                                foreach ($laporan as $key => $value) {
                                                    $grand_total = $grand_total + $value->grand_total;
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $value->no_order ?></td>
                                                        <td><?= $value->tgl_order ?></td>
                                                        <td>Rp.<?= number_format($value->grand_total, 0) ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <h5>GRAND TOTAL :Rp.<?= number_format($grand_total, 0) ?></h5>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <button rel="noopener" onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</button>

                                    </div>
                                </div>
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>