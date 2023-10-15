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
                        <li class="breadcrumb-item"><a href="<?= base_url('welcome') ?>">Home</a></li>
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

                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">EDIT KATEGORI</h2>
                            <br>
                            <form class="form-sample" action="<?= base_url('kategori/updatekategori') ?>" method="POST">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">ID KATEGORI</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?php echo $data_kategori->id_kategori ?>" disabled>
                                                <input type="hidden" name="id_kategori" value="<?php echo $data_kategori->id_kategori ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">NAMA</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nama" value="<?php echo $data_kategori->nama ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">DESKRIPSI</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="deskripsi" value="<?php echo $data_kategori->deskripsi ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">PILIH</label>
                                            <div class="col-sm-9">
                                                <select name="tambahkan_master" id="tambahkan_master" class="form-control">
                                                    <option value="0">Pilih master utama</option>
                                                    <option value="0">Jadi master</option>
                                                    <?php foreach ($data_kategori as $row) {
                                                        $selected = ($row->id_kategori == $data_kategori->induk_id) ? 'selected' : '';
                                                        echo '<option value="' . $row->id_kategori . '" ' . $selected . '>' . $row->nama . '</option>';
                                                    }

                                                    // Ambil data dari tabel tbl_kategori dan tampilkan dalam elemen select
                                                    if (isset($kategori_db) && is_array($kategori_db)) {
                                                        foreach ($kategori_db as $kategori) {
                                                            $selected = ($kategori->id_kategori == $data_kategori->induk_id) ? 'selected' : '';
                                                            echo '<option value="' . $kategori->id_kategori . '" ' . $selected . '>' . $kategori->nama . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <br>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-warning" href="<?= base_url() ?>kategori" role="button">Kembali</a>
                            </form>
                        </div>
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