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
                  <form action="/shop/beli/<?= $ikan['id']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="jumlahKeranjang" class="form-label">Jumlah</label>
                        <input type="number" class="form-control iJumlah" id="jumlahKeranjang" name="jumlahKeranjang" value="1" required>
                    </div>
                    <button type="submit" class="mt-3 btn btn-danger">Beli</button>
                  </form>
              </div>
          </div>
        </div>
      </section>
    </section>
<?= $this->include('layout/keranjang'); ?>
<?= $this->endSection(); ?>