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
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Insert Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?php echo base_url('produk/Inputproduk'); ?>" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>ID PRODUK</label>
                                                    <input type="text" class="form-control" name="id_produk" placeholder="ID PRODUK" value="<?php echo sprintf($queryproduk) ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');
                                                    ?>
                                                    <label>NAMA</label>
                                                    <input type="text" class="form-control" name="nama" placeholder="NAMA" required value="<?= set_value('nama'); ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>HARGA</label>
                                                    <input type="text" class="form-control" name="harga" placeholder="HARGA" required value="<?= set_value('harga'); ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>GAMBAR</label>
                                                    <input type="file" class="form-control" name="gambar" id="gambar" accept=".jpg, .jpeg, .png, .webp" required value="<?= set_value('gambar'); ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>DESKRIPSI</label>
                                                    <input type="text" class="form-control" name="deskripsi" placeholder="DESKRIPSI" required value="<?= set_value('deskripsi'); ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>BERAT</label>
                                                    <input type="number" class="form-control" name="berat" placeholder="BERAT SATUAN GR" required value="<?= set_value('deskripsi'); ?>">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>ID KATEGORI</label>
                                                    <select class="form-control" name="id_kategori" required value="<?= set_value('id_kategori'); ?>">
                                                        <option value="">Pilih Kategori</option>
                                                        <?php foreach ($getketegori as $row) { ?>
                                                            <option value="<?= $row->id_kategori; ?>"><?= $row->nama; ?></option>
                                                        <?php } ?>
                                                    </select>


                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>ID VARIASIPRODUK</label>
                                                    <select class="form-control" name="id_variasiproduk" required value="<?= set_value('id_variasiproduk'); ?>">
                                                        <option value="">Pilih Kategori</option>
                                                        <?php foreach ($getvariasi as $row) { ?>
                                                            <option value="<?= $row->id_variasiproduk; ?>"><?= $row->nama; ?></option>
                                                        <?php } ?>
                                                    </select>


                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span id="preview-gambar-container">
                                                    <img id="preview-gambar" src="<?= base_url('template/img/page.jpg') ?>" alt="Belum diupload" style="max-width: 100px; max-height: 100px;">
                                                </span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                        <script>
                                            // Fungsi untuk menampilkan gambar saat berkas gambar diunggah
                                            function previewImage(input) {
                                                var previewGambar = document.getElementById('preview-gambar');

                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function(e) {
                                                        previewGambar.src = e.target.result;
                                                        previewGambar.style.display = 'block'; // Tampilkan gambar
                                                    };

                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }

                                            // Membaca perubahan pada input berkas gambar
                                            var inputBerkas = document.getElementById('gambar');
                                            inputBerkas.addEventListener('change', function() {
                                                previewImage(inputBerkas);
                                            });
                                        </script>


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
                                    <th scope="col">ID VARIASIPRODUK</th>
                                    <th scope="col">BERAT</th>
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
                                        <td><?php echo $row->nama_kategori ?></td>
                                        <td><?php echo $row->nama_variasi ?></td>
                                        <td><?php echo $row->berat ?></td>
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