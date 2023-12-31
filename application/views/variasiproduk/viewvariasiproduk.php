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
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    </div>
                    <!-- /.card -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">
                        TAMBAH
                    </button>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Insert Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url() ?>variasiproduk/input_variasi" method="POST" enctype="multipart/form-data" id=form>
                                            <div class="form-group">
                                                <label>ID VARIASI</label>
                                                <input type="text" class="form-control" name="id_variasiproduk" placeholder="ID VARIASI" value="<?= sprintf($data_variasi) ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="id_produk">ID PRODUK</label>
                                            </div>

                                            <div class="row">
                                                <div class="form-group ">
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

                                            <!-- Tambahkan elemen ini di dalam form -->
                                            <div class="form-group col-md-6">
                                                <p id="harga-text"></p>
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

                                            <div class="form-group">
                                                <label>Warna</label>
                                                <input type="text" class="form-control warna-input static-input" name="warna[]" placeholder="Warna" required>
                                            </div>
                                            <div class="form-group">
                                                <label>HARGA</label>
                                                <input type="number" class="form-control harga-input static-input" name="harga[]" placeholder="Harga" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Ukuran</label>
                                                <input type="text" class="form-control ukuran-input static-input" name="ukuran[]" placeholder="Ukuran" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Stok</label>
                                                <input type="number" class="form-control stok-input static-input" name="stok[]" placeholder="Stok" required>
                                            </div>

                                            <!-- Container untuk input dinamis -->
                                            <div id="dynamicInputContainer"></div>

                                            <!-- Tombol Tambah -->
                                            <button type="button" class="btn btn-success" id="tambahInput">Tambah Warna/Ukuran</button>

                                            <!-- Tombol Hapus -->
                                            <button type="button" class="btn btn-danger" id="hapusInput" style="display: none;">Hapus Warna/Ukuran</button>

                                            <!-- Hidden input untuk melacak jumlah set input dinamis -->
                                            <input type="hidden" id="inputCount" name="inputCount" value="1">

                                            <!-- Tombol Submit -->
                                            <button type="button" class="btn btn-primary" id="submitBtn">Simpan</button>

                                            <script>
                                                document.getElementById('tambahInput').addEventListener('click', function() {
                                                    var dynamicInputContainer = document.getElementById('dynamicInputContainer');
                                                    var inputCountInput = document.getElementById('inputCount');

                                                    var inputIndex = parseInt(inputCountInput.value) + 1;
                                                    inputCountInput.value = inputIndex;

                                                    // Dapatkan nilai input pertama
                                                    var firstColorInput = document.querySelector('.warna-input').value;
                                                    var firstSizeInput = document.querySelector('.ukuran-input').value;
                                                    var firstStockInput = document.querySelector('.stok-input').value;
                                                    var firstPriceInput = document.querySelector('.harga-input').value;

                                                    // Buat div untuk menyimpan satu set input
                                                    var inputSetDiv = document.createElement('div');
                                                    inputSetDiv.className = 'dynamic-input-set';

                                                    // Buat input elements baru dengan nilai yang sama seperti input pertama
                                                    var colorInput = createInput('text', 'form-control warna-input', 'warna[]', 'Warna');
                                                    var sizeInput = createInput('text', 'form-control ukuran-input', 'ukuran[]', 'Ukuran');
                                                    var stockInput = createInput('number', 'form-control stok-input', 'stok[]', 'Stok');
                                                    var priceInput = createInput('number', 'form-control harga-input', 'harga[]', 'Harga');

                                                    // Tambahkan input elements ke dalam div
                                                    inputSetDiv.appendChild(colorInput);
                                                    inputSetDiv.appendChild(sizeInput);
                                                    inputSetDiv.appendChild(stockInput);
                                                    inputSetDiv.appendChild(priceInput);

                                                    // Set nilai input sesuai dengan input pertama
                                                    colorInput.value = firstColorInput;
                                                    sizeInput.value = firstSizeInput;
                                                    stockInput.value = firstStockInput;
                                                    priceInput.value = firstPriceInput;

                                                    // Tambahkan div ke dalam container
                                                    dynamicInputContainer.appendChild(inputSetDiv);

                                                    // Tampilkan tombol Hapus
                                                    document.getElementById('hapusInput').style.display = 'inline-block';
                                                });

                                                document.getElementById('hapusInput').addEventListener('click', function() {
                                                    var dynamicInputContainer = document.getElementById('dynamicInputContainer');
                                                    var inputCountInput = document.getElementById('inputCount');

                                                    var inputIndex = parseInt(inputCountInput.value);

                                                    // Hapus satu set input
                                                    if (inputIndex > 1) {
                                                        dynamicInputContainer.removeChild(dynamicInputContainer.lastChild);
                                                        inputCountInput.value = inputIndex - 1;
                                                    }

                                                    // Sembunyikan tombol Hapus jika tidak ada input lagi
                                                    if (inputIndex === 2) {
                                                        document.getElementById('hapusInput').style.display = 'none';
                                                    }
                                                });


                                                document.getElementById('submitBtn').addEventListener('click', function() {
                                                    var form = document.getElementById('form'); // Pindahkan deklarasi form ke sini

                                                    // Periksa apakah ada input dinamis
                                                    var dynamicInputs = document.querySelectorAll('#dynamicInputContainer input');
                                                    var hasDynamicInputs = dynamicInputs.length > 0;

                                                    // Jika tidak ada input dinamis, tambahkan input pertama ke dalam formulir
                                                    var staticInputs = document.querySelectorAll('.static-input');
                                                    staticInputs.forEach(function(staticInput) {
                                                        var hiddenInput = document.createElement('input');
                                                        hiddenInput.type = 'hidden';
                                                        hiddenInput.name = staticInput.name;
                                                        hiddenInput.value = staticInput.name === 'warna[]' ? (staticInput.value || '0') : staticInput.value;
                                                        form.appendChild(hiddenInput);
                                                    });

                                                    // Code untuk mengumpulkan dan submit data
                                                    collectAndSubmitData();
                                                });

                                                function collectAndSubmitData() {
                                                    var form = document.getElementById('form');
                                                    var dynamicInputs = document.querySelectorAll('#dynamicInputContainer input:not([data-processed])');

                                                    // Periksa dan tambahkan input dinamis ke formulir
                                                    dynamicInputs.forEach(function(input) {
                                                        // Tandai input sebagai sudah diproses
                                                        input.setAttribute('data-processed', 'true');

                                                        // Jika input warna kosong, set nilai default '0'
                                                        if (input.name === 'warna[]' && input.value.trim() === '') {
                                                            input.value = '0';
                                                        }

                                                        // Tambahkan input hanya jika nilainya tidak kosong
                                                        if (input.value.trim() !== '') {
                                                            var hiddenInput = document.createElement('input');
                                                            hiddenInput.type = 'hidden';
                                                            hiddenInput.name = input.name;
                                                            hiddenInput.value = input.value;
                                                            form.appendChild(hiddenInput);
                                                        }
                                                    });

                                                    // Kirim formulir
                                                    form.submit();
                                                }

                                                function createInput(type, className, name, placeholder) {
                                                    var input = document.createElement('input');
                                                    input.type = type;
                                                    input.className = className;
                                                    input.name = name;
                                                    input.placeholder = placeholder;
                                                    return input;
                                                }



                                                document.getElementById('id_produk').addEventListener('change', function() {
                                                    var selectedOption = this.options[this.selectedIndex];
                                                    var gambarContainer = document.getElementById('gambar-container');
                                                    var previewImage = document.getElementById('preview');
                                                    var hargaContainer = document.getElementById('harga-text');

                                                    // Ambil id_produk
                                                    var id_produk = selectedOption.value;

                                                    // Tampilkan gambar (sama seperti sebelumnya)
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

                                                    // Tampilkan harga (baru)
                                                    fetch('<?= base_url('variasiproduk/getHargaProduk') ?>', {
                                                            method: 'POST',
                                                            headers: {
                                                                'Content-Type': 'application/x-www-form-urlencoded',
                                                            },
                                                            body: 'id_produk=' + id_produk,
                                                        })
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            hargaContainer.innerText = data.harga ? 'Harga Dasar Produk: Rp ' + data.harga : '';
                                                        });
                                                });
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