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
                <th width="10%">Jumlah</th>
                <th width="45%">Nama</th>
                <th width="25%">Harga Satuan</th>
                <th width="25%">Total Harga</th>
                <th width="5%">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $totalKeseluruhan = 0 ?>
            <?php foreach($keranjang as $k): ?>
              <tr>
                <td><?= $k->jumlah ?></td>
                <td><?= $k->nama ?></td>
                <td>Rp. <?= $k->harga ?></td>
                <td>Rp. <?= $k->total ?></td>
                <td><a href="/shop/hapuskeranjang/<?= $k->id_users; ?>/<?= $k->id_ikan; ?>" onclick="alert('Anda yakin?')">Hapus</a></td>
                <?php $totalKeseluruhan = $totalKeseluruhan + $k->total ?>
              </tr>
            <?php endforeach; ?>
              <tr>
                <td colspan="3">TOTAL</td>
                <td colspan="2" >RP. <?= $totalKeseluruhan; ?></td>
              </tr>
            </tbody>
          </table>
          <div class="text-end">
            <button class="btn btn-danger mt-3">Checkout</button>
          </div>
        </div>
      </section>
    </section>
