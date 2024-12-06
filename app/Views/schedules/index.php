<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h2 class="text-center mb-4">Jadwal Ibadah</h2>

    <!-- Card for Jadwal Ibadah Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-gradient text-white">
            <h5 class="mb-0">Daftar Jadwal Ibadah Gereja</h5>
        </div>
        <div class="card-body">

            <div class="d-flex justify-content-between mb-4">
                <a href="/schedules/create" class="btn btn-primary">Tambah Jadwal Ibadah</a>

                <!-- Search Bar -->
                <div class="w-50">
                    <input type="text" id="search" class="form-control" placeholder="Cari Jadwal Ibadah...">
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Ibadah</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="schedule-list">
                        <?php foreach ($schedules as $key => $schedule): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $schedule['service_name'] ?></td>
                                <td><?= $schedule['date'] ?></td>
                                <td><?= $schedule['time'] ?></td>
                                <td>
                                    <a href="/schedules/edit/<?= $schedule['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/schedules/delete/<?= $schedule['id'] ?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus jadwal ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- No data message -->
            <div id="no-data" class="text-center text-danger" style="display: none;">
                <p>Data jadwal ibadah tidak ditemukan.</p>
            </div>
        </div>
    </div>
</div>

<!-- Javascript to filter search -->
<script>
    document.getElementById('search').addEventListener('input', function () {
        filterTable();
    });

    function filterTable() {
        let searchQuery = document.getElementById('search').value.toLowerCase();
        let rows = document.querySelectorAll('#schedule-list tr');
        let found = false;

        rows.forEach(row => {
            let name = row.cells[1].innerText.toLowerCase();
            let date = row.cells[2].innerText.toLowerCase();
            let time = row.cells[3].innerText.toLowerCase();

            if (name.includes(searchQuery) || date.includes(searchQuery) || time.includes(searchQuery)) {
                row.style.display = '';
                found = true;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('no-data').style.display = found ? 'none' : 'block';
    }
</script>

<?= $this->endSection() ?>