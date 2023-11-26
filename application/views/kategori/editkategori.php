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
                            <!-- views/kategori/editkategori.php -->

                            <form class="form-sample" action="<?= base_url('kategori/updatekategori') ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">ID KATEGORI</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $data_kategori->id_kategori ?>" disabled>
                                                <input type="hidden" name="id_kategori" value="<?= $data_kategori->id_kategori ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">NAMA</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nama" value="<?= $data_kategori->nama ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-10 col-form-label">DESKRIPSI</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="deskripsi" value="<?= $data_kategori->deskripsi ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tambahkan_master">Tambahkan Master:</label>
                                            <select name="tambahkan_master" id="tambahkan_master" class="form-control">
                                                <option value="0">Pilih master utama</option>
                                                <?php
                                                foreach ($data_kategori as $row) {
                                                    if ($row->induk_id == 0) {
                                                        $selected = ($row->id_kategori == $data_kategori->induk_id) ? 'selected' : '';
                                                        echo '<option value="' . $row->id_kategori . '" ' . $selected . '>' . $row->nama . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="tambahkan_master_kedua">Tambahkan Master Kedua:</label>
                                            <select name="tambahkan_master_kedua" id="tambahkan_master_kedua" class="form-control">
                                                <option value="0">Pilih master kedua</option>
                                                <?php
                                                if ($data_kategori->induk_id != 0) {
                                                    foreach ($data_kategori as $row) {
                                                        if ($row->induk_id == $data_kategori->induk_id) {
                                                            $selected = ($row->id_kategori == $data_kategori->id_kategori) ? 'selected' : '';
                                                            echo '<option value="' . $row->id_kategori . '" ' . $selected . '>' . $row->nama . '</option>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="tambahkan_master_ketiga">Tambahkan Master Ketiga:</label>
                                            <select name="tambahkan_master_ketiga" id="tambahkan_master_ketiga" class="form-control">
                                                <option value="0">Pilih master ketiga</option>
                                                <?php
                                                if ($data_kategori->induk_id != 0) {
                                                    foreach ($data_kategori as $row) {
                                                        if ($row->induk_id == $data_kategori->induk_id) {
                                                            $selected = ($row->id_kategori == $data_kategori->id_kategori) ? 'selected' : '';
                                                            echo '<option value="' . $row->id_kategori . '" ' . $selected . '>' . $row->nama . '</option>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="tambahkan_master_keempat">Tambahkan Master Keempat:</label>
                                            <select name="tambahkan_master_keempat" id="tambahkan_master_keempat" class="form-control">
                                                <option value="0">Pilih master keempat</option>
                                                <?php
                                                foreach ($data_kategori as $row) {
                                                    if ($row->induk_id != 0) {
                                                        $selected = ($row->id_kategori == $data_kategori->id_kategori) ? 'selected' : '';
                                                        echo '<option value="' . $row->id_kategori . '" ' . $selected . '>' . $row->nama . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            var tambahkanMaster = document.getElementById("tambahkan_master");
                                            var tambahkanMasterKedua = document.getElementById("tambahkan_master_kedua");
                                            var tambahkanMasterKetiga = document.getElementById("tambahkan_master_ketiga");
                                            var tambahkanMasterKeempat = document.getElementById("tambahkan_master_keempat");
                                            var indukId = document.getElementById("induk_id"); // Menambahkan referensi ke elemen input hidden dengan ID "induk_id"

                                            var editIndukId = <?= $data_kategori->induk_id ?>;
                                            var editIdKategori = <?= $data_kategori->id_kategori ?>;

                                            function selectDefaultOption(dropdown, defaultValue) {
                                                var options = dropdown.options;
                                                for (var i = 0; i < options.length; i++) {
                                                    if (options[i].value === defaultValue) {
                                                        dropdown.selectedIndex = i;
                                                        break;
                                                    }
                                                }
                                            }

                                            selectDefaultOption(tambahkanMaster, editIndukId);

                                            function fetchAndPopulateDropdown(targetDropdown, value) {
                                                // Implementasi fungsi untuk mengambil dan mengisi dropdown dari backend
                                                // Gantilah dengan cara yang sesuai untuk mendapatkan data dari backend
                                            }

                                            if (editIndukId !== 0) {
                                                fetchAndPopulateDropdown(tambahkanMasterKedua, editIndukId);
                                                selectDefaultOption(tambahkanMasterKedua, editIdKategori);

                                                tambahkanMaster.addEventListener("change", function() {
                                                    var tambahkanMasterValue = this.value;

                                                    if (tambahkanMasterValue === "0") {
                                                        // Kosongkan dan nonaktifkan dropdown kedua, ketiga, dan keempat
                                                        tambahkanMasterKedua.innerHTML = '<option value="0">Pilih master kedua</option>';
                                                        tambahkanMasterKedua.disabled = true;
                                                        tambahkanMasterKetiga.innerHTML = '<option value="0">Pilih master ketiga</option>';
                                                        tambahkanMasterKetiga.disabled = true;
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;

                                                        // Isi indukId dengan nilai dari tambahkanMaster jika hanya memilih master pertama
                                                        indukId.value = tambahkanMasterValue;
                                                    } else {
                                                        // Mengosongkan dan menonaktifkan dropdown ketiga dan keempat
                                                        tambahkanMasterKetiga.innerHTML = '<option value="0">Pilih master ketiga</option>';
                                                        tambahkanMasterKetiga.disabled = true;
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;

                                                        // Menyambungkan ke backend untuk mendapatkan kategori berdasarkan tambahkanMasterValue
                                                        // Gantilah dengan cara yang sesuai untuk mendapatkan data dari backend

                                                        // Contoh data kategori yang diterima dari backend
                                                        var dataKategori = <?= json_encode($data_kategori) ?>;

                                                        // Mendapatkan kategori yang induk_id sama dengan tambahkanMasterValue
                                                        var kategoriKedua = dataKategori.filter(function(kategori) {
                                                            return kategori.induk_id == tambahkanMasterValue;
                                                        });

                                                        // Menyisipkan opsi kategori kedua ke dropdown kedua
                                                        tambahkanMasterKedua.innerHTML = '<option value="0">Pilih master kedua</option>';
                                                        kategoriKedua.forEach(function(kategori) {
                                                            var option = document.createElement('option');
                                                            option.value = kategori.id_kategori;
                                                            option.textContent = kategori.nama;
                                                            tambahkanMasterKedua.appendChild(option);
                                                        });

                                                        // Mengaktifkan dropdown kedua
                                                        tambahkanMasterKedua.disabled = false;
                                                        // Isi indukId dengan nilai dari tambahkanMaster jika hanya memilih master pertama
                                                        indukId.value = tambahkanMasterValue;
                                                    }
                                                });

                                                tambahkanMasterKedua.addEventListener("change", function() {
                                                    var tambahkanMasterKeduaValue = this.value;

                                                    if (tambahkanMasterKeduaValue === "0") {
                                                        // Kosongkan dan nonaktifkan dropdown ketiga dan keempat
                                                        tambahkanMasterKetiga.innerHTML = '<option value="0">Pilih master ketiga</option>';
                                                        tambahkanMasterKetiga.disabled = true;
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;

                                                        // Isi indukId dengan nilai dari tambahkanMasterKedua jika hanya memilih master kedua
                                                        indukId.value = tambahkanMasterKeduaValue;
                                                    } else {
                                                        // Mengosongkan dan menonaktifkan dropdown keempat
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;

                                                        // Menyambungkan ke backend untuk mendapatkan kategori berdasarkan tambahkanMasterKeduaValue
                                                        // Gantilah dengan cara yang sesuai untuk mendapatkan data dari backend

                                                        // Contoh data kategori yang diterima dari backend
                                                        var dataKategori = <?= json_encode($data_kategori) ?>;

                                                        // Mendapatkan kategori yang induk_id sama dengan tambahkanMasterKeduaValue
                                                        var kategoriKetiga = dataKategori.filter(function(kategori) {
                                                            return kategori.induk_id == tambahkanMasterKeduaValue;
                                                        });

                                                        // Menyisipkan opsi kategori ketiga ke dropdown ketiga
                                                        tambahkanMasterKetiga.innerHTML = '<option value="0">Pilih master ketiga</option>';
                                                        kategoriKetiga.forEach(function(kategori) {
                                                            var option = document.createElement('option');
                                                            option.value = kategori.id_kategori;
                                                            option.textContent = kategori.nama;
                                                            tambahkanMasterKetiga.appendChild(option);
                                                        });

                                                        // Mengaktifkan dropdown ketiga
                                                        tambahkanMasterKetiga.disabled = false;

                                                        // Isi indukId dengan nilai dari tambahkanMasterKedua jika hanya memilih master kedua
                                                        indukId.value = tambahkanMasterKeduaValue;
                                                    }
                                                });

                                                tambahkanMasterKetiga.addEventListener("change", function() {
                                                    var tambahkanMasterKetigaValue = this.value;

                                                    if (tambahkanMasterKetigaValue === "0") {
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;

                                                        // Isi indukId dengan nilai dari tambahkanMasterKetiga jika hanya memilih master ketiga
                                                        indukId.value = tambahkanMasterKetigaValue;
                                                    } else {
                                                        // Mengosongkan dropdown keempat
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';

                                                        // Menyambungkan ke backend untuk mendapatkan kategori berdasarkan tambahkanMasterKetigaValue
                                                        // Gantilah dengan cara yang sesuai untuk mendapatkan data dari backend

                                                        // Contoh data kategori yang diterima dari backend
                                                        var dataKategori = <?= json_encode($data_kategori) ?>;

                                                        // Mendapatkan kategori yang induk_id sama dengan tambahkanMasterKetigaValue
                                                        var kategoriKeempat = dataKategori.filter(function(kategori) {
                                                            return kategori.induk_id == tambahkanMasterKetigaValue;
                                                        });

                                                        // Menyisipkan opsi kategori keempat ke dropdown keempat
                                                        kategoriKeempat.forEach(function(kategori) {
                                                            var option = document.createElement('option');
                                                            option.value = kategori.id_kategori;
                                                            option.textContent = kategori.nama;
                                                            tambahkanMasterKeempat.appendChild(option);
                                                        });

                                                        // Mengaktifkan dropdown keempat
                                                        tambahkanMasterKeempat.disabled = false;

                                                        // Isi indukId dengan nilai dari tambahkanMasterKetiga jika hanya memilih master ketiga
                                                        indukId.value = tambahkanMasterKetigaValue;
                                                    }
                                                });

                                                tambahkanMasterKeempat.addEventListener("change", function() {
                                                    var tambahkanMasterKeempatValue = this.value;

                                                    if (tambahkanMasterKeempatValue === "0") {
                                                        // Isi indukId dengan nilai dari tambahkanMasterKeempat jika hanya memilih master keempat
                                                        indukId.value = tambahkanMasterKeempatValue;
                                                    } else {
                                                        // Menyambungkan ke backend untuk mendapatkan kategori berdasarkan tambahkanMasterKeempatValue
                                                        // Gantilah dengan cara yang sesuai untuk mendapatkan data dari backend

                                                        // Contoh data kategori yang diterima dari backend
                                                        var dataKategori = <?= json_encode($data_kategori) ?>;

                                                        // Lakukan validasi jika diperlukan dan lanjutkan dengan logika sesuai kebutuhan

                                                        // Isi indukId dengan nilai dari tambahkanMasterKeempat jika hanya memilih master keempat
                                                        indukId.value = tambahkanMasterKeempatValue;
                                                    }
                                                });

                                                indukId.addEventListener("change", function() {
                                                    var indukIdValue = this.value;

                                                    if (indukIdValue === "0") {
                                                        // Kosongkan dan nonaktifkan semua dropdown kecuali dropdown pertama
                                                        tambahkanMaster.innerHTML = '<option value="0">Pilih master utama</option>';
                                                        tambahkanMasterKedua.innerHTML = '<option value="0">Pilih master kedua</option>';
                                                        tambahkanMasterKedua.disabled = true;
                                                        tambahkanMasterKetiga.innerHTML = '<option value="0">Pilih master ketiga</option>';
                                                        tambahkanMasterKetiga.disabled = true;
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;
                                                    } else {
                                                        // Mengosongkan dan menonaktifkan semua dropdown kecuali dropdown pertama
                                                        tambahkanMaster.innerHTML = '<option value="0">Pilih master utama</option>';
                                                        tambahkanMasterKedua.innerHTML = '<option value="0">Pilih master kedua</option>';
                                                        tambahkanMasterKedua.disabled = true;
                                                        tambahkanMasterKetiga.innerHTML = '<option value="0">Pilih master ketiga</option>';
                                                        tambahkanMasterKetiga.disabled = true;
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;

                                                        // Menyambungkan ke backend untuk mendapatkan kategori berdasarkan indukIdValue
                                                        // Gantilah dengan cara yang sesuai untuk mendapatkan data dari backend

                                                        // Contoh data kategori yang diterima dari backend
                                                        var dataKategori = <?= json_encode($data_kategori) ?>;

                                                        // Mendapatkan kategori yang induk_id sama dengan indukIdValue
                                                        var kategoriMaster = dataKategori.filter(function(kategori) {
                                                            return kategori.induk_id == indukIdValue;
                                                        });

                                                        // Menyisipkan opsi kategori master ke dropdown pertama
                                                        kategoriMaster.forEach(function(kategori) {
                                                            var option = document.createElement('option');
                                                            option.value = kategori.id_kategori;
                                                            option.textContent = kategori.nama;
                                                            tambahkanMaster.appendChild(option);
                                                        });

                                                        // Mengaktifkan dropdown pertama
                                                        tambahkanMaster.disabled = false;
                                                    }
                                                });
                                            }
                                        });
                                    </script>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-warning" href="<?= base_url() ?>kategori" role="button">Kembali</a>
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