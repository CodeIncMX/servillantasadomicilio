<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package servillantasadomicilio
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-1 d-none d-md-block"></div>
				<div class="col-12 col-md-5 form">
					<h2>¿Quieres más información?</h2>
					<p>Envíanos tus dudas o comentarios</p>
					<form id="contact-form">
						<input id="name" name="name" type="text" placeholder="Nombre" required>
						<input id="mail" name="email" type="email" placeholder="Email" required>
						<textarea id="comment" name="comment" id="" cols="30" rows="2" placeholder="Escribe aquí tu mensaje, en breve nos comunicaremos contigo…" required></textarea>
						<button class="sl-btn rounded">
							<p>Enviar <i class="send-icon"></i></p>
						</button>
					</form>
				</div> <!--.col-12 .col-md-5 .form -->
				<div class="col-md-2 menu">
					<h2>Menu</h2>
					<?php wp_nav_menu( array( 
						'theme_location' => 'primary',
						'container_class'=> 'container-menu',
						'menu_class'	 => 'footer-menu',
						) ); ?>  
				</div>
				<div class="col-12 col-md-4 contact">
					<h2>Contacto</h2>
					<a href="tel:5215512741853">(55) 1274 1853 <i class="phone-icon"></i></a>
					<a href="https://wa.me/5215512741853?text=Me%20gustaría%20contarcar%20con%20servillantas%20a%20domicilio"><i class="whatsapp-icon"></i></a>
					<br/><a href="mailto:servillantasmx@gmail.com">servillantasmx@gmail.com<i class="mail-icon"></i></a>
					<div class="social">
						<a href="https://www.facebook.com/servillantashecdiz/"> <i class="facebook-icon margin-left-cero"></i></a>
						<a href="https://www.instagram.com/servillantasmx/"> <i class="instagram-icon"></i></a>
					</div>
				</div> <!-- .contact -->

				<div class="col-12 reserved-rights">
					<span>© 2018 Servillantas Hecdiz <br/>Todos los Derechos Reservados</span>
					<p>Desarrollado por <a href="https://www.facebook.com/CodeIncMX/">Code Inc México</a></p>
				</div>


			</div><!-- .row -->
		</div> <!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
