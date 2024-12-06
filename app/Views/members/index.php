<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h2 class="text-center mb-4">Data Jemaat</h2>
    <a href="/members/create" class="btn btn-primary mb-3">Tambah Data Jemaat</a>

    <!-- Card untuk Menampilkan Tabel Data Jemaat -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar Jemaat Gereja</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Email</th>
                        <th>Tanggal Baptis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $key => $member): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= esc($member['name']) ?></td>
                            <td><?= esc($member['address']) ?></td>
                            <td><?= esc($member['phone']) ?></td>
                            <td><?= esc($member['email']) ?></td>
                            <td><?= esc($member['baptized_date']) ?></td>
                            <td>
                                <a href="/members/edit/<?= $member['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/members/delete/<?= $member['id'] ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>