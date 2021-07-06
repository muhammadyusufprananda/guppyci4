<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        <?php if($nav == 'profil'): ?>
        <a class="nav-link active" aria-current="page" href="/user">Profil</a>
        <?php else: ?>
        <a class="nav-link" aria-current="page" href="/user">Profil</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
    <?php if($nav == 'keranjang'): ?>
        <a class="nav-link active" aria-current="page" href="/user/keranjang">Keranjang</a>
        <?php else: ?>
        <a class="nav-link" aria-current="page" href="/user/keranjang">Keranjang</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
    <?php if($nav == 'pembelian'): ?>
        <a class="nav-link active" aria-current="page" href="/user/pembelian">Pembelian</a>
        <?php else: ?>
        <a class="nav-link" aria-current="page" href="/user/pembelian">Pembelian</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
    </li>
</ul>