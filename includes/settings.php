<?php
$true_page = 'myparameters.php'; // это часть URL страницы, рекомендую использовать строковое значение, т.к. в данном случае не будет зависимости от того, в какой файл вы всё это вставите
 
/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function true_options() {
	global $true_page;
	add_options_page( 'Параметры', 'Параметры', 'manage_options', $true_page, 'true_option_page');  
}
add_action('admin_menu', 'true_options');
 
/**
 * Возвратная функция (Callback)
 */ 
function true_option_page(){
	global $true_page;
	?><div class="wrap">
		<h2>Дополнительные параметры сайта</h2>
		<form method="post" enctype="multipart/form-data" action="options.php">
			<?php 
			settings_fields('true_options'); // меняем под себя только здесь (название настроек)
			do_settings_sections($true_page);
			?>
			<p class="submit">  
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
			</p>
		</form>
	</div><?php
}
 
/*
 * Регистрируем настройки
 * Мои настройки будут храниться в базе под названием true_options (это также видно в предыдущей функции)
 */
function true_option_settings() {
	global $true_page;
	// Присваиваем функцию валидации ( true_validate_settings() ). Вы найдете её ниже
	register_setting( 'true_options', 'true_options', 'true_validate_settings' ); // true_options
 
	// Добавляем секцию
	add_settings_section( 'true_section_1', 'Параметры', '', $true_page );
 
        // Создадим текстовое поле в первой секции
	$true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'my_policy',
		'desc'      => 'Ссылка на Политика конфидециальности', // описание
		'label_for' => 'my_policy' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'my_policy', 'Ссылка на Политика конфидециальности', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );
        
        $true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'my_impressum',
		'desc'      => 'impressum', // описание
		'label_for' => 'impressum' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'my_impressum', 'impressum', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );
        
	// Создадим текстовое поле в первой секции
	$true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'my_phone',
		'desc'      => 'Телефон', // описание
		'label_for' => 'my_phone' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'phone', 'Телефон', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params ); 
        // Создадим текстовое поле в первой секции
	$true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'my_phone_num',
		'desc'      => 'Телефон цыфры', // описание
		'label_for' => 'my_phone_num' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'phone_num', 'Телефон цыфры', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params ); 
        // Создадим текстовое поле в первой секции
	$true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'my_instagram',
		'desc'      => 'instagram', // описание
		'label_for' => 'my_instagram' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'instagram', 'instagram', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params ); 
        
        $true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'my_facebook',
		'desc'      => 'facebook', // описание
		'label_for' => 'my_facebook' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'facebook', 'facebook', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );
        
        $true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'my_twitter',
		'desc'      => 'twitter', // описание
		'label_for' => 'my_twitter' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'twitter', 'twitter', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );
        
        $true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'my_google',
		'desc'      => 'google', // описание
		'label_for' => 'my_google' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'google', 'google', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );
        
        
 
}
add_action( 'admin_init', 'true_option_settings' );
 
/*
 * Функция отображения полей ввода
 * Здесь задаётся HTML и PHP, выводящий поля
 */
function true_option_display_settings($args) {
	extract( $args );
 
	$option_name = 'true_options';
 
	$o = get_option( $option_name );
 
	switch ( $type ) {  
		case 'text':  
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
		case 'textarea':  
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<textarea class='code large-text' cols='50' rows='10' type='text' id='$id' name='" . $option_name . "[$id]'>$o[$id]</textarea>";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
		case 'checkbox':
			$checked = ($o[$id] == 'on') ? " checked='checked'" :  '';  
			echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";  
			echo ($desc != '') ? $desc : "";
			echo "</label>";  
		break;
		case 'select':
			echo "<select id='$id' name='" . $option_name . "[$id]'>";
			foreach($vals as $v=>$l){
				$selected = ($o[$id] == $v) ? "selected='selected'" : '';  
				echo "<option value='$v' $selected>$l</option>";
			}
			echo ($desc != '') ? $desc : "";
			echo "</select>";  
		break;
		case 'radio':
			echo "<fieldset>";
			foreach($vals as $v=>$l){
				$checked = ($o[$id] == $v) ? "checked='checked'" : '';  
				echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
			}
			echo "</fieldset>";  
		break; 
	}
}
 
/*
 * Функция проверки правильности вводимых полей
 */
function true_validate_settings($input) {
	foreach($input as $k => $v) {
		$valid_input[$k] = trim($v);
 
		/* Вы можете включить в эту функцию различные проверки значений, например
		if(! задаем условие ) { // если не выполняется
			$valid_input[$k] = ''; // тогда присваиваем значению пустую строку
		}
		*/
	}
	return $valid_input;
}