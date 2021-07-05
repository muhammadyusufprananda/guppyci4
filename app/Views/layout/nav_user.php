<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        <?php if($nav == 'profil'): ?>
        <a class="nav-link active" aria-current="page" href="/user">Profil</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/keranjang">Keranjang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
    </li>
</ul>