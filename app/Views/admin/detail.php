<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Bagian Etalase -->
<section class="S-admin mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?= $this->include('layout/nav_admin') ?>
            </div>
            <div class="col-sm-9">
                <h2>Detail Pesanan [<?= $checkout->kode ?>]</h2>
                <hr>
                <?php if (session()->getFlashdata('pesan-hijau')) : ?>
                    <div class="my-2 alert alert-success">
                        <?= session()->getFlashdata('pesan-hijau') ?>
                    </div>
                <?php elseif (session()->getFlashdata('pesan-merah')) : ?>
                    <div class="my-2 alert alert-danger">
                        <?= session()->getFlashdata('pesan-merah') ?>
                    </div>
                <?php endif; ?>
                <form action="/admin/updatecheckout/<?= $checkout->kode ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $checkout->namauser ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $checkout->alamat ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">No. Hp</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $checkout->nohp ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= $checkout->kode ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" class="form-control" id="total" name="total" value="<?= $checkout->total ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="idStatus" class="form-label">Status</label>
                        <select class="form-select" name="idStatus" id="idStatus">
                            <?php foreach ($status as $s) : ?>
                                <option value="<?= $s->id ?>" <?php if ($checkout->id_status == $s->id) : ?> selected <?php endif; ?>><?= $s->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>