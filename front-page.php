<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package servillantasadomicilio
 */

get_header();
?>

<main>

<div class="hero">
    <div class="tire"></div>
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10 center">
                    <h2>TUS LLANTAS HASTA TU <br/><strong>CASA U OFICINA</strong></h2>
                </div>
                <div class="col-1"></div>
                <div class="col-5 col-md-3"></div>
                <div class="col-7 col-md-6">
                    <div class="searching-form row">

                        <div class="col-12">
                            <h3>Cotiza tus <strong>llantas</strong> <span><i class="serching-icon"></i></span></h3>
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <button class="sl-btn skewed off" disabled>
                                <p>Por Auto <i class="car-icon"></i></p>
                            </button>                                    
                        </div>

                        <div class="col-12 col-md-6">
                            <form id="bymessure-form" action="servillantasadomicilio/busqueda-por-medida/">
                                <button id="bymessure-btn" class="sl-btn skewed">
                                    <p>Por Medida <i class="compass-icon"></i></p>
                                </button>
                            </form>

                        </div>

                     </div> <!-- .searching-form .row-->
                </div> <!-- .col-7 .col-md-10-->
                <div class="col-md-3 d-none d-md-block"></div>
            </div> <!-- .row -->
        </div> <!-- .container -->
        <div class="row">
            <div class="col-4"></div>
            <div class="col-8">
                <div id="promoViewer" class="viewer">
                    <img class="promo1" alt="promo1">
                    <img class="promo2" alt="promo2">
                </div> 
            </div>
        </div>
</div> <!-- .hero -->
</main>


<section class="brands">
    <div class="container">
        <div class="brands-image"></div>
    </div>
</section>


<?php
get_footer();
