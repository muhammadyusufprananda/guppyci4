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
                <h2>Shoplist</h2>
                <hr>
                <div class="text-end mb-3">
                    <a href="/admin/tambah" class="btn btn-danger">Tambah Ikan</a>
                </div>
                <?php if (session()->getFlashdata('pesan-hijau')) : ?>
                <div class="my-2 alert alert-success">
                    <?= session()->getFlashdata('pesan-hijau') ?>
                </div>
                <?php elseif (session()->getFlashdata('pesan-merah')) : ?>
                <div class="my-2 alert alert-danger">
                    <?= session()->getFlashdata('pesan-merah') ?>
                </div>
                <?php endif; ?>
                <table class="table table-sm table-light">
                    <thead>
                        <tr>
                            <th width="40%">Nama</th>
                            <th width="20%">Harga</th>
                            <th width="20%">Stok</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($ikan as $i) : ?>
                        <tr>
                            <td><?= $i['nama'] ?></td>
                            <td><?= $i['harga'] ?></td>
                            <td><?= $i['stok'] ?></td>
                            <td>
                                <a href="/admin/edit/<?= $i['slug'] ?>" class="btn btn-primary">Edit</a>
                                <form action="/admin/<?= $i['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
      
<?= $this->endSection(); ?>