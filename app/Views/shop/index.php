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
<?= $this->include('layout/keranjang'); ?>
<?= $this->endSection(); ?>