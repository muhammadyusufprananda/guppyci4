<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Bagian Etalase -->
<section class="S-admin mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?= $this->include('layout/nav_user') ?>
            </div>
            <div class="col-sm-9">
                <h2>Profil</h2>
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
                <form action="/user/simpanedit" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="emailUser" class="form-label">Email</label>
                        <input type="text" class="form-control" id="emailUser" name="emailUser" value="<?= $user->email ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="usernameUser" class="form-label">Username</label>
                        <input type="text" class="form-control" id="usernameUser" name="usernameUser" value="<?= $user->username ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="namauserUser" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="namauserUser" name="namauserUser" value="<?= $user->namauser ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamatUser" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamatUser" name="alamatUser" value="<?= $user->alamat ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nohpUser" class="form-label">No. HP</label>
                        <input type="text" class="form-control" id="nohpUser" name="nohpUser" value="<?= $user->nohp ?>">
                    </div>
                    <button type="submit" class="btn btn-danger">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>