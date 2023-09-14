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
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    <!-- /.card -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        TAMBAH PRODUK
                    </button>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Insert Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?php echo base_url('produk/Inputproduk'); ?>" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>ID PRODUK</label>
                                                <input type="text" class="form-control" name="id_produk" placeholder="ID PRODUK" value="<?php echo sprintf($queryproduk) ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>NAMA</label>
                                                <input type="text" class="form-control" name="nama" placeholder="NAMA" required>
                                            </div>
                                            <div class="form-group">
                                                <label>HARGA</label>
                                                <input type="text" class="form-control" name="harga" placeholder="HARGA" required>
                                            </div>
                                            <div class="form-group">
                                                <label>GAMBAR</label>
                                                <input type="file" class="form-control" name="gambar" id="gambar" accept=".jpg, .jpeg, .png, .webp" required>
                                            </div>

                                            <!-- Tampilkan gambar yang akan diunggah (opsional) -->
                                            <div class="form-group">
                                                <label>Gambar yang akan diunggah:</label>
                                                <img id="preview-gambar" src="#" alt="Preview Gambar" style="max-width: 50%; display: none;">
                                            </div>
                                            <div class="form-group">
                                                <label>DESKRIPSI</label>
                                                <input type="text" class="form-control" name="deskripsi" placeholder="DESKRIPSI" required>
                                            </div>
                                            <div class="form-group">
                                                <label>ID KATEGORI</label>
                                                <input type="text" class="form-control" name="id_kategori" placeholder="ID_KATEGORI" required>
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
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID KELAS</th>
                                    <th scope="col">NAMA KELAS</th>
                                    <th scope="col">HARGA</th>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">DESKRIPSI</th>
                                    <th scope="col">ID_KATEGORI</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_produk as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->id_produk ?></td>
                                        <td><?php echo $row->nama ?></td>
                                        <td><?php echo $row->harga ?></td>
                                        <td>
                                            <img src="<?= base_url('gambarproduk/' . $row->gambar); ?>" alt="" width="100px" height="100px">
                                        </td>
                                        <td><?php echo $row->deskripsi ?></td>
                                        <td><?php echo $row->id_kategori ?></td>
                                        <td>
                                            <a href="<?php echo base_url('produk/update/') . $row->id_produk ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url('produk/delete/') . $row->id_produk ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>




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