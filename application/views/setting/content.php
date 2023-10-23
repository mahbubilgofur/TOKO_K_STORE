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
                    <div class="alert alert-info" role="alert">
                        <?php
                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                            echo $this->session->flashdata('pesan');
                            echo '</h5></div>';
                        }
                        echo form_open('admin/setting'); ?>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="<?= base_url() ?>admin/setting" method="POST">
                            <div class="form-group">
                                <label>PROVINSI</label>
                                <select name="provinsi" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <label>KOTA</label>
                                <select name="kota" class="form-control">
                                    <option value="<?= $setting->lokasi ?>"><?= $setting->lokasi ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>NAMA TOKO</label>
                                <input type="text" class="form-control" name="nama_toko" placeholder="NAMA TOKO" required value="<?= $setting->nama_toko ?>">
                            </div>
                            <div class="form-group">
                                <label>NOMER_TLP</label>
                                <input type="text" class="form-control" name="no_telepon" placeholder="NOMER_TLP" required value="<?= $setting->no_telepon ?>">
                            </div>
                            <div class="form-group">
                                <label>ALAMAT</label>
                                <input type="text" class="form-control" name="alamat_toko" placeholder="ALAMAT" required value="<?= $setting->alamat_toko ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="sumbmit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        <script>
                            $(document).ready(function() {
                                $.ajax({
                                    type: "POST",
                                    url: "<?= base_url('raja_ongkir/provinsi') ?>",
                                    success: function(hasil_provinsi) {
                                        $("select[name=provinsi]").html(hasil_provinsi);
                                    }
                                });
                                $("select[name=provinsi]").on("change", function() {
                                    var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

                                    $.ajax({
                                        type: "POST",
                                        url: "<?= base_url('raja_ongkir/kota') ?>",
                                        data: 'id_provinsi=' + id_provinsi_terpilih,
                                        success: function(hasil_kota) {
                                            $("select[name=kota]").html(hasil_kota);
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

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