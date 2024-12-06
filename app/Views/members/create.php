<?= $This->extend('index') ?>
<?= $This->section('content') ?>
<div class="container mt-4">
    <h2 class="text-center mb-4">Tambah Data Jemaat</h2>

    <!-- Card untuk Form Tambah Data -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Tambah Data Jemaat</h5>
        </div>
        <div class="card-body">
            <!-- Form Tambah Data -->
            <form action="/members/store" method="POST">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Jemaat</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="baptized_date" class="form-label">Tanggal Baptis</label>
                    <input type="date" class="form-control" id="baptized_date" name="baptized_date" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="/members" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $This->endSection() ?>