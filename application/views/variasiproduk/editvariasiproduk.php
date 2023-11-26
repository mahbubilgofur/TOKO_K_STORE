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
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">EDIT VARIASIPRODUK</h2>
                            <br>
                            <form class="form-sample" action="<?= base_url('variasiproduk/editvariasi') ?>" method="POST" enctype="multipart/form-data">
                                <!-- ID Variasi -->
                                <div class="form-group">
                                    <label>ID VARIASI</label>
                                    <input type="text" class="form-control" name="id_variasiproduk" placeholder="ID VARIASI" value="<?= $variasi->id_variasiproduk; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="id_produk">ID PRODUK</label>
                                    <select class="form-control" id="id_produk" name="id_produk" required>
                                        <option value="">Pilih Produk</option>
                                        <?php foreach ($data_produk as $row) : ?>
                                            <?php $selected = ($row->id_produk == $variasi->id_produk) ? 'selected' : ''; ?>
                                            <option value="<?= $row->id_produk; ?>" data-gambar1="<?= base_url('gambarproduk/' . $row->gambar1); ?>" data-gambar2="<?= base_url('gambarproduk/' . $row->gambar2); ?>" data-gambar3="<?= base_url('gambarproduk/' . $row->gambar3); ?>" data-gambar4="<?= base_url('gambarproduk/' . $row->gambar4); ?>" data-gambar5="<?= base_url('gambarproduk/' . $row->gambar5); ?>" <?= $selected; ?>>
                                                <?= $row->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Tambahkan input untuk warna, ukuran, stok, dan atribut lainnya -->
                                <div class="form-group">
                                    <label for="warna">Warna</label>
                                    <input type="text" class="form-control" id="warna" name="warna" placeholder="Warna" value="<?= $variasi->warna; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="ukuran">Ukuran</label>
                                    <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="Ukuran" value="<?= $variasi->ukuran; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" value="<?= $variasi->stok; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="gambar">Pilih Gambar</label>
                                    <div id="gambar-container">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <label>
                                                <?php
                                                $gambar_variasi = 'gambar' . $i;
                                                $is_checked = (in_array($gambar_variasi, explode(',', $variasi->gambar))) ? 'checked' : '';
                                                ?>
                                                <input type="checkbox" name="selected_gambar[]" value="<?= $gambar_variasi ?>" <?= $is_checked; ?>>
                                                <img src="<?= base_url('gambarvariasi/' . $gambar_variasi . '.jpg'); ?>" alt="Gambar <?= $i ?>" style="width: 80px; height: 80px;">
                                            </label>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <!-- Tampilkan gambar yang dipilih -->
                                <div class="form-group">
                                    <label for="preview">Gambar yang Dipilih:</label>
                                    <img id="preview" src="<?= base_url('gambarvariasi/' . $variasi->gambar) ?>" alt="Preview Gambar" style="max-width: 100px; max-height: 100px;">
                                </div>

                                <!-- Hidden input untuk menyimpan gambar terpilih -->
                                <input type="hidden" id="gambar_terpilih" name="gambar_terpilih" value="<?= $variasi->gambar ?>">

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

                                            var checkbox = document.createElement('input');
                                            checkbox.type = 'checkbox';
                                            checkbox.name = 'selected_gambar[]';
                                            checkbox.value = 'gambar' + i;

                                            // Check if the current image is selected
                                            checkbox.checked = (checkbox.value == '<?= $variasi->gambar ?>');

                                            // Attach a change event listener to update the preview image
                                            checkbox.addEventListener('change', function() {
                                                var checkedBoxes = document.querySelectorAll('input[name="selected_gambar[]"]:checked');
                                                if (checkedBoxes.length > 0) {
                                                    previewImage.src = checkedBoxes[0].previousSibling.src;
                                                    document.getElementById('gambar_terpilih').value = checkedBoxes[0].value;
                                                } else {
                                                    previewImage.src = ''; // No image selected
                                                    document.getElementById('gambar_terpilih').value = '';
                                                }

                                                // Uncheck other checkboxes when one is checked
                                                for (var j = 0; j < checkedBoxes.length; j++) {
                                                    if (checkedBoxes[j] !== this) {
                                                        checkedBoxes[j].checked = false;
                                                    }
                                                }
                                            });

                                            label.appendChild(checkbox);
                                            gambarContainer.appendChild(label);
                                        }
                                    });
                                </script>

                                <!-- Bagian tombol untuk submit form -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                            <!-- Script JavaScript -->

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