<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Edit Jadwal Ibadah</h2>
    <form action="/schedules/update/<?= $schedule['id'] ?>" method="post">
        <div class="form-group">
            <label>Nama Ibadah</label>
            <input type="text" name="service_name" class="form-control" value="<?= $schedule['service_name'] ?>"
                required>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="date" class="form-control" value="<?= $schedule['date'] ?>" required>
        </div>
        <div class="form-group">
            <label>Waktu</label>
            <input type="time" name="time" class="form-control" value="<?= $schedule['time'] ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="/schedules" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>