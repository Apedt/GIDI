<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Tambah Jadwal Ibadah</h2>
    <form action="/schedules/store" method="post">
        <div class="form-group">
            <label>Nama Ibadah</label>
            <input type="text" name="service_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Waktu</label>
            <input type="time" name="time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/schedules" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>