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
                        <!-- Tampilkan pesan sukses jika ada -->
                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('success'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <!-- Tampilkan pesan error jika ada -->
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('error'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                    </div>
                    <!-- /.card -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        TAMBAH
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
                                        <form action="<?= base_url() ?>variasiproduk/input_variasi" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>ID VARIASI</label>
                                                <input type="text" class="form-control" name="id_variasiproduk" placeholder="ID VARIASI" value="<?php echo sprintf($data_variasi) ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="id_produk">ID PRODUK</label>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <select class="form-control" id="id_produk" name="id_produk" required>
                                                        <option value="">Pilih Produk</option>
                                                        <?php foreach ($data_produk as $row) : ?>
                                                            <option value="<?= $row->id_produk; ?>" data-gambar1="<?= base_url('gambarproduk/' . $row->gambar1); ?>" data-gambar2="<?= base_url('gambarproduk/' . $row->gambar2); ?>" data-gambar3="<?= base_url('gambarproduk/' . $row->gambar3); ?>" data-gambar4="<?= base_url('gambarproduk/' . $row->gambar4); ?>" data-gambar5="<?= base_url('gambarproduk/' . $row->gambar5); ?>">
                                                                <?= $row->nama; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="selected_gambar">Pilih Gambar</label>
                                                <div id="gambar-container"></div>
                                            </div>
                                            <input type="hidden" id="gambar_terpilih" name="gambar_terpilih" value="">

                                            <div class="form-group">
                                                <label for="preview">Gambar yang Dipilih:</label>
                                                <img id="preview" src="#" alt="Preview Gambar" style="max-width: 100px; max-height: 100px;">
                                            </div>
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <div class="form-group">
                                                    <label>Warna</label>
                                                    <input type="text" class="form-control warna-input" name="warna<?= $i ?>" placeholder="Warna" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>HARGA</label>
                                                    <input type="number" class="form-control harga-input" name="harga<?= $i ?>" placeholder="Harga" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ukuran</label>
                                                    <input type="text" class="form-control" name="ukuran<?= $i ?>" placeholder="Ukuran" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Stok</label>
                                                    <input type="number" class="form-control" name="stok<?= $i ?>" placeholder="Stok" required>
                                                </div>
                                            <?php endfor; ?>

                                            <!-- Tambahkan skrip JavaScript di sini -->
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    // Ambil elemen input warna pertama
                                                    var warnaInput1 = document.querySelector('.warna-input');

                                                    // Tambahkan event listener untuk mengisi nilai ke semua input warna
                                                    warnaInput1.addEventListener('input', function() {
                                                        var warnaValue = this.value;

                                                        // Ambil semua input warna
                                                        var warnaInputs = document.querySelectorAll('.warna-input');

                                                        // Iterasi melalui semua input warna dan isi nilai yang sama
                                                        warnaInputs.forEach(function(input) {
                                                            input.value = warnaValue;
                                                        });
                                                    });
                                                    var hargaInput1 = document.querySelector('.harga-input');

                                                    // Tambahkan event listener untuk mengisi nilai ke semua input warna
                                                    hargaInput1.addEventListener('input', function() {
                                                        var hargaValue = this.value;

                                                        // Ambil semua input harga
                                                        var hargaInputs = document.querySelectorAll('.harga-input');

                                                        // Iterasi melalui semua input harga dan isi nilai yang sama
                                                        hargaInputs.forEach(function(input) {
                                                            input.value = hargaValue;
                                                        });
                                                    });
                                                });
                                            </script>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                        <!-- Script JavaScript -->
                                        <script>
                                            document.getElementById('warna').addEventListener('input', function() {
                                                this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase();
                                            });
                                            document.getElementById('harga').addEventListener('input', function() {
                                                this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase();
                                            });
                                        </script>

                                        <script>
                                            document.getElementById('id_produk').addEventListener('change', function() {
                                                var selectedOption = this.options[this.selectedIndex];
                                                var gambarContainer = document.getElementById('gambar-container');
                                                var previewImage = document.getElementById('preview');

                                                // Clear previous content
                                                gambarContainer.innerHTML = '';

                                                for (var i = 1; i <= 5; i++) {
                                                    var img = document.createElement('img');
                                                    img.src = selectedOption.getAttribute('data-gambar' + i);
                                                    img.style.width = '80px';
                                                    img.style.height = '80px';

                                                    var label = document.createElement('label');
                                                    label.appendChild(img);

                                                    var radio = document.createElement('input');
                                                    radio.type = 'radio';
                                                    radio.name = 'selected_gambar';
                                                    radio.value = 'gambar' + i;
                                                    radio.required = true;

                                                    // Attach a change event listener to update the preview image
                                                    radio.addEventListener('change', function() {
                                                        previewImage.src = this.previousSibling.src;
                                                        document.getElementById('gambar_terpilih').value = this.value;
                                                    });

                                                    label.appendChild(radio);
                                                    gambarContainer.appendChild(label);
                                                }
                                            });

                                            function previewImage(input) {
                                                var preview = document.getElementById('preview');
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        preview.src = e.target.result;
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th scope="col">ID VARIASIPRODUK</th>
                                <th scope="col">ID PRODUK</th>
                                <th scope="col">HARGA</th>
                                <th scope="col">WARNA</th>
                                <th scope="col">UKURAN</th>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">STOK</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_variasiproduk as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row->id_variasiproduk ?></td>
                                        <td><?php echo $row->nama_produk ?></td>
                                        <td><?php echo $row->harga ?></td>
                                        <td><?php echo $row->warna ?></td>
                                        <td><?php echo $row->ukuran ?></td>
                                        <td>
                                            <img src="<?= base_url('gambarvariasi/' . $row->gambar); ?>" alt="" width="100px" height="100px">
                                        </td>
                                        <td><?php echo $row->stok ?></td>
                                        <td>

                                            <a href="<?php echo base_url('variasiproduk/delete/') . $row->id_variasiproduk ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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