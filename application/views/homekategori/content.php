<div class="content-wraper pt-60 pb-60 pt-sm-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">

                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">

                            <!-- shop-item-filter-list end -->
                        </div>
                        <div class="toolbar-amount">
                            <span>Showing 1 to 9 of 15</span>
                        </div>
                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <div class="product-short">
                            <p>Sort By:</p>
                            <select class="nice-select">
                                <option value="trending">Relevance</option>
                                <option value="sales">Name (A - Z)</option>
                                <option value="sales">Name (Z - A)</option>
                                <option value="rating">Price (Low &gt; High)</option>
                                <option value="date">Rating (Lowest)</option>
                                <option value="price-asc">Model (A - Z)</option>
                                <option value="price-asc">Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <section class="py-5">
                            <div class="container px-4 px-lg-5 mt-5">
                                <div class="row gx-4 gx-lg-5 ">
                                    <?php if (empty($produk)) : ?>
                                        <h2>Produk yang Anda cari tidak ditemukan</h2>
                                    <?php else : ?>
                                        <?php foreach ($produk as $row) : ?>
                                            <div class="col-lg-3 col-md-4 col-sm-6 mb-5"> <!-- Ubah jumlah kolom untuk tampilan hp -->
                                                <div class="card h-100" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                                                    <!-- Product image-->
                                                    <div class="card-img-container">
                                                        <a href="<?= base_url('home/detail/' . $row->id_produk); ?>">
                                                            <img class="card-img-top img-fluid" src="<?= base_url('gambarproduk/' . $row->gambar1); ?>" style=" height: 200px;" alt="Product Image" />
                                                        </a>
                                                    </div>
                                                    <!-- Product details-->
                                                    <div class="card-body p-4">
                                                        <div class="text-center">
                                                            <!-- Product name-->
                                                            <h5 class="fw-bolder"><?php echo $row->nama ?></h5>
                                                            <!-- Product price-->
                                                            RP.<?= number_format($row->harga, 0) ?>
                                                        </div>
                                                    </div>
                                                    <!-- Product actions-->
                                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?= base_url('home/detail/' . $row->id_produk); ?>">View options</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </section>

                        <div class="paginatoin-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 pt-xs-15">
                                    <p>Showing 1-12 of 13 item(s)</p>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul class="pagination-box pt-xs-20 pb-xs-15">
                                        <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li>
                                            <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="sidebar-categores-box">
                    <div class="sidebar-title">
                        <h2>FILTER</h2>
                    </div>
                    <div class="filter-sub-area">
                        <h5 class="filter-sub-titel">Jenis Barang</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <input type="text" id="search-input" placeholder="Cari Nama Barang...">
                                <?php foreach ($produk as $row) : ?>
                                    <ul class="ul" id="barang-list">
                                        <li>
                                            <a href="<?= base_url('home/detail/' . $row->id_produk); ?>">
                                                <?php echo strtolower($row->nama); ?>
                                            </a>
                                        </li>
                                    </ul>
                                <?php endforeach; ?>
                            </form>

                        </div>
                    </div>


                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Size</h5>
                        <div class="size-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-size"><a href="#">S</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">M</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">L</a></li>
                                    <li><input type="checkbox" name="product-size"><a href="#">XL</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <form action="<?= base_url('produk/filterByPrice'); ?>" method="get" id="filter-form">
                        <div class="form-group">
                            <label for="min-price">Harga Min:</label>
                            <input type="number" id="min-price" name="min-price" min="0" placeholder="Masukkan Harga Min">
                        </div>
                        <div class="form-group">
                            <label for="max-price">Harga Max:</label>
                            <input type="number" id="max-price" name="max-price" min="0" placeholder="Masukkan Harga Max">
                        </div>
                        <button type="submit">Filter</button>
                    </form>


                    <!-- <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Color</h5>
                        <div class="color-categoriy">
                            <form action="#">
                                <ul>
                                    <li><span class="white"></span><a href="#">White (1)</a></li>
                                    <li><span class="black"></span><a href="#">Black (1)</a></li>
                                    <li><span class="Orange"></span><a href="#">Orange (3) </a></li>
                                    <li><span class="Blue"></span><a href="#">Blue (2) </a></li>
                                </ul>
                            </form>
                        </div>
                    </div>

                    <div class="filter-sub-area pt-sm-10 pb-sm-15 pb-xs-15">
                        <h5 class="filter-sub-titel">Dimension</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">40x60cm (6)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">60x90cm (6)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">80x120cm (6)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>