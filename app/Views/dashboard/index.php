<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Gereja Injili Di Indonesia</h2>
    <div class="row">
        <!-- Jadwal Ibadah -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-light rounded">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <span>Jadwal Ibadah Terdekat</span>
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="card-body">
                    <?php if (!empty($nextSchedule)): ?>
                        <h5 class="card-title"><?= $nextSchedule['service_name'] ?></h5>
                        <p class="card-text"><strong>Tanggal:</strong> <?= $nextSchedule['date'] ?></p>
                        <p class="card-text"><strong>Waktu:</strong> <?= $nextSchedule['time'] ?></p>
                        <a href="/schedules" class="btn btn-primary w-100">Lihat Semua Jadwal</a>
                    <?php else: ?>
                        <p class="text-muted">Belum ada jadwal ibadah yang ditambahkan.</p>
                        <a href="/schedules/create" class="btn btn-outline-primary w-100">Tambah Jadwal</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Renungan Harian -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-light rounded">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <span>Renungan Harian Terbaru</span>
                    <i class="fas fa-bible"></i>
                </div>
                <div class="card-body">
                    <?php if (!empty($latestDevotion)): ?>
                        <h5 class="card-title"><?= $latestDevotion['title'] ?></h5>
                        <p class="card-text"><?= substr($latestDevotion['content'], 0, 100) . '...' ?></p>
                        <a href="/devotions" class="btn btn-success w-100">Baca Selengkapnya</a>
                    <?php else: ?>
                        <p class="text-muted">Belum ada renungan harian yang ditambahkan.</p>
                        <a href="/devotions/create" class="btn btn-outline-success w-100">Tambah Renungan</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Data Jemaat -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-light rounded">
                <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                    <span>Data Jemaat</span>
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= count($members) ?> Jemaat Terdaftar</h5>
                    <p class="card-text">Jumlah jemaat yang sudah terdaftar di gereja.</p>
                    <a href="/members" class="btn btn-warning w-100">Lihat Semua Data</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistika -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm border-light rounded">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <span>Statistik Gereja</span>
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Statistik Kehadiran Ibadah</h5>
                    <p class="card-text">Grafik atau informasi statistik kehadiran ibadah di gereja.</p>
                    <a href="#" class="btn btn-info w-100">Lihat Statistik</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan animasi atau efek dengan menggunakan AOS (Animate On Scroll) -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<?= $this->endSection() ?>