<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>ashion/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ashion/css/font-awesome.min.css" type="text/css">3
    <link rel="stylesheet" href="<?= base_url() ?>ashion/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ashion/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ashion/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ashion/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ashion/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>ashion/css/style.css" type="text/css">

    <!--template slider-->
    <link rel="stylesheet" href="<?= base_url() ?>ashion/templateslid/Casinal/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>ashion/templateslid/Casinal/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>ashion/templateslid/Casinal/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>ashion/templateslid/Casinal/css/responsive.css">
</head>
<style>
    .container {
        max-width: 1200px;
        /* Sesuaikan lebar maksimum container sesuai kebutuhan */
        margin: 0 auto;
        /* Untuk membuat container berada di tengah halaman */
    }

    .product__item {
        margin-bottom: 20px;
        /* Jarak antara item barang */
    }

    .product__item__pic {
        /* Atur tinggi atau lebar gambar barang */
        height: 300px;
        /* Sesuaikan dengan tinggi yang Anda inginkan */
        /* width: 300px; */
        /* Jika ingin mengatur lebar, uncomment baris ini dan sesuaikan dengan lebar yang Anda inginkan */
        overflow: hidden;
        /* Untuk memotong gambar jika melebihi ukuran yang ditentukan */
    }
</style>

<!-- Navbar -->
<header class="header">

    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="checkbox-form">
                <h3>Tujuan</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="country-select clearfix">

                            <select name="provinsi" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="country-select clearfix">
                            <select name="kota" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="country-select clearfix">
                            <label>Jasa Pengiriman <span class="required">*</span></label>
                            <select class="nice-select wide">
                                <option data-display="Bangladesh">Bangladesh</option>
                                <option value="uk">London</option>
                                <option value="rou">Romania</option>
                                <option value="fr">French</option>
                                <option value="de">Germany</option>
                                <option value="aus">Australia</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="country-select clearfix">
                            <label>Ekspedisi <span class="required">*</span></label>
                            <select class="nice-select wide">
                                <option data-display="Bangladesh">Bangladesh</option>
                                <option value="uk">London</option>
                                <option value="rou">Romania</option>
                                <option value="fr">French</option>
                                <option value="de">Germany</option>
                                <option value="aus">Australia</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkout-form-list">
                            <label>Nama Penerima<span class="required">*</span></label>
                            <input placeholder="" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkout-form-list">
                            <label>Kode Pos<span class="required">*</span></label>
                            <input placeholder="" type="text">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkout-form-list">
                            <label>Nomer Telepon</label>
                            <input placeholder="" type="text">
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="col-lg-6 col-12">
            <div class="your-order">
                <h3>Keranjang</h3>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url('raja_ongkir/provinsi') ?>",
                            success: function(hasil_provinsi) {
                                $("select[name=provinsi]").html(hasil_provinsi);
                            }
                        });
                        $("select[name=provinsi]").on("change", function() {
                            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

                            $.ajax({
                                type: "POST",
                                url: "<?= base_url('raja_ongkir/kota') ?>",
                                data: 'id_provinsi=' + id_provinsi_terpilih,
                                success: function(hasil_kota) {
                                    $("select[name=kota]").html(hasil_kota);
                                }
                            });
                        });
                    });
                </script>
                <div id="mySlider" class="carousel slide">
                    <!-- Konten slider di sini -->
                </div>

                <script>
                    $(document).ready(function() {
                        $("#mySlider").on('slid.bs.carousel', function() {
                            // Mengatur interval 5 detik untuk slider
                            $("#mySlider").carousel("next");
                        });
                    });
                </script>

                <!-- Js Plugins -->
                <script src="<?= base_url() ?>ashion/js/jquery-3.3.1.min.js"></script>
                <script src="<?= base_url() ?>ashion/js/bootstrap.min.js"></script>
                <script src="<?= base_url() ?>ashion/js/jquery.magnific-popup.min.js"></script>
                <script src="<?= base_url() ?>ashion/js/jquery-ui.min.js"></script>
                <script src="<?= base_url() ?>ashion/js/mixitup.min.js"></script>
                <script src="<?= base_url() ?>ashion/js/jquery.countdown.min.js"></script>
                <script src="<?= base_url() ?>ashion/js/jquery.slicknav.js"></script>
                <script src="<?= base_url() ?>ashion/js/owl.carousel.min.js"></script>
                <script src="<?= base_url() ?>ashion/js/jquery.nicescroll.min.js"></script>
                <script src="<?= base_url() ?>ashion/js/main.js"></script>
                </body>

</html>