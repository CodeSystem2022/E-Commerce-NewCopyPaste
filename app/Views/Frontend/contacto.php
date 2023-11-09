<?= $this->extend('Layouts/base') ?>

<?= $this->section('content') ?>

<section class="hero-section inner-page">
  <div class="wave">

    <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
          <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
        </g>
      </g>
    </svg>

  </div>

  <div class="container">
    <div class="row align-items-center">
      <div class="col-12">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center hero-text">
            <h1 data-aos="fade-up" data-aos-delay="">Contáctanos</h1>
            <p class="mb-5" data-aos="fade-up" data-aos-delay="100">En New Copy Paste, creemos en la comunicación sin complicaciones. Comunícate con nosotros de manera sencilla a través de múltiples canales. Ya sea que tengas preguntas, necesites asistencia o simplemente quieras conectarte, estamos aquí para ayudarte. No dudes en contactarnos por teléfono, correo electrónico o redes sociales. Tus consultas son importantes para nosotros, y estamos comprometidos en proporcionar respuestas oportunas y útiles.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<section class="section">
  <div class="container">
    <div class="row mb-5 align-items-end">
      <div class="col-md-6" data-aos="fade-up">

        <h2>Formulario de Contacto</h2>
        <p class="mb-0">En New Copy Paste, valoramos tu retroalimentación y estamos aquí para atender tus consultas. Utiliza nuestro formulario de contacto para enviarnos cualquier pregunta, comentario o solicitud que puedas tener. Nos esforzamos por responder en el menor tiempo posible.</p>
      </div>

    </div>

    <div class="row">
      <div class="col-md-4 ms-auto order-2" data-aos="fade-up">
        <ul class="list-unstyled">
          <!-- <li class="mb-3">
            <strong class="d-block mb-1">Direccion</strong>
            <span>Avenida Mitre 3333, San Rafael,Mendoza , Argentina </span>
          </li>
          <li class="mb-3">
            <strong class="d-block mb-1">Telefono</strong>
            <span>+549 260 XXXXXXX</span>
          </li> -->
          <li class="mb-3">
            <strong class="d-block mb-1">Email</strong>
            <span>info@newcopypaste.tech</span>
          </li>
        </ul>
      </div>

      <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
        <form action="forms/contact.php" method="post" role="form" class="php-email-form">

          <div class="row">
            <div class="col-md-6 form-group">
              <label for="name">Nombre</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="name">Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="col-md-12 form-group mt-3">
              <label for="name">Asunto</label>
              <input type="text" class="form-control" name="subject" id="subject" required>
            </div>
            <div class="col-md-12 form-group mt-3">
              <label for="name">Mensaje</label>
              <textarea class="form-control" name="message" required></textarea>
            </div>

            <div class="col-md-12 mb-3">
              <div class="loading">Cargando</div>
              <div class="error-message"></div>
              <div class="sent-message">Tu mensaje ha sido enviado. ¡Gracias!</div>
            </div>

            <div class="col-md-6 form-group">
              <input type="submit" class="btn btn-primary d-block w-100" value="Send Message">
            </div>
          </div>

        </form>
      </div>

    </div>
  </div>
</section>





<?= $this->endSection() ?>