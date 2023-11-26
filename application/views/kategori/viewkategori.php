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

                    </div>
                    <!-- /.card -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        TAMBAH KATEGORI
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
                                        <form action="<?= base_url() ?>kategori/Inputkategori" method="POST">
                                            <div class="form-group">
                                                <label>ID KATEGORI</label>
                                                <input type="text" class="form-control" name="id_kategori" placeholder="ID KATEGORI" value="<?php echo sprintf($querykategori) ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>NAMA</label>
                                                <input type="text" class="form-control" name="nama" placeholder="NAMA" required>
                                            </div>
                                            <div class="form-group">
                                                <label>DESKRIPSI</label>
                                                <input type="text" class="form-control" name="deskripsi" placeholder="DESKRIPSI" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tambahkan_master">Tambahkan Master:</label>
                                                <select name="tambahkan_master" id="tambahkan_master" class="form-control">
                                                    <option value="0">Pilih master utama</option>
                                                    <?php
                                                    foreach ($data_kategori as $row) {
                                                        if ($row->induk_id == 0) {
                                                            echo '<option value="' . $row->id_kategori . '">' . $row->nama . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tambahkan_master_kedua">Tambahkan Master Kedua:</label>
                                                <select name="tambahkan_master_kedua" id="tambahkan_master_kedua" class="form-control">
                                                    <option value="0">Pilih master kedua</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tambahkan_master_ketiga">Tambahkan Master Ketiga:</label>
                                                <select name="tambahkan_master_ketiga" id="tambahkan_master_ketiga" class="form-control">
                                                    <option value="0">Pilih master ketiga</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tambahkan_master_keempat">Tambahkan Master Keempat:</label>
                                                <select name="tambahkan_master_keempat" id="tambahkan_master_keempat" class="form-control">
                                                    <option value="0">Pilih master keempat</option>
                                                    <?php
                                                    foreach ($data_kategori as $row) {
                                                        if ($row->induk_id != 0) {
                                                            echo '<option value="' . $row->id_kategori . '">' . $row->nama . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- Assuming you have an input field with ID "induk_id" -->
                                            <input type="hidden" name="induk_id" id="induk_id" value="0">

                                            <script>
                                                var tambahkanMaster = document.getElementById("tambahkan_master");
                                                var tambahkanMasterKedua = document.getElementById("tambahkan_master_kedua");
                                                var tambahkanMasterKetiga = document.getElementById("tambahkan_master_ketiga");
                                                var tambahkanMasterKeempat = document.getElementById("tambahkan_master_keempat");
                                                var indukId = document.getElementById("induk_id");

                                                tambahkanMaster.addEventListener("change", function() {
                                                    var tambahkanMasterValue = this.value;

                                                    if (tambahkanMasterValue === "0") {
                                                        // Kosongkan dan nonaktifkan "Tambahkan Master Kedua" dan "Tambahkan Master Ketiga"
                                                        tambahkanMasterKedua.innerHTML = '<option value="0">Pilih master kedua</option>';
                                                        tambahkanMasterKedua.disabled = true;
                                                        tambahkanMasterKetiga.innerHTML = '<option value="0">Pilih master ketiga</option>';
                                                        tambahkanMasterKetiga.disabled = true;
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;

                                                        // Isi indukId dengan nilai dari tambahkanMaster jika hanya memilih master pertama
                                                        indukId.value = tambahkanMasterValue;
                                                    } else {
                                                        // Mengosongkan dan menonaktifkan "Tambahkan Master Ketiga" dan "Tambahkan Master Keempat"
                                                        tambahkanMasterKetiga.innerHTML = '<option value="0">Pilih master ketiga</option>';
                                                        tambahkanMasterKetiga.disabled = true;
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;

                                                        // Menyambungkan ke backend untuk mendapatkan kategori berdasarkan tambahkanMasterValue
                                                        // Gantilah dengan cara yang sesuai untuk mendapatkan data dari backend

                                                        // Contoh data kategori yang diterima dari backend
                                                        var dataKategori = <?php echo json_encode($data_kategori); ?>;

                                                        // Mendapatkan kategori yang induk_id sama dengan tambahkanMasterValue
                                                        var kategoriKedua = dataKategori.filter(function(kategori) {
                                                            return kategori.induk_id === tambahkanMasterValue;
                                                        });

                                                        // Menyisipkan opsi kategori kedua ke "Tambahkan Master Kedua"
                                                        tambahkanMasterKedua.innerHTML = '<option value="0">Pilih master kedua</option>';
                                                        kategoriKedua.forEach(function(kategori) {
                                                            var option = document.createElement('option');
                                                            option.value = kategori.id_kategori;
                                                            option.textContent = kategori.nama;
                                                            tambahkanMasterKedua.appendChild(option);
                                                        });

                                                        // Mengaktifkan "Tambahkan Master Kedua"
                                                        tambahkanMasterKedua.disabled = false;

                                                        // Isi indukId dengan nilai dari tambahkanMaster jika hanya memilih master pertama
                                                        indukId.value = tambahkanMasterValue;
                                                    }
                                                });

                                                tambahkanMasterKedua.addEventListener("change", function() {
                                                    var tambahkanMasterKeduaValue = this.value;

                                                    if (tambahkanMasterKeduaValue === "0") {
                                                        // Kosongkan dan nonaktifkan "Tambahkan Master Ketiga" dan "Tambahkan Master Keempat"
                                                        tambahkanMasterKetiga.innerHTML = '<option value="0">Pilih master ketiga</option>';
                                                        tambahkanMasterKetiga.disabled = true;
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;

                                                        // Isi indukId dengan nilai dari tambahkanMasterKedua jika hanya memilih master kedua
                                                        indukId.value = tambahkanMasterKeduaValue;
                                                    } else {
                                                        // Mengosongkan dan menonaktifkan "Tambahkan Master Keempat"
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;

                                                        // Menyambungkan ke backend untuk mendapatkan kategori berdasarkan tambahkanMasterKeduaValue
                                                        // Gantilah dengan cara yang sesuai untuk mendapatkan data dari backend

                                                        // Contoh data kategori yang diterima dari backend
                                                        var dataKategori = <?php echo json_encode($data_kategori); ?>;

                                                        // Mendapatkan kategori yang induk_id sama dengan tambahkanMasterKeduaValue
                                                        var kategoriKetiga = dataKategori.filter(function(kategori) {
                                                            return kategori.induk_id === tambahkanMasterKeduaValue;
                                                        });

                                                        // Menyisipkan opsi kategori ketiga ke "Tambahkan Master Ketiga"
                                                        tambahkanMasterKetiga.innerHTML = '<option value="0">Pilih master ketiga</option>';
                                                        kategoriKetiga.forEach(function(kategori) {
                                                            var option = document.createElement('option');
                                                            option.value = kategori.id_kategori;
                                                            option.textContent = kategori.nama;
                                                            tambahkanMasterKetiga.appendChild(option);
                                                        });

                                                        // Mengaktifkan "Tambahkan Master Ketiga"
                                                        tambahkanMasterKetiga.disabled = false;

                                                        // Isi indukId dengan nilai dari tambahkanMasterKedua jika hanya memilih master kedua
                                                        indukId.value = tambahkanMasterKeduaValue;
                                                    }
                                                });
                                                // Bagian ini dilanjutkan dari skrip sebelumnya

                                                tambahkanMasterKetiga.addEventListener("change", function() {
                                                    var tambahkanMasterKetigaValue = this.value;

                                                    if (tambahkanMasterKetigaValue === "0") {
                                                        // Kosongkan dan nonaktifkan "Tambahkan Master Keempat"
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;

                                                        // Isi indukId dengan nilai dari tambahkanMasterKetiga jika hanya memilih master ketiga
                                                        indukId.value = tambahkanMasterKetigaValue;
                                                    } else {
                                                        // Mengosongkan "Tambahkan Master Keempat"
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';

                                                        // Menyambungkan ke backend untuk mendapatkan kategori berdasarkan tambahkanMasterKetigaValue
                                                        // Gantilah dengan cara yang sesuai untuk mendapatkan data dari backend

                                                        // Contoh data kategori yang diterima dari backend
                                                        var dataKategori = <?php echo json_encode($data_kategori); ?>;

                                                        // Mendapatkan kategori yang induk_id sama dengan tambahkanMasterKetigaValue
                                                        var kategoriKeempat = dataKategori.filter(function(kategori) {
                                                            return kategori.induk_id === tambahkanMasterKetigaValue;
                                                        });

                                                        // Menyisipkan opsi kategori keempat ke "Tambahkan Master Keempat"
                                                        kategoriKeempat.forEach(function(kategori) {
                                                            var option = document.createElement('option');
                                                            option.value = kategori.id_kategori;
                                                            option.textContent = kategori.nama;
                                                            tambahkanMasterKeempat.appendChild(option);
                                                        });

                                                        // Mengaktifkan "Tambahkan Master Keempat"
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
                                                        var dataKategori = <?php echo json_encode($data_kategori); ?>;

                                                        // Lakukan validasi jika diperlukan dan lanjutkan dengan logika sesuai kebutuhan

                                                        // Isi indukId dengan nilai dari tambahkanMasterKeempat jika hanya memilih master keempat
                                                        indukId.value = tambahkanMasterKeempatValue;
                                                    }
                                                });

                                                indukId.addEventListener("change", function() {
                                                    var indukIdValue = this.value;

                                                    if (indukIdValue === "0") {
                                                        // Kosongkan dan nonaktifkan "Tambahkan Master" dan "Tambahkan Master Kedua", "Tambahkan Master Ketiga", "Tambahkan Master Keempat"
                                                        tambahkanMaster.innerHTML = '<option value="0">Pilih master utama</option>';
                                                        tambahkanMasterKedua.innerHTML = '<option value="0">Pilih master kedua</option>';
                                                        tambahkanMasterKedua.disabled = true;
                                                        tambahkanMasterKetiga.innerHTML = '<option value="0">Pilih master ketiga</option>';
                                                        tambahkanMasterKetiga.disabled = true;
                                                        tambahkanMasterKeempat.innerHTML = '<option value="0">Pilih master keempat</option>';
                                                        tambahkanMasterKeempat.disabled = true;
                                                    } else {
                                                        // Mengosongkan dan menonaktifkan "Tambahkan Master", "Tambahkan Master Kedua", "Tambahkan Master Ketiga", "Tambahkan Master Keempat"
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
                                                        var dataKategori = <?php echo json_encode($data_kategori); ?>;

                                                        // Mendapatkan kategori yang induk_id sama dengan indukIdValue
                                                        var kategoriMaster = dataKategori.filter(function(kategori) {
                                                            return kategori.induk_id === indukIdValue;
                                                        });

                                                        // Menyisipkan opsi kategori master ke "Tambahkan Master"
                                                        kategoriMaster.forEach(function(kategori) {
                                                            var option = document.createElement('option');
                                                            option.value = kategori.id_kategori;
                                                            option.textContent = kategori.nama;
                                                            tambahkanMaster.appendChild(option);
                                                        });

                                                        // Mengaktifkan "Tambahkan Master"
                                                        tambahkanMaster.disabled = false;
                                                    }
                                                });
                                            </script>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="sumbmit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th scope="col">ID KATEGORI</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">DESKRIPSI</th>
                                <th scope="col">INDUK</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_kategori as $row) {

                                ?>
                                    <tr>
                                        <td><?php echo $row->id_kategori ?></td>
                                        <td><?php echo $row->nama ?></td>
                                        <td><?php echo $row->deskripsi ?></td>
                                        <td><?php echo $row->induk_id ?></td>
                                        <td>

                                            <a href="<?php echo base_url('kategori/delete/') . $row->id_kategori ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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