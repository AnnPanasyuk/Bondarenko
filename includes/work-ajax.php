<?php
add_filter( 'wp_mail_from_name', 'custom_wp_mail_from_name' );
function custom_wp_mail_from_name( $original_email_from )
{
    return get_option('admin_email');
}
add_filter( 'wp_mail_from', 'custom_wp_mail_from' );
function custom_wp_mail_from( $original_email_address )
{
    return get_option('admin_email');
}
add_filter( 'wp_mail_content_type', 'set_html_content_type' );

function set_html_content_type() {
    return 'text/html';
}

add_action( 'wp_ajax_recall_form', 'recall_form' );
add_action( 'wp_ajax_nopriv_recall_form', 'recall_form' );

function recall_form(){
    if($_REQUEST['phone']=='' && $_REQUEST['is_js']=='has_js'){
        $message='';
        if(isset($_REQUEST['name'])){
            $message.="Имя: ".htmlspecialchars($_REQUEST['name']).'<br>';
        }
        if(isset($_REQUEST['email'])){
            $message.="E-mail: ".htmlspecialchars($_REQUEST['email']).'<br>';
        }
        if(isset($_REQUEST['phone_contact'])){
            $message.="Телефон: ".htmlspecialchars($_REQUEST['phone_contact']).'<br>';
        }
        $theme='Заявка с сайта';
        if(isset($_REQUEST['form'])){
            $theme=htmlspecialchars($_REQUEST['form']);
        }
        $res=wp_mail(get_option('admin_email'),$theme,$message);
    }
    echo 'true';
    exit();
}

add_action( 'wp_ajax_recall_popup', 'recall_popup' );
add_action( 'wp_ajax_nopriv_recall_popup', 'recall_popup' );

function recall_popup(){
    if($_REQUEST['phone']=='' && $_REQUEST['is_js']=='has_js'){
        $message='';
        if(isset($_REQUEST['name'])){
            $message.="Имя: ".htmlspecialchars($_REQUEST['name']).'<br>';
        }
        if(isset($_REQUEST['surname'])){
            $message.="Фамилия: ".htmlspecialchars($_REQUEST['surname']).'<br>';
        }
        if(isset($_REQUEST['email'])){
            $message.="E-mail: ".htmlspecialchars($_REQUEST['email']).'<br>';
        }
        if(isset($_REQUEST['phone_contact'])){
            $message.="Телефон: ".htmlspecialchars($_REQUEST['phone_contact']).'<br>';
        }
        if(isset($_REQUEST['company'])){
            $message.="Компания: ".htmlspecialchars($_REQUEST['company']).'<br>';
        }
        if(isset($_REQUEST['lang'])){
            $message.="Язык: ".htmlspecialchars($_REQUEST['lang']).'<br>';
        }
        if(isset($_REQUEST['place'])){
            $message.="Место проведения: ".htmlspecialchars($_REQUEST['place']).'<br>';
        }
        if(isset($_REQUEST['people-count'])){
            $message.="Количество зрителей: ".htmlspecialchars($_REQUEST['people-count']).'<br>';
        }
        if(isset($_REQUEST['duration'])){
            $message.="Продолжительность события: ".htmlspecialchars($_REQUEST['duration']).'<br>';
        }
        if(isset($_REQUEST['date'])){
            $message.="Дата мероприятия: ".htmlspecialchars($_REQUEST['date']).'<br>';
        }
        if(isset($_REQUEST['time'])){
            $message.="Время события: ".htmlspecialchars($_REQUEST['time']).'<br>';
        }
        if(isset($_REQUEST['info-from'])){
            $message.="Откуда Вы узнали о нас?: ".htmlspecialchars($_REQUEST['info-from']).'<br>';
        }
        
        if(isset($_REQUEST['desc'])){
            $message.="Описание мероприятия: ".htmlspecialchars($_REQUEST['desc']).'<br>';
        }
        
        $theme='Заявка с сайта';
        if(isset($_REQUEST['form'])){
            $theme=htmlspecialchars($_REQUEST['form']);
        }

        $res=wp_mail(get_option('admin_email'),$theme,$message);
    }
    echo 'true';
    exit();
}