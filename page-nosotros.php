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

<div class="us">
    <div class="mision">
        <div class="mision-copy">
            <h3>
                Misión
            </h3>
            <p>
                Cubrir en forma satisfactoria las altas demandas que presente el cliente con atención y servicio
            </p>
        </div> <!-- .mision-copy -->
    </div> <!-- .mision -->

    <div class="vision">
        <div class="container">
            <div class="vision-copy">
                <i class="vision-icon"></i>
                <h3>Visión</h3>
                <p>
                Ofrecer la más alta tecnología del mercado que garantice la seguridad e inversión, respondiendo a las necesidades del cliente            </p>
            </div>
        </div> <!-- .container -->
    </div>
</div> <!-- .us -->
</main>

<?php
get_template_part('template-parts/searching', 'result');

get_footer();
