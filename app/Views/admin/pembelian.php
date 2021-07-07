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
                <h2>Pembelian</h2>
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
                <table class="table table-sm table-light">
                    <thead>
                        <tr>
                            <th width="15%">Kode</th>
                            <th width="40%">Informasi</th>
                            <th width="15%">Total</th>
                            <th width="15%">Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($checkout as $co) : ?>
                            <tr>
                                <td class="align-top"><?= $co->kode ?></td>
                                <td>
                                    <p class="mb-0"><b>Pemesan: </b><?= $co->namauser ?></p>
                                    <p class="mb-0"><b>Alamat: </b><?= $co->alamat ?></p>
                                    <p class="mb-0"><b>Beli: </b></p>
                                    <ul>
                                        <?php foreach ($keranjang as $k) : ?>
                                            <?php if ($k->kode_checkout == $co->kode) : ?>
                                                <li><?= $k->nama ?> x <?= $k->jumlah ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                                <td class="align-top">Rp. <?= $co->total ?></td>
                                <td class="align-top">
                                    <?php if ($co->id_status == 1) : ?>
                                        <div class="cStatus btn btn-danger p-1"><?= $co->nama ?></div>
                                    <?php elseif ($co->id_status == 2) : ?>
                                        <div class="cStatus btn btn-primary p-1"><?= $co->nama ?></div>
                                    <?php elseif ($co->id_status == 3) : ?>
                                        <div class="cStatus btn btn-warning p-1"><?= $co->nama ?></div>
                                    <?php elseif ($co->id_status == 4) : ?>
                                        <div class="cStatus btn btn-success p-1"><?= $co->nama ?></div>
                                    <?php endif; ?>
                                </td>
                                <td class="align-top">
                                    <a href="/admin/pembelian/<?= $co->kode ?>" class="cStatus btn btn-primary me-1">Edit</a>
                                    <?php if ($co->id_status == 1) : ?>
                                        <a href="/admin/hapuscheckout/<?= $co->kode ?>" class="cStatus btn btn-danger me-1">Hapus</a>
                                    <?php else : ?>
                                    <?php endif; ?>
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