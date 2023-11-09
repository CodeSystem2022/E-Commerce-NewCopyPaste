<?= $this->extend('Layouts/base') ?>

<?= $this->section('content') ?>

<?= $this->include('Layouts/section/Inicio/HeroInicio') ?>

<?= $this->include('Layouts/section/Inicio/home') ?>

<?= $this->include('Layouts/section/Inicio/pasos') ?>

<?= $this->include('Layouts/section/Inicio/comunicar') ?>

<?= $this->include('Layouts/section/Inicio/comentarios') ?>

<?= $this->include('Layouts/section/Inicio/revision') ?>







<!-- ======= CTA Section ======= -->
<section class="section cta-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 me-auto text-center text-md-start mb-5 mb-md-0">
                <h2>Comienza a Publicar Tus Productos</h2>
            </div>
            <div class="col-md-5 text-center text-md-end">
                <p><a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-apple"></i><span>App store</span></a> <a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-play-store"></i><span>Google play</span></a></p>
            </div>
        </div>
    </div>
</section><!-- End CTA Section -->




<?= $this->endSection() ?>