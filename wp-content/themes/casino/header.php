<!DOCTYPE html>
<html <?php language_attributes(); ?>>
 <head>

    <?php wp_head(); ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="MobileOptimized" content="320"/>
    <meta name="HandheldFriendly" content="true"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="/wp-content/themes/casino/js/jquery.jcarousellite.min.js"></script>
    <script type="text/javascript" src="/wp-content/themes/casino/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="/wp-content/themes/casino/js/jquery.mousewheel-3.1.12.min.js"></script>
 </head>
 <body>
 <div class="c1_head">
    <a href="/" class="c1_logo"><img src="/wp-content/themes/casino/img/logo.png"/></a>
    <div class="c1_top_menu">




        <?php

        $args = array(
        	'menu'            => '',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее
        										  // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
        	'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
        	'container_class' => '',              // (string) class контейнера (div тега)
        	'container_id'    => '',              // (string) id контейнера (div тега)
        	'menu_class'      => 'menu',          // (string) class самого меню (ul тега)
        	'menu_id'         => '',              // (string) id самого меню (ul тега)
        	'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
        	'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
        	'before'          => '',              // (string) Текст перед <a> каждой ссылки
        	'after'           => '',              // (string) Текст после </a> каждой ссылки
        	'link_before'     => '',              // (string) Текст перед анкором (текстом) ссылки
        	'link_after'      => '',              // (string) Текст после анкора (текста) ссылки
        	'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
        	'walker'          => '',              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
        	'theme_location'  => ''               // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
        );

        wp_nav_menu( array(
        	'menu_class'=>'menu',
            'theme_location'=>'top',
            'after'=>'<span>|</span>'
        ) );

        ?>



    </div>




<?php if (!is_home()) { ?>

<div class="c1_breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<?php } ?>
</div>
 <div class="c1_clear"></div>

<?php //esc_html_e( 'Primary Menu', 'casino' ); ?>
<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            
            
            
