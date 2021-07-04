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
                <h2>Form Edit Ikan</h2>
                <hr>
                <?php if (session()->getFlashdata('pesan-merah')) : ?>
                <div class="my-2 alert alert-danger">
                    <?= session()->getFlashdata('pesan-merah') ?>
                </div>
                <?php endif; ?>
                <form action="/admin/simpanedit/<?= $ikan['id'] ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                    <input type="hidden" name="gambarLama" value="<?= $ikan['gambar'] ?>">
                    <div class="mb-3">
                        <label for="namaIkan" class="form-label">Nama Ikan</label>
                        <input type="text" class="form-control" id="namaIkan" name="namaIkan" value="<?= $ikan['nama'] ?>" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="slugIkan" class="form-label">Slug Ikan</label>
                        <input type="text" class="form-control" id="slugIkan" name="slugIkan" value="<?= $ikan['slug'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="hargaIkan" class="form-label">Harga Ikan</label>
                        <input type="number" class="form-control" id="hargaIkan" name="hargaIkan" value="<?= $ikan['harga'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambarIkan" class="form-label">Gambar Ikan</label>
                        <input type="file" class="form-control" id="gambarIkan" name="gambarIkan">
                    </div>
                    <div class="mb-3">
                        <label for="stokIkan" class="form-label">Stok Ikan</label>
                        <input type="number" class="form-control" id="stokIkan" name="stokIkan" value="<?= $ikan['stok'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiIkan" class="form-label">Deskripsi Ikan</label>
                        <textarea class="form-control" id="deskripsiIkan" rows="5" name="deskripsiIkan"><?= $ikan['deskripsi'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</section>
      
<?= $this->endSection(); ?>