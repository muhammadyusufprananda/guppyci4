<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Bagian Etalase -->
<section class="S-rekomendasi mt-5">
      <section class="S-judul">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h1><?= $ikan['nama'] ?></h1>
              <hr />
            </div>
          </div>
        </div>
      </section>
      <section class="S-konten mt-3">
        <div class="container">
          <div class="row">
              <div class="col-sm-4">
                  <img src="/img/fish/<?= $ikan['gambar'] ?>" alt="<?= $ikan['slug'] ?>" width="100%">
              </div>
              <div class="col-sm-8 ps-3">
                  <h2>Deskripsi:</h2>
                  <p><?= $ikan['deskripsi'] ?></p>
                  <h4>Harga: Rp. <?= $ikan['harga'] ?></h4>
                  <h4>Stok: <?= $ikan['stok'] ?></h4>
                  <a class="mt-3 btn btn-danger" href="">Beli</a>
              </div>
          </div>
        </div>
      </section>
    </section>
    <!-- Bagian keranjang -->
    <section class="S-rekomendasi mt-5">
      <section class="S-judul">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h1>KERANJANG</h1>
              <hr />
            </div>
          </div>
        </div>
      </section>
      <section class="S-konten">
        <div class="container">
          <table class="table table-sm table-light">
            <thead>
              <tr>
                <th>Jumlah</th>
                <th>Nama</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td colspan="3">TOTAL</td>
                <td>RP. 0</td>
              </tr>
            </tbody>
          </table>
          <div class="text-end">
            <button class="btn btn-danger mt-3">Checkout</button>
          </div>
        </div>
      </section>
    </section>
<?= $this->endSection(); ?>