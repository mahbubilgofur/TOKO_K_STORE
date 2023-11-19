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

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tambahkan_master">Tambahkan Master:</label>
                                                <select name="tambahkan_master" id="tambahkan_master" class="form-control">
                                                    <option value="0">Pilih master utama</option>
                                                    <?php
                                                    foreach ($data_kategori as $row) {
                                                        echo '<option value="' . $row->id_kategori . '">' . $row->nama . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tambahkan_master_kedua">Tambahkan Master Kedua:</label>
                                                <select name="tambahkan_master_kedua" id="tambahkan_master_kedua" class="form-control">
                                                    <option value="0">Pilih master kedua</option>
                                                    <!-- Options will be generated using JavaScript -->
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tambahkan_master_ketiga">Tambahkan Master Ketiga:</label>
                                                <select name="tambahkan_master_ketiga" id="tambahkan_master_ketiga" class="form-control">
                                                    <option value="0">Pilih master ketiga</option>
                                                    <!-- Options will be generated using JavaScript -->
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
                                        </div>

                                        <!-- Input field to store induk_id -->
                                        <input type="hidden" name="induk_id" id="induk_id" value="<?= $data_kategori->induk_id ?>">

                                        <script>
                                            // Function to set select options
                                            function setSelectOptions(selectedValue, selectId, dataArray) {
                                                var selectElement = document.getElementById(selectId);
                                                selectElement.innerHTML = '<option value="0">Pilih ' + selectId.replace('_', ' ') + '</option>';

                                                for (var i = 0; i < dataArray.length; i++) {
                                                    var option = document.createElement('option');
                                                    option.value = dataArray[i].id_kategori;
                                                    option.text = dataArray[i].nama;
                                                    if (dataArray[i].id_kategori == selectedValue) {
                                                        option.selected = true;
                                                    }
                                                    selectElement.add(option);
                                                }
                                            }

                                            // Event listener for the first select
                                            document.getElementById('tambahkan_master').addEventListener('change', function() {
                                                var selectedValue = this.value;
                                                setSelectOptions(selectedValue, 'tambahkan_master_kedua', dataMasterKedua);
                                            });

                                            // Event listener for the second select
                                            document.getElementById('tambahkan_master_kedua').addEventListener('change', function() {
                                                var selectedValue = this.value;
                                                setSelectOptions(selectedValue, 'tambahkan_master_ketiga', dataMasterKetiga);
                                            });

                                            // Event listener for the third select
                                            document.getElementById('tambahkan_master_ketiga').addEventListener('change', function() {
                                                var selectedValue = this.value;
                                                setSelectOptions(selectedValue, 'tambahkan_master_keempat', dataMasterKeempat);
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