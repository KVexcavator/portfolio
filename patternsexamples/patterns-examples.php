<?php 
/*
Plugin Name: Patterns Examples
Description: Create vidjet  the exemples patterns code.
Version: 1.0
Author: Kalandarishvili Vaycheslav
Author Email:str_token@mail.ru
License: GPLv2
*/
/* 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
2018
*/

// Вызываем функцию, когда активируется плагин
register_activation_hook(__FILE__, 'patterns_examples_install' );
function patterns_examples_install() {
// устанавливаем параметры no умолчанию
$patt_options_arr=array( 
                     			'code_example'=>''
);
// сохраняем параметры по умолчанию
update_option( 'patterns_options', $patt_options_arr );
}

// Зацепка-действие для инициализации плагина
add_action( 'init', 'patterns_examples_init' );
// функция инициализация плагина Patterns Examples
function patterns_examples_init() {
// пользовательские типы записей
	$labels = array(
								'name' 								=> __( 'Patterns', 'patterns-plugin' ),
								'singular_name' 			=> __( 'Pattern', 'patterns-plugin' ),
								'add_new' 						=> __( 'Add New', 'patterns-plugin' ),
								'add_new_item' 				=> __( 'Add New Pattern', 'patterns-plugin' ),
								'edit_item' 					=> __( 'Edit Pattern', 'patterns-plugin' ),
								'new_item' 						=> __( 'New Pattern', 'patterns-plugin' ),
								'all_items' 					=> __( 'All Patterns', 'patterns-plugin' ),
								'view_item' 					=> __( 'View Pattern', 'patterns-plugin' ),
								'search_items' 				=> __( 'Search Patterns', 'patterns-plugin' ),
								'not_found' 					=> __( 'No patterns example found', 'patterns-plugin' ),
								'not_found_in_trash' 	=> __( 'No patterns example found in Trash',
'patterns-plugin' ),
								'menu_name' 					=> __( 'Patterns', 'patterns-plugin' )
	);
	$args = array(
								'labels' 							=> $labels,
								'public' 							=> true,
								'publicly_queryable' 	=> true,
								'show_ui' 						=> true,
								'show_in_menu' 				=> true,
								'query_var'						=> true,
								'rewrite' 						=> true,
								'capability_type' 		=> 'post',
								'has_archive' 				=> true,
								'hierarchical' 				=> false,
								'menu_position' 			=> null,
								'supports' 						=> array( 'title',
																							 	'editor',
																							 	'thumbnail',
																							 	'excerpt' )
);
register_post_type( 'patterns-examples', $args );
}

// зацепка-действие, чтобы добавить пункт меню ППатерны
add_action( 'admin_menu', 'patterns_examples_menu' );
// создаем подпункт меню 

function patterns_examples_menu() {
add_options_page( __( 'Patterns Examples Page','patterns-plugin' ),
                  __( 'Patterns Examples Settings','patterns-plugin' ),
                      'manage_options',
                      'patterns-examples-settings',
											'patterns_examples_settings_page' );
}

// создаем страницу настроек плагина
function patterns_examples_settings_page() {
// извлекаем массив настроек плагина
$patt_options_arr = get_option( 'patterns_options' );
// устанавливаем значения переменных из массива
$pe_code = $patt_options_arr['code_example'];
?>

<div class="admin-menu">
	<form method="post" action="options.php">
	<?php settings_fields( 'patterns-settings-group' ); ?>
	<fieldset>
		<legend><h3><?php _e( 'Patterns Examples Options', 'patterns-plugin' ) ?></h3></legend>
		<div>
			<label for="patterns_options[code_example]">
				<?php _e( 'Exemple`s code lenguage', 'patterns-plugin' ) ?>
			</label>
			<select name="patterns_options[code_example]">
					<option value="php" selected($pe_code,'php', false )>php</option>
					<option value="javascript" selected($pe_code,'javascript', false )>javascript</option>
					<option value="python" selected($pe_code,'python', false )>python</option>
					<option value="uml"  selected($pe_code,'code', false )>uml</option>
			</select>
		</div>
		<div>
				<input type="submit" class="button-primary"  value="<?php _e('Save Changes', 'patterns-plugin' ); ?>">
		</div>
	</fieldset>
</form>
</div>
<?php
}

// зацепка-действие, чтобы зарегистрировать настройки плагина
add_action( 'admin_init', 'patterns_examples_register_settings' );
function patterns_examples_register_settings() {
	// регистрируем настройки
	register_setting( 'patterns-settings-group', 'patterns_options', 'patterns_sanitize_options' );
}
function patterns_sanitize_options( $options ) {
	$options['code_example'] = (!empty($options['code_example'] ) ) ?
	sanitize_text_field($options['code_example'] ) : '';
	return $options;
}

// зацепка-действие, чтобы зарегистрировать метаполе товара
add_action( 'add_meta_boxes', 'patterns_examples_register_meta_box' );
function patterns_examples_register_meta_box() {
	// создаем произвольное метаполе
	add_meta_box( 'patterns-examples-meta',
								__('Pattern Information','patterns-plugin'),
								'patterns_examples_box',
								'patterns-examples',
								'normal',
								'default' );
}


// создаем метаполе для примеров
function patterns_examples_box($post) {
// извлекаем значения произвольного метаполя
$pe_type=get_post_meta($post->ID,'_pattern_type', true );
$pe_name=get_post_meta($post->ID,'_pattern_name', true );
$pe_author_exl=get_post_meta($post->ID,'_pattern_author_exl', true );
$pe_url=get_post_meta($post->ID,'_pattern_url', true );
$pe_category=get_post_meta($post->ID,'_pattern_category', true );
// проверяем временное значение из соображений безопасности
wp_nonce_field( 'meta-box-save', 'patterns-plugin' );
// отображаем форму метаполя
echo '<form>';
	echo '<fieldset>';	
		echo '<legend></legend>';
		echo '<div>
						<label for="pattern_type">'.__('Type', 'patterns-plugin').'</label>
						<input type="text" name="pattern_type"	value="' .esc_attr($pe_type ).'">
					</div>';
		echo '<div>
						<label for="pattern_name">'.__('Name', 'patterns-plugin').'</label>
						<input type="text" name="pattern_name"	value="' .esc_attr($pe_name ).'">
					</div>';
		echo '<div>
						<label for="pattern_author_exl">'.__('Author example', 'patterns-plugin').'</label>
						<input type="text" name="pattern_author_exl"	value="' .esc_attr($pe_author_exl ).'">
					</div>';
		echo '<div>
						<label for="pattern_url">'.__('URL', 'patterns-plugin').'</label>
						<input type="text" name="pattern_url"	value="' .esc_attr($pe_url ).'">
					</div>';
		echo '<div>
						<label for="pattern_category">Category:</label>
						<select name="pattern_category"	id="pattern_category">
								<option value="Creational"'
								.selected($pe_category,'Creational', false ).'>'
								.__( 'Creational','patterns-plugin').'</option>
								<option value="Structurural"'
								.selected($pe_category,'Structurural', false ).'>'
								.__( 'Structurural','patterns-plugin').'</option>
								<option value="Behavioral"'
								.selected($pe_category,'Behavioral', false ).'>'
								.__( 'Behavioral','patterns-plugin').'</option>
						</select>
					</div>';									
	echo '</fieldset>';
echo '</form>';
// отображаем легенду раздела с сокращенным кодом
echo "<hr>";
echo '</div';
	echo "<h3>".__( 'Shortcode Legend', 'patterns-plugin')."</h3><br>";
	echo __( 'Type', 'patterns-plugin').":[pattern list=type]<br>";
	echo __( 'Name', 'patterns-plugin').':[pattern list=name]<br>' ;
	echo __( 'Author example', 'patterns-plugin').':[pattern list=author]<br>';
	echo __( 'URL', 'patterns-plugin').':[pattern list=url]<br>' ;
	echo __( 'Category', 'patterns-plugin').':[pattern list=category]';
echo '</div';
}

// зацепка-действие для сохранения данных метаполя, когда сохраняется запись
add_action('save_post','patterns_examples_save_meta_box' );
// сохраняем данные метаполя
function patterns_examples_save_meta_box($post_id) {
// проверяем, относится ли запись к типу Patterns Examples
// и были ли отправлены метаданные
	if ( get_post_type( $post_id ) == 'patterns-examples' &&  isset( $_POST['pattern_type'] ) ) {
		// если установлено автосохранение, пропускаем сохранение данных
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;
		// проверка из соображений безопасности
		check_admin_referer( 'meta-box-save', 'patterns-plugin' );
		// сохраняем данные метаполя в произвольных полях записи
		update_post_meta( $post_id, '_pattern_type',	sanitize_text_field( $_POST['pattern_type'] ) );
		update_post_meta( $post_id, '_pattern_name', sanitize_text_field( $_POST['pattern_name'] ) );
		update_post_meta( $post_id, '_pattern_author_exl', sanitize_text_field( $_POST['pattern_author_exl'] ) );
		update_post_meta( $post_id, '_pattern_url',	sanitize_text_field( $_POST['pattern_url'] ) );
		update_post_meta( $post_id, '_pattern_category', sanitize_text_field( $_POST['pattern_category'] ) );
	}
}

// зацепка-действие, чтобы создать сокращенный код для примеров
add_shortcode( 'pattern', 'patterns_examples_shortcode');
// создаем сокращенный код
function patterns_examples_shortcode( $atts, $content = null ) {
	global $post;
	extract( shortcode_atts( array(
																"list" => ''),
																 $atts )
	 );
	// извлекаем настройки
	$patt_options_arr = get_option( 'patterns_options' );

	if ( $list == 'type') {
		$pattern_list = get_post_meta( $post->ID, '_pattern_type', true );
	}elseif ( $list == 'name' ) {
		$pattern_list =get_post_meta( $post->ID,'_pattern_name', true );
	}elseif ( $list == 'author' ) {
		$pattern_list = get_post_meta( $post->ID,'_pattern_author_exl', true );
	}elseif ( $list == 'url' ) {
		$pattern_list = get_post_meta( $post->ID,'_pattern_url', true );
	}elseif ( $list == 'category' ) {
		$pattern_list = get_post_meta( $post->ID,'_pattern_category', true );
}
// возвращаем значение сокращенного кода для отображения
return $pattern_list;
}

// зацепка-действие, чтобы создать виджет
add_action( 'widgets_init', 'patterns_examples_register_widgets' );
// регистрируем виджет
function patterns_examples_register_widgets() {
register_widget( 'pe_widget' );
}


//pe_widget class
class pe_widget extends WP_Widget {
// создаем виджет
	function __construct() {
		parent::__construct('pe_widget',
											 __( 'Patterns Widget','patterns-plugin'),
											 array(
												'classname' => 'pe-widget-class',
												'description' => __( 'Display Patterns Examples','patterns-plugin' ))
												);
	}

	function css(){
		?>
		<style type="text/css">	
				
		</style>
		<?php
	}

	// создаем форму настроек виджета
	function form( $instance ) {
		$defaults = array(
								'title' => __( 'Patterns', 'patterns-plugin' ),
								'number_example' => '3' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title = $instance['title'];
		$number_example = $instance['number_example'];
?>
				<p><?php _e('Title', 'patterns-plugin') ?>:
						<input class="widefat"
								name="<?php echo $this->get_field_name( 'title' ); ?>"
								type="text"
								value="<?php echo esc_attr($title); ?>" />
				</p>
				<p><?php _e( 'Number of Patterns Examples', 'patterns-plugin' ) ?>:
						<input name="<?php echo $this->get_field_name('number_example'); ?>"
								type="text"
								value="<?php echo esc_attr($number_example); ?>"
								size="4" 
								maxlength="4" />
				</p>
<?php
	}

	// сохраняем настройки виджета
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number_example'] = abs((int)$new_instance['number_example'] );
		return $instance;
	}


	// отображаем виджет
	function widget( $args, $instance ) {
		global $post;
		extract( $args );
		echo $before_widget;
		$title = apply_filters( 'widget_title', $instance['title'] );
		$number_example = $instance['number_example'];
				if (!empty( $title ) ) { 
					echo $before_title . esc_html($title ).$after_title; 
				};
		// произвольный запрос, чтобы извлечь примеры
		$args = array(
									'post_type' => 'patterns-examples',
									'posts_per_page' => abs((int)$number_example )
		);
		$disPatterns = new WP_Query();
		$disPatterns->query($args);
		while ($disPatterns->have_posts()) : $disPatterns->the_post();
				// извлекаем массив настроек
				$patt_options_arr = get_option( 'patterns_options' );
				// извлекаем значения произвольных полей
				$pe_type=get_post_meta($post->ID,'_pattern_type', true );
				$pe_name = get_post_meta($post->ID,'_pattern_name', true );
				$pe_category = get_post_meta($post->ID,'_pattern_category', true );
				?>
			<div style="
				margin: 2%;
				padding: 10% 25%;
				font-size: 1em;
				font-family: Tahoma,Geneva,sans-serif;
				box-shadow: 0 5px 10px black;
				border-radius: 10px;
				background: rgb(0,102,153);
				color: white;
				">
					<p style="
					font-size: 1.3em;
					font-weight: bold;
					color: rgba(255,255,255,.5);
					">
						<a href="<?php the_permalink(); ?>"
						rel="bookmark"
						title="<?php the_title_attribute(); ?> Patterns"
						style="
						color: white;
						">
						<?php the_title(); ?>
						</a>
					</p>
					<?php
					echo "<p>".__( 'Type', 'patterns-plugin' )." : ".$pe_type ."</p>";
					echo "<p>".__( 'Name', 'patterns-plugin' )." : ".$pe_name ."</p>";
					echo  "<p>".__( 'Category', 'patterns-plugin' ).": ".$pe_category."</р>";
					echo "<p> Code : ".$patt_options_arr['code_example']."</p>";
				echo '</div>';
			endwhile;
	wp_reset_postdata();
	echo $after_widget;
	}
}






 ?>