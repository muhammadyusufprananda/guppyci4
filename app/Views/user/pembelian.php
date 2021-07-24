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
                <div class="cPenting mb-2 p-3">
                    <small>*Harap isi dengan benar nama, alamat, dan No.HP sebelum melakukan konfirmasi pembayaran. Pengiriman ikan akan menggunakan Nama, Alamat, dan No. HP yang tertera.</small><br>
                    <small>*Kesalahan pengisian Nama, Alamat, dan No. HP bukan tanggung jawab kami.</small><br>
                </div>
                <h5>Rekening Pembayaran:</h5>
                <ul>
                    <li>BNI: 0230312 (Machfud Amanullah)</li>
                    <li>BRI: 1120310111 (Machfud Amanullah)</li>
                    <li>BCA: 0192391488 (Machfud Amanullah)</li>
                </ul>
                <small>*Konfimasi pembayaran anda dengan mengklik 'Belum Konfimasi' kemudian mengirimkan bukti pembayaran dan kode pembayaran.</small><br>
                <small>*Proses status pembelian: Belum bayar -> Sudah bayar -> Dikirim -> Diterima.</small>
                <hr>
                <h5 class="mt-2">Nama pemesan:</h5>
                <span class="me-2"><?= $user->namauser ?></span><a class="cStatus btn btn-secondary p-1" href="/user">Klik untuk ubah Nama</a><br>
                <h5 class="mt-2">Alamat pengiriman:</h5>
                <span class="me-2"><?= $user->alamat ?></span><a class="cStatus btn btn-secondary p-1" href="/user">Klik untuk ubah Alamat</a><br>
                <h5 class="mt-2">No. HP:</h5>
                <span class="me-2"><?= $user->nohp ?></span><a class="cStatus btn btn-secondary p-1" href="/user">Klik untuk ubah No. HP</a><br>
                <table class="table table-sm table-light mt-4">
                    <thead>
                        <tr>
                            <th width="15%">Kode</th>
                            <th width="40%">Pesanan</th>
                            <th width="15%">Status</th>
                            <th width="15%">Pembayaran</th>
                            <th width="15%">Total</th>
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
                                <td>
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
                                <td>
                                    <?php if ($co->id_status == 1) : ?>
                                        <a href="https://api.whatsapp.com/send?phone=+6281391453763&text=Saya%20ingin%20mengkonfirmasi%20pembayaran%20dengan%20kode%20<?= $co->kode ?>." class="cStatus btn btn-danger p-1" target="_blank">Belum Konfirmasi</a>
                                    <?php else : ?>
                                        <div class="cStatus btn btn-success p-1">Terkonfirmasi</div>
                                    <?php endif; ?>
                                </td>
                                <td>Rp. <?= $co->total ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>