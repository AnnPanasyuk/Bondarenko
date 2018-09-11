<?php
register_nav_menus();
$includes_path = TEMPLATEPATH . '/includes/';

require_once $includes_path . 'work-ajax.php';
//require_once $includes_path . 'settings.php';

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    //set_post_thumbnail_size( 415, 250, true );
}

function remove_menus(){

    remove_menu_page( 'edit-comments.php' );          //Comments
    //remove_menu_page( 'edit.php' );                   //Posts
    //remove_menu_page( 'pages.php' );                   //Posts

}
function my_theme_add_editor_styles() {
	add_editor_style( 'editor-styles.css' );
}
add_action( 'current_screen', 'my_theme_add_editor_styles' );

add_action( 'admin_menu', 'remove_menus' );

add_action( 'init', 'create_post_type' );

function create_post_type() {

//    register_post_type( 'leistungen',
//        array(
//            'menu_icon'=>'dashicons-hammer',
//            'labels' => array(
//                'name' =>  'Услуги',
//                'menu_name' => 'Услуги',
//                'singular_name' => 'Услуги',
//                'add_new' => 'Добавить Услугу',
//                'add_new_item' => 'Добавить новую Услугу',
//                'edit_item' => 'Редактировать Услугу',
//                'new_item' => 'Новый Услуга',
//                'view_item' => 'Посмотреть Услугу',
//                'search_items' => 'Искать Услугу',
//                'not_found' =>  'Услуг не найдено',
//                'not_found_in_trash' => '',
//                'parent_item_colon' => '',
//            ),
//            'supports'=> array('title','thumbnail','editor'),
//            'public' => true,
//            'has_archive' => true,
//            'rewrite' => array('slug' => 'leistungen','pages'=>true),
//            
//        )
//    );
} 
// свой класс построения меню:
class magomra_walker_nav_menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
	function start_lvl( &$output, $depth ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'sub-menu',
			( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
			( $display_depth >=2 ? 'sub-sub-menu' : '' ),
			'menu-depth-' . $display_depth
			);
		$class_names = implode( ' ', $classes );

		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	// add main/sub classes to li's and links
	 function start_el( &$output, $item, $depth, $args ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
			( $depth >=2 ? 'sub-sub-menu-item' : '' ),
			( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
			'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// build html
		$output .= $indent . '<li>';

		// link attributes
//		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
//		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
//		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
//		$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

		$item_output = sprintf( '%1$s<a%2$s><span>%3$s%4$s%5$s</span></a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);

		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'size_510_350', 510, 350 );
        add_image_size( 'size_470_310', 470, 310 );
        add_image_size( 'size_470_700', 470, 700 );
}

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="pagination_wrap  %1$s" role="navigation">
		<div class="wp-pagenavi">%3$s</div>
	</nav>    
	';
}
function get_submenu_html_by_post_type($post_type,$max_count){
    $args = array(
        'numberposts' => $max_count,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => $post_type,
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    );

    $posts = get_posts( $args );
    $cur_lang=qtranxf_getLanguage();
    $return='<div class="menu-subitem"><ul>';
    foreach($posts as $post){
        $return.='<li><a href="'.qtranxf_convertURL(get_permalink($post->ID), $cur_lang).'">'
                . '<div class="dash">'
                . '</div><div class="name cut-text" data-cut="70">'.get_the_title($post->ID).'</div>'
                . '</a></li>';
    }
    $return.='</ul></div>';
    $res=[
        'count'=>count($posts),
        'html'=>$return
    ];
    return $res;
}
function filter_characters($str) {
    return implode('', array_filter(str_split($str), function($digit) {
        return ('+' == $digit || is_numeric($digit));
    }));
}
function get_the_kvartal($month){
    $res=1;
    switch ($month) {
        case 1:
        case 2:
        case 3:
            $res=1;
            break;
        case 4:
        case 5:
        case 6:
            $res=2;
            break;
        case 7:
        case 8:
        case 9:
            $res=3;
            break;
        case 10:
        case 11:
        case 12:
            $res=4;
            break;
    }
    return $res;
}
function number_to_roman($value)
{
    if($value<0) return "";
    if(!$value) return "0";
    $thousands=(int)($value/1000);
    $value-=$thousands*1000;
    $result=str_repeat("M",$thousands);
    $table=array(
        900=>"CM",500=>"D",400=>"CD",100=>"C",
        90=>"XC",50=>"L",40=>"XL",10=>"X",
        9=>"IX",5=>"V",4=>"IV",1=>"I");
    while($value) {
        foreach($table as $part=>$fragment) if($part<=$value) break;
            $amount=(int)($value/$part);
        $value-=$part*$amount;
        $result.=str_repeat($fragment,$amount);
    }
    return $result;
}
?>