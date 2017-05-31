<!-- Header -->
<header>
    <div class="container" id="maincontent" tabindex="-1">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="view/img/disegner/uab.png" alt="" width="250" height="250">
                <div class="intro-text">
                    <h1 class="name">UNIVERSIDAD ADVENTISTA DE BOLIVIA</h1>
                    <hr class="star-light">
                    <span class="skills">Realizamos tus sueños</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio Grid Section
<section id="noticias">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Noticias</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="img/portfolio/cabin.png" class="img-responsive" alt="Cabin">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="img/portfolio/cake.png" class="img-responsive" alt="Slice of cake">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="img/portfolio/circus.png" class="img-responsive" alt="Circus tent">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="img/portfolio/game.png" class="img-responsive" alt="Game controller">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="img/portfolio/safe.png" class="img-responsive" alt="Safe">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="img/portfolio/submarine.png" class="img-responsive" alt="Submarine">
                </a>
            </div>
        </div>
    </div>
</section>
-->
<!-- About Section -->
<section  id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h2>Mision</h2>
                <hr class="star-light">
            </div>
            <div class="col-lg-4 col-lg-offset-2">
                <p>

Somos una institución Adventista comprometida con la formación integral de profesionales y el desarrollo de ciencia y tecnología, fundamentada en la cosmovisión bíblica, para brindar un servicio de calidad a Dios y la Sociedad.
</p>
            </div>

        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6 text-center">
              <h2>Vision</h2>
              <hr class="star-light">
          </div>
            <div class="col-lg-4 col-lg-offset-2">
                <p>

Ser la institución líder en la formación integral de profesionales; que educa para esta vida y la eternidad, desarrollando armoniosamente las potencialidades físicas, mentales, sociales y espirituales para una vida de servicio.
</p>
            </div>

        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contactos</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="phone">Numero Telefonico</label>
                            <input type="tel" class="form-control" placeholder="Numero Telefonico" id="phone" required data-validation-required-message="Please enter your phone number.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="message">Mensaje</label>
                            <textarea rows="5" class="form-control" placeholder="Mensaje" id="message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Direccion</h3>
                    <p>
                        <br>Av. Pairumani y Calle 1</p>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Sitios UAB</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><span class="sr-only">Google Plus</span><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><span class="sr-only">Dribble</span><i class="fa fa-fw fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>About</h3>
                    <p>Creado por Rodrigo Poma y Gustavo Cerezo</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; RyGoCRGT 2017
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- Portfolio Modals
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Project Title</h2>
                        <hr class="star-primary">
                        <img src="img/portfolio/cabin.png" class="img-responsive img-centered" alt="">
                        <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a href="http://startbootstrap.com">April 2014</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a href="http://startbootstrap.com">Web Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Project Title</h2>
                        <hr class="star-primary">
                        <img src="img/portfolio/cake.png" class="img-responsive img-centered" alt="">
                        <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a href="http://startbootstrap.com">April 2014</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a href="http://startbootstrap.com">Web Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Project Title</h2>
                        <hr class="star-primary">
                        <img src="img/portfolio/circus.png" class="img-responsive img-centered" alt="">
                        <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a href="http://startbootstrap.com">April 2014</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a href="http://startbootstrap.com">Web Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Project Title</h2>
                        <hr class="star-primary">
                        <img src="img/portfolio/game.png" class="img-responsive img-centered" alt="">
                        <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a href="http://startbootstrap.com">April 2014</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a href="http://startbootstrap.com">Web Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Project Title</h2>
                        <hr class="star-primary">
                        <img src="img/portfolio/safe.png" class="img-responsive img-centered" alt="">
                        <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a href="http://startbootstrap.com">April 2014</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a href="http://startbootstrap.com">Web Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>Project Title</h2>
                        <hr class="star-primary">
                        <img src="img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
                        <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                        <ul class="list-inline item-details">
                            <li>Client:
                                <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                </strong>
                            </li>
                            <li>Date:
                                <strong><a href="http://startbootstrap.com">April 2014</a>
                                </strong>
                            </li>
                            <li>Service:
                                <strong><a href="http://startbootstrap.com">Web Development</a>
                                </strong>
                            </li>
                        </ul>
                        <button id="btnSubmit" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

-->

<div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content" style="background:rgb(51, 130, 150); opacity:0.85;">

      <form id="LoginPersonal" method="post">

        <div class="modal-header">
            <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title" style="color:white">Ingresar al Sistema <i class="fa fa-arrow-right"></i> Personal-UAB</h3>
            <center><img src="view/img/disegner/user-6.png" alt="login" width="100" height="100"></center>
          </div>

          <div class="modal-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Usuario: " aria-describedby="sizing-addon2" name="usuario" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Contraseña: " aria-describedby="sizing-addon2" name="contrasena" required>
              </div>
            </div>
            <input type="hidden" name="datos" value="1">
          </div>

          <div id="mensaje" style="color:red"></div>

          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar <i class="fa fa-times"></i></button>
            <button type="submit" class="btn btn-success">Ingresar <i class="fa fa-check"></i></button>
          </div>

      </form>

    </div>
  </div>
</div>
