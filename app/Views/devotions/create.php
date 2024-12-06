<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Tambah Renungan</h2>
    <form action="/devotions/store" method="post">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Isi</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/devotions" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>