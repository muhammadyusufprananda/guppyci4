<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Bagian Etalase -->
<section class="S-rekomendasi mt-5">
      <section class="S-judul">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h1>ETALASE</h1>
              <hr />
            </div>
          </div>
        </div>
      </section>
      <section class="S-konten">
        <div class="container">
          <div class="row C-card mt-3">
            <?php foreach($ikan as $i) : ?>
            <div class="col-sm-3 text-center p-3">
              <img src="/img/fish/<?= $i['gambar'] ?>" alt="<?= $i['slug'] ?>" />
              <a href="/shop/<?= $i['slug'] ?>">
                <h5><?= strtoupper($i['nama']); ?></h5>
              </a>
              <h5>Rp <?= $i['harga'] ?></h5>
            </div>
            <?php endforeach; ?>
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