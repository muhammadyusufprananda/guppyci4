<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Bagian Etalase -->
<section class="S-admin mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?= $this->include('layout/nav_user') ?>
            </div>
            <div class="col-sm-9">
                <?= $this->include('layout/keranjang'); ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>