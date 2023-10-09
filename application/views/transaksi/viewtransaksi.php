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

                    <a href="<?= base_url('transaksi/transaksi') ?>"><button type="button" class="btn btn-primary">
                            TAMBAH TRANSAKSI
                        </button>
                    </a>

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
                                        <!-- Your existing form -->
                                        <form action="<?= base_url() ?>transaksi/Inputtransaksi" method="POST">
                                            <!-- Transaction details -->
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="id_transaksi">ID TRANSAKSI</label>
                                                    <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo sprintf($get_idtransaksi) ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>ID USER</label>
                                                    <select class="form-control" name="id_user" required>
                                                        <option value="">Pilih Kategori</option>
                                                        <?php foreach ($getuser as $row) { ?>
                                                            <option value="<?= $row->id; ?>"><?= $row->nama; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tgl_transaksi">TGL TRANSAKSI</label>
                                                    <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?php echo date('Y-m-d'); ?>" readonly>
                                                </div>
                                            </div>

                                            <!-- Input for Detail Transaksi (multiple products) -->
                                            <div id="product_fields">
                                                <div class="form-row product-row">

                                                    <div class="form-group col-md-6">
                                                        <label for="id_produk">ID PRODUK</label>
                                                        <select class="form-control" name="id_produk[]" required>
                                                            <option value="">Pilih Produk</option>
                                                            <?php foreach ($getproduk as $row) { ?>
                                                                <option value="<?= $row->id_produk; ?>"><?= $row->nama; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="harga">HARGA</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">RP</span>
                                                            </div>
                                                            <input type="text" class="form-control" id="harga" name="harga" placeholder="HARGA" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="jumlah">JUMLAH</label>
                                                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="JUMLAH" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="total">TOTAL</label>
                                                        <input type="text" class="form-control" id="total" name="total" placeholder="TOTAL" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div id="total_display"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="tgl_transaksi">TGL TRANSAKSI</label>
                                                        <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?php echo date('Y-m-d'); ?>" readonly>
                                                    </div>


                                                    <!-- Button to add a product -->
                                                    <button type="button" id="add_product_button" class="btn btn-primary">Tambah Produk</button>

                                                    <!-- Hidden field to store selected products -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>

                                                    <script>
                                                        var idProdukSelect = document.getElementById("id_produk");
                                                        var hargaInput = document.getElementById("harga");
                                                        var jumlahInput = document.getElementById("jumlah");
                                                        var totalInput = document.getElementById("total");
                                                        var totalDisplay = document.getElementById("total_display");

                                                        // Tambahkan event listener ketika id_produk dipilih
                                                        idProdukSelect.addEventListener("change", updateHarga);

                                                        function updateHarga() {
                                                            // Dapatkan harga dari opsi yang dipilih
                                                            var selectedOption = idProdukSelect.options[idProdukSelect.selectedIndex];
                                                            var harga = selectedOption.getAttribute("data-harga");

                                                            // Tampilkan harga di input harga
                                                            hargaInput.value = harga;

                                                            // Hitung total saat id_produk berubah juga
                                                            hitungTotal();
                                                        }

                                                        // Tambahkan event listener untuk menghitung total saat input harga atau jumlah berubah
                                                        hargaInput.addEventListener("input", hitungTotal);
                                                        jumlahInput.addEventListener("input", hitungTotal);

                                                        function hitungTotal() {
                                                            // Dapatkan nilai dari input harga dan jumlah
                                                            var harga = hargaInput.value.trim(); // Hapus spasi di awal dan akhir
                                                            var jumlah = parseFloat(jumlahInput.value) || 0;

                                                            // Hapus "RP" dan spasi jika ada di dalam harga
                                                            harga = harga.replace("RP", "").trim();

                                                            // Konversi harga menjadi angka dengan menghapus titik sebagai pemisah ribuan
                                                            harga = parseFloat(harga.replace(".", "").replace(",", "")) || 0;

                                                            // Hitung total
                                                            var total = harga * jumlah;

                                                            // Tampilkan total di input total dengan format tanpa dua desimal
                                                            totalInput.value = total.toFixed(0); // Membulatkan total ke bilangan bulat

                                                            // Tampilkan total di bawah input total dan tambahkan "RP" di depan harga
                                                            totalDisplay.innerHTML = "Total: RP " + totalInput.value;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th scope="col">ID TRANSAKSI</th>
                                <th scope="col">ID_USER</th>
                                <th scope="col">TGL_TRANSAKSI</th>
                                <th scope="col">detail</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_transaksi as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row->id_transaksi ?></td>
                                        <td><?php echo $row->nama_user ?></td>
                                        <td><?php echo $row->tgl_transaksi ?></td>
                                        <td>
                                            <a href="<?php echo base_url('transaksi/transaksidetail/') ?>" class="btn btn-warning">detail</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('transaksi/update/') . $row->id_transaksi ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url('transaksi/delete/') . $row->id_transaksi ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
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