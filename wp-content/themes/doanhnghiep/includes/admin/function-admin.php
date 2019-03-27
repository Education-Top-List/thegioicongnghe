<?php
/* 
@package zangTheme
	=================
		ADMIN PAGE
	=================
*/
function zang_add_admin_page(){
	// Generate zang admin page
	add_menu_page('zang Theme Option','Tenten Framework' , 'manage_options' , 'template_admin_zang', 'zang_theme_create_page', 	get_template_directory_uri() . '/images/tenten.png', 110);
	// Generate Sunset Admin Sub pages
	add_submenu_page('template_admin_zang', 'Custom Text Header','Custom Text Header', 'manage_options' , 'template_admin_zang', 'zang_theme_create_page');
	// Activate custom setttings
	add_action('admin_init', 'zang_custom_settings');
}
add_action('admin_menu', 'zang_add_admin_page');
function zang_custom_settings(){
	// Sidebar Options
	register_setting('zang-settings-groups', 'phone');
	register_setting('zang-settings-groups', 'address_header');
	register_setting('zang-settings-groups', 'footer_fb');
	

	add_settings_section('zang-header-options','Chỉnh sửa Header','zang_header_options','template_admin_zang');
	add_settings_field('address-hd','Số điện thoại', 'zang_phone_header','template_admin_zang', 'zang-header-options');
	add_settings_field('phone-hd','Địa chỉ', 'zang_address_header','template_admin_zang', 'zang-header-options');

	add_settings_section('zang-footer-options','Chỉnh sửa Footer','zang_footer_options','template_admin_zang');
	add_settings_field('Facebook','Facebook Link', 'zang_footer_fb','template_admin_zang', 'zang-footer-options');
	add_settings_field('Twitter','Twitter Link', 'zang_footer_fb','template_admin_zang', 'zang-footer-options');
}
	
function zang_header_options(){
	echo '';
}
function zang_footer_options(){
	echo '';
}

function zang_phone_header(){
	$phone = esc_attr(get_option('phone'));
	echo '<input type="text" class="iptext_adm" name="phone" value="'.$phone.'" >';
}
function zang_address_header(){
	$address_header = esc_attr(get_option('address_header'));
	echo '<input type="text" class="iptext_adm" name="address_header" value="'.$address_header.'" placeholder="" ';
}
function zang_footer_fb(){
	$footer_fb = esc_attr(get_option('footer_fb'));
	echo '<input type="text" class="iptext_adm" name="footer_fb" value="'.$footer_fb.'" placeholder="" ';
}

function myshortcode(){
	ob_start();
	if(get_option('footer_fb')){
		?>
	<ul>
		<li><a href="<?php echo get_option('footer_fb'); ?>">aaa</a></li>
	</ul>	
		<?php
	}
	return ob_get_clean();
}
add_shortcode('insertring','myshortcode');

function zang_theme_create_page(){
	require_once(get_template_directory().'/includes/admin/zang-admin.php');
}

