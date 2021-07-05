<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        <?php if($nav == 'shoplist'): ?>
        <a class="nav-link active" aria-current="page" href="/admin">Shoplist</a>
        <?php else: ?>
        <a class="nav-link" aria-current="page" href="/admin">Shoplist</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
    <?php if($nav == 'pembelian'): ?>
        <a class="nav-link active" aria-current="page" href="/admin/pembelian">Pembelian</a>
        <?php else: ?>
        <a class="nav-link" aria-current="page" href="/admin/pembelian">Pembelian</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
    <?php if($nav == 'profil'): ?>
        <a class="nav-link active" aria-current="page" href="/admin/profil/<?= user_id() ?>">Profil</a>
        <?php else: ?>
        <a class="nav-link" aria-current="page" href="/admin/profil/<?= user_id() ?>">Profil</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="<?= base_url('logout') ?>">Logout</a>
    </li>
</ul>