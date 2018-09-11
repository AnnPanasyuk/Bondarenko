<!DOCTYPE html>
<?php
require TEMPLATEPATH . '/includes/base-vars.php'; 
?><html class="no-js" lang="<?=$cur_lang?>">
<head>
  <meta charset="utf-8"/>
  <title><?php the_title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="<?=$template_url?>/assets/css/libs.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="<?=$template_url?>/assets/css/style.css"/>
  <link rel="stylesheet" href="<?=$template_url?>/editor-style.css"/>
  <?php wp_head(); ?>
</head>

<body>
<div id="page-wrapper" class="page-wrapper">