<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Renungan Harian</h2>
    <a href="/devotions/create" class="btn btn-primary mb-3">Tambah Renungan</a>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($devotions as $key => $devotion): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $devotion['title'] ?></td>
                    <td><?= substr($devotion['content'], 0, 50) . '...' ?></td>
                    <td><?= $devotion['date'] ?></td>
                    <td>
                        <a href="/devotions/edit/<?= $devotion['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/devotions/delete/<?= $devotion['id'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus renungan ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>