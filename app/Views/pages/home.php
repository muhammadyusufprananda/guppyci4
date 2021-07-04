<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<!-- Bagian karosel -->
  <section class="S-carousel">
    <div class="container">
      <div class="row">
        <div class="col">
          <!-- Bagian data karosel -->
          <div id="C-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#C-carousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#C-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#C-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <!-- Bagian memanggil gambar karosel -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/img/carousel-3.jpg" class="d-block w-100" />
              </div>
              <div class="carousel-item">
                <img src="/img/carousel-2.jpg" class="d-block w-100" />
              </div>
              <div class="carousel-item">
                <img src="/img/carousel-1.jpg" class="d-block w-100" />
              </div>
            </div>
            <!-- Bagian tombol karosel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#C-carousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#C-carousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Bagian Rekomendasi -->
  <section class="S-rekomendasi mt-5">
    <section class="S-judul">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <h1>PRODUK TERBARU</h1>
            <hr />
          </div>
        </div>
      </div>
    </section>
    <section class="S-konten">
      <div class="container">
        <div class="row C-card mt-3">
            <?php for($i=0;$i<4;$i++) : ?>
            <div class="col-sm-3 text-center p-3">
              <img src="/img/fish/<?= $ikan[$i]['gambar'] ?>" alt="<?= $ikan[$i]['slug'] ?>" />
              <a href="/shop/<?= $ikan[$i]['slug'] ?>">
                <h5><?= strtoupper($ikan[$i]['nama']); ?></h5>
              </a>
              <h5>Rp <?= $ikan[$i]['harga'] ?></h5>
            </div>
            <?php endfor; ?>
        </div>
      </div>
    </section>
  </section>
  <?= $this->endSection() ?>