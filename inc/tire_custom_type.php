<?php
// Register Tire Stock Post Type
function create_tire_post_type() {

	$labels = array(
		'name'                  => _x( 'Llantas', 'Post Type General Name', 'servillantasadomicilio' ),
		'singular_name'         => _x( 'Llanta', 'Post Type Singular Name', 'servillantasadomicilio' ),
		'menu_name'             => __( 'Inventario', 'servillantasadomicilio' ),
		'name_admin_bar'        => __( 'Inventario', 'servillantasadomicilio' ),
		'all_items'             => __( 'Todas las llantas', 'servillantasadomicilio' ),
		'add_new_item'          => __( 'Agregar Llanta', 'servillantasadomicilio' ),
		'add_new'               => __( 'Agregar', 'servillantasadomicilio' ),
		'new_item'              => __( 'Nueva Llanta', 'servillantasadomicilio' ),
		'edit_item'             => __( 'Editar Llanta', 'servillantasadomicilio' ),
		'update_item'           => __( 'Actualizar Llanta', 'servillantasadomicilio' ),
		'view_item'             => __( 'Ver Llanta', 'servillantasadomicilio' ),
		'view_items'            => __( 'Ver Llantas', 'servillantasadomicilio' ),
		'search_items'          => __( 'Buscar Llanta', 'servillantasadomicilio' ),
		'not_found'             => __( 'No se encontaró inventario', 'servillantasadomicilio' ),
		'not_found_in_trash'    => __( 'No se encontro en el basurero', 'servillantasadomicilio' ),
		'featured_image'        => __( 'Imagen', 'servillantasadomicilio' ),
		'set_featured_image'    => __( 'Establecer imagen', 'servillantasadomicilio' ),
		'remove_featured_image' => __( 'Eliminar imagen', 'servillantasadomicilio' ),
		'use_featured_image'    => __( 'Usar como imgaen', 'servillantasadomicilio' ),
		'insert_into_item'      => __( 'Insertar en esta Llanta', 'servillantasadomicilio' ),
		'uploaded_to_this_item' => __( 'Actualizar a esta Llanta', 'servillantasadomicilio' ),
		'items_list'            => __( 'Lista de lLantas', 'servillantasadomicilio' ),
		'filter_items_list'     => __( 'Filtrar', 'servillantasadomicilio' ),
	);
	$args = array(
		'label'                 => __( 'Llanta', 'servillantasadomicilio' ),
		'description'           => __( 'Inventario de llantas', 'servillantasadomicilio' ),
		'labels'                => $labels,
		'supports'              => false,
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-clipboard',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true
	);
	register_post_type( 'inventario', $args );
}
add_action( 'init', 'create_tire_post_type', 0 );

/**
 * Tire meta boxes
 */
function servillantasadomicilio_contact_add_meta_box() {
	add_meta_box( 
        'tire_data', // $id
        'Datos de la Llanta', // $title 
        'servillantasadomicilio_tire_data_show_callback',  // $calback
        'inventario',  // $screen
        'normal',  // $context
        'high' ); // $priority
}
function servillantasadomicilio_tire_data_show_callback( $post ) {
	wp_nonce_field( 
        'servillantasadomicilio_save_tire_data', // $action
        'servillantasadomicilio_tire_data_meta_box_nonce' ); // $name
	
    $code = get_post_meta( $post->ID, '_tire_code_value_key', true );
    $brand = get_post_meta( $post->ID, '_tire_brand_value_key', true );
    $width = get_post_meta( $post->ID, '_tire_width_value_key', true );
    $index = get_post_meta( $post->ID, '_tire_index_value_key', true );
    $diameter = get_post_meta( $post->ID, '_tire_diameter_value_key', true );
    $name = get_post_meta( $post->ID, '_tire_name_value_key', true );
    $description = get_post_meta( $post->ID, '_tire_description_value_key', true );
    $price = get_post_meta( $post->ID, '_tire_price_value_key', true );
	
	echo '<p><label for="code">Código: </label><br/>';
	echo '<input type="text" id="code" name="code" value="' . esc_attr( $code ) . '" size="15" /></p>';
	echo '<p><label for="brand">Marca: </label><br/>';
	echo '<input type="text" id="brand" name="brand" value="' . esc_attr( $brand ) . '"/></p>';
	echo '<p><label for="width">Ancho: </label><br/>';
	echo '<input type="number" id="width" name="width" value="' . esc_attr( $width ) . '" size="3" /></p>';
	echo '<p><label for="index">Indice: </label><br/>';
	echo '<input type="number" id="index" name="index" value="' . esc_attr( $index ) . '" size="3" /></p>';
	echo '<p><label for="diameter">Diámetro: </label><br/>';
	echo '<input type="number" id="diameter" name="diameter" value="' . esc_attr( $diameter ) . '" size="2"/></p>';
	echo '<p><label for="name">Nombre: </label><br/>';
	echo '<input type="text" id="name" name="name" value="' . esc_attr( $name ) . '"/></p>';
	echo '<p><label for="description">Descripción: </label><br/>';
	echo '<input type="text" id="description" name="description" value="' . esc_attr( $description ) . '"/><br/>';
	echo '<p><label for="price">Precio: </label><br/>';
	echo '<input type="text" id="price" name="price" value="' . esc_attr( $price ) . '"/><br/>';
}
add_action( 'add_meta_boxes', 'servillantasadomicilio_contact_add_meta_box' );

function servillantasadomicilio_save_tire_data( $post_id) {

	if ( ! isset( $_POST["code"] ) ) return;

    update_post_meta( $post_id, "_tire_code_value_key", $_POST["code"]);
    update_post_meta( $post_id, "_tire_brand_value_key", $_POST["brand"]);
    update_post_meta( $post_id, "_tire_width_value_key", $_POST["width"]);
    update_post_meta( $post_id, "_tire_index_value_key", $_POST["index"]);
    update_post_meta( $post_id, "_tire_diameter_value_key", $_POST["diameter"]);
    update_post_meta( $post_id, "_tire_name_value_key", $_POST["name"]);
    update_post_meta( $post_id, "_tire_description_value_key", $_POST["description"]);
    update_post_meta( $post_id, "_tire_price_value_key", $_POST["price"]);
}
add_action('save_post', 'servillantasadomicilio_save_tire_data');

/**
 * Customizing table display 
 *  */
function servillantasadomicilio_set_tire_columns( $columns ){
	$columns = array(
        'code' => 'Código',
        'brand' => 'Marca',
        'name' => 'Nombre',
        'description' => 'Descripción',
        'price' => 'Precio'
    );
	return $columns;
}

function servillantasadomicilio_tire_custom_column( $column, $post_id ){
	
	switch( $column ){
		
		case 'code' :
            $email = get_post_meta( $post_id, '_tire_code_value_key', true );
            echo $email;
			break;
		case 'brand' :
            $brand = get_post_meta( $post_id, '_tire_brand_value_key', true );
            echo $brand;
			break;
		case 'name' :
            $name = get_post_meta( $post_id, '_tire_name_value_key', true );
            echo $name;
			break;
		case 'description' :
            $description = get_post_meta( $post_id, '_tire_description_value_key', true );
            echo $description;
			break;
		case 'price' :
            $price = get_post_meta( $post_id, '_tire_price_value_key', true );
            echo '$ ' . $price;
			break;
	}
	
}
add_filter("manage_inventario_posts_columns", "servillantasadomicilio_set_tire_columns");
add_action("manage_inventario_posts_custom_column",  "servillantasadomicilio_tire_custom_column", 10 , 2);

/**
 * New endpoint for searching by messure
 */
add_action('rest_api_init', 'slh_register_searching_by_messure');

function slh_register_searching_by_messure(){
	register_rest_route(
		'search/v1',
		'bymessure', 
		array(
			'methods' => WP_REST_SERVER::READABLE,
			'callback'=> 'slh_by_messure_result'
	));
}

function slh_by_messure_result($data){

	$args = array(
		"post_type" => 'inventario',
		"meta_query" => array(
			'relation' => 'AND',
			'width_clause' => array(
				'key' => '_tire_width_value_key',
				'value' => array(''),
				// 'value' => array(100,500),
				// 'type' => 'numeric',
				'compare' => 'NOT IN',
				// 'compare' => 'BETWEEN',
			),
			'index_clause' => array(
				'key' => '_tire_index_value_key',
				'value' => 0,
				'type' => 'numeric',
				'compare' => '>',
			),
			'diameter_clause' => array(
				'key' => '_tire_diameter_value_key',
				'value' => 0,
				'type' => 'numeric',
				'compare' => '>',
			),
		),
		'orderby' => array(
			'width_clause' => 'ASC',
			// 'index_clause' => 'ASC',
			// 'diameter_clause' => 'ASC',
 		),
		// "orderby" => 'meta_value_num',
		// "meta_key" => array('_tire_diameter_value_key'),
		// "order" => 'ASC',
		"posts_per_page" => -1,
	);

	$json_result = array(
		'messure' => array(
			'width' => array(),
			'index' => array(),
			'diameter' => array()
		),
		'tires' => array()
	);

	$param_num=0;
	
	if (!isset ($data['width']) ) {

		// $args["meta_query"][] = array(
		// 	"key" => "_tire_width_value_key",
		// 	'orderby' => '_tire_width_value_key',
		// );
	}else{
		array_push( $json_result["messure"]["width"], $data['width']);
		$param_num++;
		$args["meta_query"][0] = array(
			"key" => "_tire_width_value_key",
			"value" => $data['width'],
			"compare" => "="
		);
	}

	//is index paramter is set then we add to the query args
	if ( isset($data['index']) ) {
		array_push( $json_result["messure"]["index"], $data['index']);
		$param_num++;
		$args["meta_query"][1] = array(
			"key" => "_tire_index_value_key",
			"value" => $data['index'],
			"compare" => "="
		);
	}

	//is diameter paramter is set then we add to the query args
	if ( isset($data['diameter']) ) {
		array_push( $json_result["messure"]["diameter"], $data['diameter']);
		$param_num++;
		$args["meta_query"][2] = array(
			"key" => "_tire_diameter_value_key",
			"value" => $data['diameter'],
			"compare" => "="
		);
	}

	$result = new WP_Query($args);

	while ($result->have_posts()) {
		$result->the_post();
		$id = get_the_ID();


		if( !isset($data['width']) ){
			$width = get_post_meta($id, '_tire_width_value_key', true);
			if( !in_array($width,$json_result["messure"]["width"]))
			array_push(
				$json_result["messure"]["width"], 
				$width);
		}

		if ( !isset($data['index']) ){
			$index = get_post_meta($id, '_tire_index_value_key', true);

			if( !in_array($index,$json_result["messure"]["index"]))
				array_push(
					$json_result["messure"]["index"], 
					$index);
		}

		if ( !isset($data['diameter']) ) {
			$diameter = get_post_meta($id, '_tire_diameter_value_key', true);
			
			if( !in_array($diameter,$json_result["messure"]["diameter"]))
				array_push(
					$json_result["messure"]["diameter"], 
					$diameter);
		}

		if ($param_num == 3) {
			array_push($json_result['tires'], array(
				'id' => $id,
				'code' => get_post_meta($id, '_tire_code_value_key', true),
				'brand' => get_post_meta($id, '_tire_brand_value_key', true),
				'name' => get_post_meta($id, '_tire_name_value_key', true),
				'desc' => get_post_meta($id, '_tire_description_value_key', true),
				'price' => get_post_meta($id, '_tire_price_value_key', true)
			));
		}
	}			
	return $json_result;
}

/**
 * Register fields in WP Core Rest API
 */
function servillantasadomicilio_register_custom_fileds(){
	register_rest_field('inventario','_tire_code_value_key',array('get_callback' => 'show_fields'));
	register_rest_field('inventario','_tire_brand_value_key',array('get_callback' => 'show_fields'));
	register_rest_field('inventario','_tire_width_value_key',array('get_callback' => 'show_fields'));
	register_rest_field('inventario','_tire_index_value_key',array('get_callback' => 'show_fields'));
	register_rest_field('inventario','_tire_diameter_value_key',array('get_callback' => 'show_fields'));
	register_rest_field('inventario','_tire_name_value_key',array('get_callback' => 'show_fields'));
	register_rest_field('inventario','_tire_description_value_key',array('get_callback' => 'show_fields'));
	register_rest_field('inventario','_tire_price_value_key',array('get_callback' => 'show_fields'));
}
function show_fields($object, $field_name, $request) {
	return get_post_meta($object['id'], $field_name, true);
}
add_action('rest_api_init','servillantasadomicilio_register_custom_fileds');


function post_meta_request_params( $args, $request )
{
	if( isset ( $request['width'] ) ){
		$args += array(
			'meta_key'   => '_tire_width_value_key',
			'meta_value' => $request['width'],
		);
	}

	// if( isset ( $request['index'] ) ){
	// 	$args += array(
	// 		'meta_key'   => '_tire_index_value_key',
	// 		'meta_value' => $request['index'],
	// 	);
	// }

	return $args;
}
add_filter( 'rest_inventario_query', 'post_meta_request_params', 99, 2 ); // Add support for `my-custom-post`

// function post_meta_request_params( $args, $request )
// {
// 	$args += array(
// 		'meta_key'   => $request['meta_key'],
// 		'meta_value' => $request['meta_value'],
// 		'meta_query' => $request['meta_query'],
// 	);
// 	return $args;
// }
// // add_filter( 'rest_post_query', 'post_meta_request_params', 99, 2 );
// // add_filter( 'rest_page_query', 'post_meta_request_params', 99, 2 ); // Add support for `page`
// add_filter( 'rest_inventario_query', 'post_meta_request_params', 99, 2 ); // Add support for `my-custom-post`
// add_filter( 'rest_query_vars', function ( $valid_vars ) {
//     return array_merge( $valid_vars, array( 'width', 'meta_query' ) );
// } );

// add_filter( 'rest_post_query', function( $args, $request ) {
//     $width   = $request->get_param( 'width' );

//     if ( ! empty( $$width ) ) {
//         $args['meta_query'] = array(
//             array(
//                 'key'     => '_tire_width_value_key',
//                 'value'   => $width,
//                 'compare' => '=',
//             )
//         );      
// 	}
//     return $args;
// }, 10, 2 );



/**
 * Adds "Import" button on module list page
 */
add_action( "admin_notices", function() {

	global $current_screen;

    // Not our post type, exit earlier
    // You can remove this if condition if you don't have any specific post type to restrict to. 
    if ('inventario' != $current_screen->post_type) {
        return;
	}
	
    echo "<div class='updated'>";
    echo "<p><form action='{$_SERVER["REQUEST_URI"]}&stock_csv_file' method='post' enctype='multipart/form-data'>";
    echo "<br/><label for='file' >Puedes actualizar el inventario con un archivo extensión CSV ¡Ahora mismo!</label>";
    echo "<br/><br/><input type='file' name='csv_file' id='csv_file'/>";
    echo "<br/><br/><button type='submit' class='button button-primary'>Cargar Inventario</button>";
    // echo "<input type='file' name='file' class='button button-primary' style='margin:0.25em 1em' href='{$_SERVER["REQUEST_URI"]}&insert_sitepoint_posts'>Importar archivo CSV</a>";
    echo "</form></p>";
    echo "</div>";
});


/**
 * Create and insert posts from CSV files
 */
add_action( "admin_init", function() {
	global $wpdb;
	// I'd recommend replacing this with your own code to make sure
	//  the post creation _only_ happens when you want it to.
	if ( ! isset( $_GET["stock_csv_file"] ) ) return;
	
	if ( ! function_exists( 'wp_handle_upload' ) ) 
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
	
	$uploadedfile = $_FILES['csv_file'];

	$upload_overrides = array( 'test_form' => false );
	
	$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
	
	if ( $movefile && ! isset( $movefile['error'] ) ) {
		$data = readCSVFile($movefile["file"]);
		deleteAllStock();
		insertAsNewStock($data);
		//insertUpdateStock($data);
	} else {
		/**
		 * Error generated by _wp_handle_upload()
		 * @see _wp_handle_upload() in wp-admin/includes/file.php
		 */
		echo $movefile['error'];
	}
});

function deleteAllStock() {

	$args = array (
		'post_type' => 'inventario',
		'posts_per_page' => -1
	);

	$result = new WP_Query($args);

	while( $result->have_posts() ){
		$result->the_post();
		wp_delete_post( get_the_ID(), true );
	}
} 

function insertAsNewStock($data){
	foreach( $data as $post ){
		$new_post_id = wp_insert_post(array(
			"post_type" => 'inventario',
			"post_status" => "publish"
		));
		if ($new_post_id) 
			updateStockPost($new_post_id, $post);		
	}
}

function insertUpdateStock($data ){
	$args = array(
		"post_type" => 'inventario',
		"post_per_page" => -1
	);

	foreach( $data as $post ){

		$args["meta_query"][0] = array(
			"key" => "_tire_code_value_key",
			"value" => $post["CODE"],
			"compare" => "="
		);
				
		$result = new WP_Query($args);
		
		if($result->have_posts()){
			while ($result->have_posts()) {
				$result->the_post();
				updateStockPost(get_the_ID(), $post);
			}
		}else{
			$new_post_id = wp_insert_post(array(
				"post_type" => 'inventario',
				"post_status" => "publish"
			));
			if ($new_post_id) 
				updateStockPost($new_post_id, $post);		
		}
	}
}

function updateStockPost($post_id, $post){
	update_post_meta($post_id, "_tire_code_value_key", $post["CODE"]);
	update_post_meta($post_id, "_tire_brand_value_key", $post["BRAND"]);
	update_post_meta($post_id, "_tire_width_value_key", $post["WIDTH"]);
	update_post_meta($post_id, "_tire_index_value_key", $post["INDEX"]);
	update_post_meta($post_id, "_tire_diameter_value_key", $post["DIAMETER"]);
	update_post_meta($post_id, "_tire_name_value_key", $post["NAME"]);
	update_post_meta($post_id, "_tire_description_value_key", $post["DESC"]);
	update_post_meta($post_id, "_tire_price_value_key", $post["PRICE"]);
}

function readCSVFile($file){
	if ( ! is_readable( $file ) ) {
		chmod( $file, 0744 );
	}
	// Check if file is writable, then open it in 'read only' mode
	if ( is_readable( $file ) && $_file = fopen( $file, "r" ) ) {
		// go row by row, column by column, saving all the data
		$valid_headers = array("CODE","BRAND","WIDTH", "INDEX","DIAMETER","NAME","DESC", "PRICE"); 
		$post = array();
		// Get first row in CSV, which is of course the headers
		$header = fgetcsv( $_file ); //first row
		$cont = 0;
		$newLine = 0;
		while ( $row = fgetcsv( $_file ) ) { //next rows
			$cont++;
			if ( $row[4] != "" ) { //Check if column CODE (4th) is not empty
				foreach ( $header as $i => $key ) {
					if ( in_array($key,$valid_headers) ) { //Just save values from CODE (4th) colum
						$value = trim($row[$i]);

						if($key == "PRICE") {
							$pos = strripos($value,",");
							if( $pos == (strlen($value) - 3) ) {
								$value = str_replace(".",",",$value);
								$value = substr_replace($value,".",$pos,-2);
							}
						}

						if($value === '#VALUE!') $value="";
						$post[$newLine][$key] = $value;
					}
				}
				$newLine++;
			}
		}
		return $post;
		fclose( $_file );
	} else {
		$errors[] = "El archivo '$file' Por favor pida a su adminstrador que revise los permisos de acceso a este archivo :D \n";
		return;
	}
}