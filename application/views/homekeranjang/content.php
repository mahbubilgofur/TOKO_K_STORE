<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>



<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">DELETE</th>
                                    <th class="li-product-thumbnail">GAMBAR</th>
                                    <th class="li-product-name">PRODUK</th>
                                    <th class="li-product-price">HARGA</th>
                                    <th class="li-product-quantity">JUMLAH</th>
                                    <th class="li-product-subtotal">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produk_keranjang as $produk) { ?>
                                    <tr>
                                        <td class="li-product-remove">
                                            <label class="checkbox-container">
                                                <input type="checkbox" class="toggle-checkbox" data-product-id="<?= $produk['id_produk']; ?>">
                                            </label>
                                        </td>

                                        <td class="li-product-thumbnail">
                                            <a href="#">
                                                <img src="<?= base_url('gambarproduk/' . $produk['gambar']); ?>" alt="<?= $produk['nama']; ?>" width="50" height="50">
                                            </a>
                                        </td>
                                        <td class="li-product-name">
                                            <a href="#"><?= $produk['nama']; ?></a>
                                        </td>
                                        <td class="li-product-price">
                                            <span class="amount"><?= $produk['harga']; ?></span>
                                        </td>
                                        <td class="quantity">
                                            <input class="cart-quantity" data-product-id="<?= $produk['id_produk']; ?>" value="1" type="number" min="1" max="99">
                                        </td>
                                        <td class="li-product-subtotal">
                                            <span class="amount">
                                                <span class="subtotal"></span>
                                            </span>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="delete">
                                    <button class="delete-button" id="hapusDataDicentang">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Total Harga: <span id="total-keseluruhan">RP. 0.00</span></li>
                                    <li>Jumlah Produk: <span id="total-jumlah-produk">0</span></li>
                                </ul>

                                <a href="#">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Fungsi untuk menghitung total harga produk dan jumlah produk
                        function hitungTotalHarga() {
                            const semuaProduk = document.querySelectorAll('tbody tr');
                            let totalKeseluruhan = 0;
                            let totalJumlahProduk = 0;

                            semuaProduk.forEach(produk => {
                                const hargaSpan = produk.querySelector('.li-product-price .amount');
                                const harga = parseFloat(hargaSpan.innerText.replace('RP.', '').replace(',', '').replace(' ', ''));
                                const quantityInput = produk.querySelector('.cart-quantity');
                                const subtotalSpan = produk.querySelector('.li-product-subtotal .subtotal');

                                const jumlah = parseInt(quantityInput.value);
                                const subtotal = harga * jumlah;
                                subtotalSpan.innerText = formatRupiah(subtotal); // Memanggil fungsi formatRupiah
                                totalKeseluruhan += subtotal;
                                totalJumlahProduk += jumlah;
                            });

                            // Tampilkan total keseluruhan belanja
                            const totalKeseluruhanSpan = document.querySelector('#total-keseluruhan');
                            totalKeseluruhanSpan.innerText = formatRupiah(totalKeseluruhan);

                            // Tampilkan total jumlah produk
                            const totalJumlahProdukSpan = document.querySelector('#total-jumlah-produk');
                            totalJumlahProdukSpan.innerText = totalJumlahProduk;
                        }

                        // Fungsi untuk memformat angka menjadi format mata uang Rupiah
                        function formatRupiah(angka) {
                            let reverse = angka.toString().split('').reverse().join('');
                            let ribuan = reverse.match(/\d{1,3}/g);
                            ribuan = ribuan.join('.').split('').reverse().join('');
                            return 'RP.' + ribuan;
                        }

                        // Tambahkan event listener ke setiap input jumlah (quantity)
                        const quantityInputs = document.querySelectorAll('.cart-quantity');
                        quantityInputs.forEach(input => {
                            input.addEventListener('input', () => {
                                hitungTotalHarga();
                            });
                        });

                        // Hitung total harga saat halaman dimuat
                        hitungTotalHarga();


                        // Fungsi untuk menghapus data yang sudah dicentang
                        function hapusDataDicentang() {
                            // Dapatkan semua checkbox yang dipilih
                            const checkboxes = document.querySelectorAll('.toggle-checkbox:checked');

                            // Buat array untuk menyimpan ID produk yang akan dihapus
                            const produkToDelete = [];

                            checkboxes.forEach(checkbox => {
                                // Ambil ID produk dari atribut data-product-id
                                const id_produk = checkbox.getAttribute('data-product-id');
                                produkToDelete.push(id_produk);
                            });

                            if (produkToDelete.length === 0) {
                                alert('Pilih setidaknya satu produk untuk dihapus.');
                            } else {
                                // Kirim permintaan ke server untuk menghapus produk
                                fetch('<?= base_url('home/remove_cart_item/') ?>' + produkToDelete.join(','), {
                                        method: 'DELETE'
                                    })
                                    .then(response => {
                                        if (response.ok) {
                                            alert('Berhasil dihapus');
                                            location.reload(); // Refresh halaman
                                        } else {
                                            alert('Terjadi kesalahan saat menghapus produk dari keranjang.');
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Terjadi kesalahan:', error);
                                        alert('Terjadi kesalahan saat menghapus produk dari keranjang.');
                                    });
                            }
                        }

                        // Tambahkan event listener ke tombol "Delete"
                        const deleteButton = document.querySelector('.delete-button');
                        deleteButton.addEventListener('click', () => {
                            hapusDataDicentang().then(() => {
                                alert('Data keranjang berhasil dihapus.'); // Menampilkan pesan berhasil
                            });
                        });
                    </script>

                </form>
            </div>
        </div>
    </div>
</div>