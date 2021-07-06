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
                <h2>Pembelian</h2>
                <hr>
                <small>*Konfimasi pembayaran anda dengan mengirimkan bukti pembayaran dan kode ke Whatsapp.</small>
                <table class="table table-sm table-light">
                    <thead>
                        <tr>
                            <th width="15%">Kode</th>
                            <th width="45%">Pesanan</th>
                            <th width="20%">Total</th>
                            <th width="20%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($checkout as $co) : ?>
                            <tr>
                                <td><?= $co->kode ?></td>
                                <td>
                                    <?php foreach ($keranjang as $k) : ?>
                                        <?php if ($co->kode == $k->kode_checkout) : ?>
                                            <?= $k->nama . ' x ' . $k->jumlah ?><br>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= $co->total ?></td>
                                <td><?= $co->status ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>