<div class="sidebar111" id="sidebar">

    <div class="user-info-container">
        <!-- Gambar di sebelah kiri -->
        <?php
        $user_id = $this->session->userdata('id');
        $user_data = $this->db->get_where('tbl_user', ['id' => $user_id])->row_array();
        $profil_image = base_url('gambar_user/' . $user_data['gambar']);
        ?>
        <img style="border-radius: 100%; width: 50px; height: 50px;" src="<?= $profil_image ?>" alt="Gambar Pengguna" />

        <!-- Span 1 dan 2 di sebelah kanan gambar -->

        <div class="vertical-container">
            <span class="language-selector-wrapper1" style="color: black;"><?php echo $this->session->userdata('nama'); ?></span>
            <span class="language-selector-wrapper2">
                <i class="fas fa-pencil-alt"></i> Ubah Profil
            </span>
        </div>
    </div>
    <div class="custom-link-container">
        <a href="<?= base_url('home/profil') ?>" class="custom-link"><i class="fas fa-user"></i> Akun Saya</a>
        <a href="<?= base_url('pesanan_saya') ?>" class="custom-link"><i class="fas fa-cog"></i> Pesanan Saya</a>
        <!-- Anda dapat menambahkan tautan lain di sini jika diperlukan -->
    </div>


</div>

<!-- Tombol Toggle untuk Navbar di Mode Responsif -->
<button id="toggleBtn">☰</button>

<div class="content-wrapper">
    <!-- Form di sebelah kiri -->
    <div class="form-container">
        <div class="form-container">
            <form action="<?php echo base_url('home/updateuser1'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data_user->id ?>">

                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $data_user->nama ?>">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $data_user->email ?>">
                <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Simpan</button>

        </div>
    </div>

    <!-- Gambar di sebelah kanan -->
    <div class="image-container">
        <?php
        $user_id = $this->session->userdata('id');
        $user_data = $this->db->get_where('tbl_user', ['id' => $user_id])->row_array();
        $profil_image = base_url('gambar_user/' . $user_data['gambar']);
        ?>

        <img style="border-radius: 100%; width: 150px; height: 150px; cursor: pointer;" src="<?= $profil_image ?>" alt="Gambar Pengguna" onclick="document.getElementById('gambar').click();" />

        <!-- Input file yang tersembunyi -->
        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" style="display: none;">
        <div class="image-info">
            Ukuran gambar: maks. 1 MB<br>
            Format gambar: .JPEG, .PNG
        </div>
    </div>
    </form>
</div>


<script>
    document.getElementById('toggleBtn').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        const content = document.querySelector('.content111');

        if (sidebar.style.width === '250px') {
            sidebar.style.width = '0';
            content.style.marginLeft = '0'; // Mengatur margin kiri ke 0 saat sidebar ditutup
        } else {
            sidebar.style.width = '250px';
            content.style.marginLeft = '250px'; // Mengatur margin kiri ke 250px saat sidebar dibuka
        }
    });
</script> <?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>