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
                            <h2 class="card-title">EDIT PRODUK</h2>
                            <br>
                            <form method="post" action="<?php echo base_url('produk/updateproduk'); ?>" enctype="multipart/form-data">
                                <!-- Menggunakan hidden input untuk mengirimkan ID produk yang sedang diedit -->
                                <input type="text" class="form-control" value="<?php echo $data_produk->id_produk ?>" disabled>
                                <input type="hidden" name="id_produk" value="<?php echo $data_produk->id_produk ?>">

                                <div class="form-group">
                                    <label>Gambar saat ini:</label><br>
                                    <img src="<?php echo base_url('./gambarproduk/') . $data_produk->gambar; ?>" alt="Gambar Produk" style="max-width: 50%;">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>NAMA</label>
                                        <input type="text" class="form-control" name="nama" placeholder="NAMA" required value="<?php echo $data_produk->nama; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>HARGA</label>
                                        <input type="text" class="form-control" name="harga" placeholder="HARGA" required value="<?php echo $data_produk->harga; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>GAMBAR</label>
                                        <input type="file" class="form-control" name="gambar" id="gambar" accept=".jpg, .jpeg, .png, .webp">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>DESKRIPSI</label>
                                        <input type="text" class="form-control" name="deskripsi" placeholder="DESKRIPSI" required value="<?php echo $data_produk->deskripsi; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>BERAT</label>
                                        <input type="number" class="form-control" name="berat" placeholder="BERAT SATUAN GR" required value="<?php echo $data_produk->berat; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>ID KATEGORI</label>
                                        <select class="form-control" name="id_kategori" required>
                                            <option value="">Pilih Kategori</option>
                                            <?php foreach ($getketegori as $row) { ?>
                                                <option value="<?= $row->id_kategori; ?>" <?php if ($row->id_kategori == $data_produk->id_kategori) echo 'selected'; ?>>
                                                    <?= $row->nama; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>ID VARIASIPRODUK</label>
                                        <select class="form-control" name="id_variasiproduk" required>
                                            <option value="">Pilih Kategori</option>
                                            <?php foreach ($getvariasi as $row) { ?>
                                                <option value="<?= $row->id_variasiproduk; ?>" <?php if ($row->id_variasiproduk == $data_produk->id_variasiproduk) echo 'selected'; ?>>
                                                    <?= $row->nama; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <!-- Tampilkan gambar yang akan diunggah (opsional) -->
                                <div class="form-group">
                                    <label>Gambar yang akan diunggah:</label><br>
                                    <img id="preview-gambar" src="#" alt="Preview Gambar" style="max-width: 50%; display: none;">
                                </div>
                                <div class="modal-footer">
                                    <button type="<?= base_url('produk/') ?>" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                            <script>
                                // Fungsi untuk menampilkan pratinjau gambar saat memilih berkas gambar
                                function previewImage(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            $('#preview-gambar').attr('src', e.target.result);
                                            $('#preview-gambar').css('display', 'block');
                                        };
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }

                                // Menjalankan fungsi previewImage saat berkas gambar dipilih
                                $('#gambar').change(function() {
                                    previewImage(this);
                                });
                            </script>


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