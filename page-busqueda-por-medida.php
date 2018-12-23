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

<div class="searching-form">
    <div class="title">
        <h2>Búqueda por Medida <i class="compass-icon"></i></h2> 
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-6 text-center">
                <img class="messure-sample" alt="ejemplo de medidas">
                <form id="searching-by-messure-form" class="action-form">
                    
                    <div class="select-container">
                        <i class="spinner-icon"></i>
                        <select id="width-list" placeholder="Ancho">
                            <option value="" disabled selected hidden> Ancho</option>
                        </select>
                    </div>
                    
                    <div class="select-container">
                        <i class="spinner-icon"></i>
                        <select id="index-list" placeholder="Indice">
                            <option value="" disabled selected hidden>Indice</option>
                        </select>
                    </div>
                    
                    <div class="select-container">
                        <i class="spinner-icon"></i>
                    <select id="diameter-list" placeholder="Diámetro">
                        <option value="" disabled selected hidden>Diámetro</option>
                        </select>
                    </div>

                    <button id="searching-button" class="sl-btn rounded off" disabled>
                        <p>Buscar <i class="serching-icon"></i></p>
                    </button>
                </form>
            </div> <!-- .col-12 .col-md-6-->
            <div class="col-md-3"></div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .searching-for -->
</main>

<?php
get_template_part('template-parts/searching', 'result');

get_footer();
