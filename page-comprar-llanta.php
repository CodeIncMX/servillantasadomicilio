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

//Get post data
$post = get_post($_GET['id']);
$code = get_post_meta( $post->ID, '_tire_code_value_key', true );
$brand = get_post_meta( $post->ID, '_tire_brand_value_key', true ); 
$name = get_post_meta( $post->ID, '_tire_name_value_key', true );
$desc = get_post_meta( $post->ID, '_tire_description_value_key', true );

//Used it in devpeloment stage
$urlHome = "/servillantasadomicilio";
//Used it in production hosting 
// $urlHome = "";


?>
<main>
    <div class="buying-steps">
        <div class="title">
            <h2>Solicitar envío</h2> 
        </div>
        <div class="container">
            <div class="row step item-result">
                <div class="col-12 instruction">
                    <div class="number">1</div> <h3>Verifica tu producto</h3>
                </div>
                <div class="col-md-1 d-none d-md-block"></div>
                <div class="col-6 col-md-3 item-img">
                  <img class="tire-img" src="<?php echo $urlHome ?>/wp-content/uploads/tire-stock/<?php echo  get_post_meta( $post->ID, '_tire_code_value_key', true ); ?>_177.jpg" >
                </div>
                <div class="col-6 col-md-4 item-data">
                    <h2 class="tire-brand"><?php echo $brand ?></h2>
                    <p class="tire-name"><?php echo $name ?></p>
                    <p class="tire-messure"><?php echo $desc ?></p>
                </div>
                <div class="col-12 col-md-3 item-data price">
                    <div class="row">
                        <div class="col-3 col-md-6">
                            <label for="amount">Cantidad:</label>
                        </div>
                        <div class="col-3 col-md-6">
                            <div class="select-container">
                                <span id="price" class="hidden"><?php echo  get_post_meta( $post->ID, '_tire_price_value_key', true ); ?></span>
                                <select name="amount" id="amount">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div> <!-- .select-container -->                    
                        </div> <!-- .col-3 col-md-6 -->
                        <div class="col-6 col-md-12 item-data price">
                            <p id="tire-price" class="tire-price"></p>
                        </div> <!-- .col-6 item-data price -->
                    </div> <!-- .row -->
                </div> <!-- .col-6 col-md-3 item-data price" -->
                <div class="col-md-1 d-none d-md-block"></div>
          </div> <!-- .row step item-result-->

        <div class="row step">
            <div class="col-12 instruction">
                <div class="number">2</div> <h3>Elige tu forma de pago</h3>
            </div>
            <div class="col-12 pay-ways">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="cash-tab" data-toggle="tab" href="#cash" role="tab" aria-controls="cash" aria-selected="true">Efectivo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="transfer-tab" data-toggle="tab" href="#transfer" role="tab" aria-controls="transfer" aria-selected="false">Transferencia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="card-tab" data-toggle="tab" href="#card" role="tab" aria-controls="card" aria-selected="false">Tarjeta</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="cash" role="tabpanel" aria-labelledby="cash-tab">
                        <div class="cash content">
                            <img class="cash-img" alt="efectivo">
                            Paga tu pedido cuando lo recibas
                        </div>
                    </div> <!-- #cash -->

                    <div class="tab-pane fade" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">
                        <div class="transfer row content">
                            <div class="col-1"></div>
                            <div class="col-12">
                                Puedes realizar transferencia electrónica a la siguiente cuenta:
                            </div>
                            <div class="col-1 d-md-none"></div>
                            <div class="col-10 col-md-7 center">
                                <img class="scotiabank-logo"  alt="scotiabank">
                            </div>
                            <div class="col-1 d-md-none"></div>
                            <div class="col-1 d-md-none"></div>
                            <div class="col-10 col-md-5 center acount-data">
                                <p>
                                    <strong>
                                        Serví Llantas Hecdiz sa de cv<br/>044180001019054582<br/>SLH160425AQ5
                                    </strong>
                                </p>
                            </div>
                            <div class="col-1 d-md-none"></div>
                            <div class="col-12">
                                Y envíanos el comprobante a <strong>ventas@servillantasadomicilio.com</strong>
                            </div>
                            <div class="col-1"></div>
                        </div> <!-- .transfer row -->
                    </div> <!-- #transfer -->

                    <div class="tab-pane fade" id="card" role="tabpanel" aria-labelledby="card-tab">
                        <div class="cards row content">
                            <div class="col-1"></div>
                            <div class="col-10">
                                Llevamos la terminal para que puedas pagar en cuanto recibas tus llantas, aceptamos VISA y MasterCard
                            </div>
                            <div class="col-1"></div>
                            <div class="col-1"></div>
                            <div class="col-10 center">
                                <img class="cards-img" alt="tarjetas">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-1"></div>
                            <div class="col-10">
                                *Excepto AMEX 
                            </div>
                            <div class="col-1"></div>                       
                        </div> <!-- .transfer row content -->
                    </div> <!-- #card -->
                    <div class="shipping-cost">
                        (costo de envío desde <strong>$ 80</strong>)
                    </div>
                </div> <!-- .tab-conten -->
            </div> <!-- .col-12 pay-ways -->
        </div> <!-- .row step -->


        <div class="row step">
            <div class="col-12 instruction">
                <div class="number">3</div> <h3>Comprueba existencia</h3>
            </div>  
            <div class="col-12 asking">
                <p>
                    Por favor confírmanos tu pedido, puedes realizarlo, vía telefónica, por WhatsApp o messenger de Facebook
                </p>
                <div class="center">
                    <a href="tel:5215512741853" class="sl-btn rounded" ><i class="phone-icon"></i></a>
                    <a href="https://wa.me/5215512741853?text=Hola%20quiero%20COMPROBAR%20EXISTENCIA%20de%20la%20llanta%20<?php echo $brand ?>%20<?php echo $name ?>%20<?php echo $desc ?>" class="sl-btn rounded" ><i class="whatsapp-icon"></i></a>
                    <a href="http://m.me/servillantashecdiz" class="sl-btn rounded" ><i class="messenger-icon"></i></a>
                </div>

        </div> <!-- .row step -->

        </div> <!-- .container -->
    </div> <!-- . buying-tire -->

</main>

<?php
get_template_part('template-parts/searching', 'result');

get_footer();
