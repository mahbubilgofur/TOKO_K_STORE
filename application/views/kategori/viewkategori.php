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
                                                    <option value="0">Jadi master</option>
                                                    <?php foreach ($data_kategori as $row) {
                                                        if ($row->induk_id == 0) {
                                                            echo '<option value="' . $row->id_kategori . '">' . $row->nama . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tambahkan_master_kedua">Tambahkan Master Kedua:</label>
                                                <select name="tambahkan_master_kedua" id="tambahkan_master_kedua" class="form-control">
                                                    <option value="0">Pilih master kedua</option>
                                                    <?php foreach ($data_kategori as $row) {
                                                        if ($row->induk_id != 0) {
                                                            echo '<option value="' . $row->id_kategori . '">' . $row->nama . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tambahkan_master_ketiga">Tambahkan Master Ketiga:</label>
                                                <select name="tambahkan_master_ketiga" id="tambahkan_master_ketiga" class="form-control">
                                                    <option value="0">Pilih master ketiga</option>
                                                    <?php foreach ($data_kategori as $row) {
                                                        if ($row->induk_id != 0) {
                                                            echo '<option value="' . $row->id_kategori . '">' . $row->nama . '</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tambahkan_master_keempat">Tambahkan Master Keempat:</label>
                                                <select name="tambahkan_master_keempat" id="tambahkan_master_keempat" class="form-control">
                                                    <option value="0">Pilih master keempat</option>
                                                    <?php foreach ($data_kategori as $row) {
                                                        if ($row->induk_id != 0) {
                                                            echo '<option value="' . $row->id_kategori . '">' . $row->nama . '</option>';
                                                        }
                                                    } ?>
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
                                                    var tambahkanMasterKeduaValue = tambahkanMasterKedua.value;
                                                    var tambahkanMasterKetigaValue = tambahkanMasterKetiga.value;
                                                    var tambahkanMasterKeempatValue = tambahkanMasterKeempat.value;

                                                    if (tambahkanMasterValue === "0" && tambahkanMasterKeduaValue === "0" && tambahkanMasterKetigaValue === "0" && tambahkanMasterKeempatValue !== "0") {
                                                        indukId.value = tambahkanMasterKeempatValue; // Isi indukId dengan nilai dari tambahkanMasterKeempat jika hanya memilih master keempat
                                                    } else if (tambahkanMasterValue === "0" && tambahkanMasterKeduaValue === "0" && tambahkanMasterKetigaValue !== "0") {
                                                        indukId.value = tambahkanMasterKetigaValue; // Isi indukId dengan nilai dari tambahkanMasterKetiga jika hanya memilih master ketiga
                                                    } else if (tambahkanMasterValue === "0" && tambahkanMasterKeduaValue !== "0") {
                                                        indukId.value = tambahkanMasterKeduaValue; // Isi indukId dengan nilai dari tambahkanMasterKedua jika hanya memilih master kedua
                                                    } else {
                                                        indukId.value = tambahkanMasterValue; // Isi indukId dengan nilai dari tambahkanMaster
                                                    }
                                                });

                                                tambahkanMasterKedua.addEventListener("change", function() {
                                                    var tambahkanMasterKeduaValue = this.value;
                                                    var tambahkanMasterValue = tambahkanMaster.value;
                                                    var tambahkanMasterKetigaValue = tambahkanMasterKetiga.value;
                                                    var tambahkanMasterKeempatValue = tambahkanMasterKeempat.value;

                                                    if (tambahkanMasterKeduaValue === "0" && tambahkanMasterValue === "0" && tambahkanMasterKetigaValue === "0" && tambahkanMasterKeempatValue !== "0") {
                                                        indukId.value = tambahkanMasterKeempatValue; // Isi indukId dengan nilai dari tambahkanMasterKeempat jika hanya memilih master keempat
                                                    } else if (tambahkanMasterKeduaValue === "0" && tambahkanMasterValue === "0" && tambahkanMasterKetigaValue !== "0") {
                                                        indukId.value = tambahkanMasterKetigaValue; // Isi indukId dengan nilai dari tambahkanMasterKetiga jika hanya memilih master ketiga
                                                    } else if (tambahkanMasterKeduaValue === "0" && tambahkanMasterValue !== "0") {
                                                        indukId.value = tambahkanMasterValue; // Isi indukId dengan nilai dari tambahkanMaster jika hanya memilih master kedua
                                                    } else {
                                                        indukId.value = tambahkanMasterKeduaValue; // Isi indukId dengan nilai dari tambahkanMasterKedua
                                                    }
                                                });

                                                tambahkanMasterKetiga.addEventListener("change", function() {
                                                    var tambahkanMasterKetigaValue = this.value;
                                                    var tambahkanMasterValue = tambahkanMaster.value;
                                                    var tambahkanMasterKeduaValue = tambahkanMasterKedua.value;
                                                    var tambahkanMasterKeempatValue = tambahkanMasterKeempat.value;

                                                    if (tambahkanMasterKetigaValue === "0" && tambahkanMasterValue === "0" && tambahkanMasterKeduaValue === "0" && tambahkanMasterKeempatValue !== "0") {
                                                        indukId.value = tambahkanMasterKeempatValue; // Isi indukId dengan nilai dari tambahkanMasterKeempat jika hanya memilih master keempat
                                                    } else if (tambahkanMasterKetigaValue === "0" && tambahkanMasterValue === "0" && tambahkanMasterKeduaValue !== "0") {
                                                        indukId.value = tambahkanMasterKeduaValue; // Isi indukId dengan nilai dari tambahkanMasterKedua jika hanya memilih master kedua
                                                    } else if (tambahkanMasterKetigaValue === "0" && tambahkanMasterKeduaValue !== "0") {
                                                        indukId.value = tambahkanMasterKeduaValue; // Isi indukId dengan nilai dari tambahkanMasterKedua jika hanya memilih master ketiga
                                                    } else {
                                                        indukId.value = tambahkanMasterKetigaValue; // Isi indukId dengan nilai dari tambahkanMasterKetiga
                                                    }
                                                });

                                                tambahkanMasterKeempat.addEventListener("change", function() {
                                                    var tambahkanMasterKeempatValue = this.value;
                                                    var tambahkanMasterValue = tambahkanMaster.value;
                                                    var tambahkanMasterKeduaValue = tambahkanMasterKedua.value;
                                                    var tambahkanMasterKetigaValue = tambahkanMasterKetiga.value;

                                                    if (tambahkanMasterKeempatValue === "0" && tambahkanMasterValue === "0" && tambahkanMasterKeduaValue === "0" && tambahkanMasterKetigaValue !== "0") {
                                                        indukId.value = tambahkanMasterKetigaValue; // Isi indukId dengan nilai dari tambahkanMasterKetiga jika hanya memilih master keempat
                                                    } else if (tambahkanMasterKeempatValue === "0" && tambahkanMasterValue === "0" && tambahkanMasterKeduaValue !== "0") {
                                                        indukId.value = tambahkanMasterKeduaValue; // Isi indukId dengan nilai dari tambahkanMasterKedua jika hanya memilih master keempat
                                                    } else if (tambahkanMasterKeempatValue === "0" && tambahkanMasterKeduaValue !== "0") {
                                                        indukId.value = tambahkanMasterKeduaValue; // Isi indukId dengan nilai dari tambahkanMasterKedua jika hanya memilih master keempat
                                                    } else {
                                                        indukId.value = tambahkanMasterKeempatValue; // Isi indukId dengan nilai dari tambahkanMasterKeempat
                                                    }
                                                });

                                                indukId.addEventListener("change", function() {
                                                    var indukIdValue = this.value;
                                                    if (indukIdValue === "0") {
                                                        tambahkanMaster.value = "0"; // Isi tambahkanMaster dengan "0" jika memilih "0" pada indukId
                                                        tambahkanMasterKedua.value = "0"; // Isi tambahkanMasterKedua dengan "0" jika memilih "0" pada indukId
                                                        tambahkanMasterKetiga.value = "0"; // Isi tambahkanMasterKetiga dengan "0" jika memilih "0" pada indukId
                                                        tambahkanMasterKeempat.value = "0"; // Isi tambahkanMasterKeempat dengan "0" jika memilih "0" pada indukId
                                                    } else {
                                                        // Kosongkan semua select jika memilih nilai selain "0" pada indukId
                                                        tambahkanMaster.value = "";
                                                        tambahkanMasterKedua.value = "";
                                                        tambahkanMasterKetiga.value = "";
                                                        tambahkanMasterKeempat.value = "";
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
                                            <a href="<?php echo base_url('kategori/update/') . $row->id_kategori ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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