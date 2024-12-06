<?= $This->extend('index') ?>
<?= $This->section('content') ?>
<div class="container mt-4">
    <h2 class="text-center mb-4">Edit Data Jemaat</h2>

    <!-- Form Edit Data -->
    <form action="/members/update/<?= $member['id'] ?>" method="POST">
        <?= csrf_field() ?>
        <!-- <input type="hidden" name="_method" value="PUT"> Method Spoofing untuk PUT -->

        <div class="mb-3">
            <label for="name" class="form-label">Nama Jemaat</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $member['name']) ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address"
                value="<?= old('address', $member['address']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone"
                value="<?= old('phone', $member['phone']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?= old('email', $member['email']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="baptized_date" class="form-label">Tanggal Baptis</label>
            <input type="date" class="form-control" id="baptized_date" name="baptized_date"
                value="<?= old('baptized_date', $member['baptized_date']) ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Perbarui Data</button>
        <a href="/members" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $This->endSection() ?>