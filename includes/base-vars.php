<?php
$pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-parameters.php'
    ));

$settings_var_id=$pages[0]->ID;
$pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-seo.php'
    ));

$seo_var_id=$pages[0]->ID;
$template_url = get_bloginfo('template_url'); 
$cur_lang=qtranxf_getLanguage(); 
$home_page_id = get_option('page_on_front'); 
$cust_options=get_settings('true_options'); 
$ajax_url=admin_url('admin-ajax.php');
$home_url=qtranxf_convertURL(get_home_url(), $cur_lang);
$template_path = TEMPLATEPATH . '/template/';
