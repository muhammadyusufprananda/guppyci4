  <!-- Bagian top-bar -->
  <section class="S-top-bar py-2">
    <div class="container">
      <div class="row">
        <!-- Bagian kontak -->
        <div class="col-6">
          <a href="#"><i class="bi-envelope-fill me-1"></i>guppy-ecommerce@gmail.com</a>
          <a href="#"><i class="bi-telephone-fill me-1"></i>+62-800-1111-2222</a>
        </div>
        <!-- Bagian media sosial dan login -->
        <div class="col-6 text-end">
          <a href="#"><i class="bi-instagram"></i></a>
          <a href="#"><i class="bi-facebook"></i></a>
          <a href="#"><i class="bi-shop"></i></a>
          <!-- Bagian login -->
          <?php if(logged_in()): ?>
          <!-- Jika sudah login -->
            <div class="dropdown d-inline">
              <a class="btn btn-danger text-white dropdown-toggle p-0 px-1 mb-1" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi-person-circle me-2"></i><?= user()->username ?></a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php if(in_groups('superadmin')): ?>
                  <li><a class="dropdown-item" href="/admin">Admin</a></li>
                  <li><a class="dropdown-item" href="/admin/profil">Profile</a></li>
                <?php elseif(in_groups('user')): ?>
                  <li><a class="dropdown-item" href="/user">Profile</a></li>
                  <li><a class="dropdown-item" href="/user/keranjang">Keranjang</a></li>
                <?php endif; ?>
                  <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
              </ul>
            </div>
          <?php else: ?>
            <a href="<?= base_url('login') ?>" class="C-login"><i class="bi-person-circle me-2"></i>Login</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>