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
                                <input type="hidden" name="id_produk" value="<?php echo $data_produk->id_produk; ?>">
                                <!-- Menampilkan gambar yang saat ini ada -->
                                <div class="form-group">
                                    <label>Gambar saat ini:</label><br>
                                    <img src="<?php echo base_url('./gambarproduk/') . $data_produk->gambar; ?>" alt="Gambar Produk" style="max-width: 50%;">
                                </div>

                                <div class="form-group">
                                    <label>NAMA</label>
                                    <input type="text" class="form-control" name="nama" placeholder="NAMA" value="<?php echo $data_produk->nama; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>HARGA</label>
                                    <input type="text" class="form-control" name="harga" placeholder="HARGA" value="<?php echo $data_produk->harga; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>GAMBAR</label>
                                    <input type="file" class="form-control" name="gambar" id="gambar" accept=".jpg, .jpeg, .png, .webp">
                                </div>

                                <!-- Tampilkan gambar yang akan diunggah (opsional) -->
                                <div class="form-group">
                                    <label>Gambar yang akan diunggah:</label>
                                    <img id="preview-gambar" src="#" alt="Preview Gambar" style="max-width: 50%; display: none;">
                                </div>
                                <div class="form-group">
                                    <label>DESKRIPSI</label>
                                    <input type="text" class="form-control" name="deskripsi" placeholder="DESKRIPSI" value="<?php echo $data_produk->deskripsi; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>ID KATEGORI</label>
                                    <input type="text" class="form-control" name="id_kategori" placeholder="ID_KATEGORI" value="<?php echo $data_produk->id_kategori; ?>" required>
                                </div>
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

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
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