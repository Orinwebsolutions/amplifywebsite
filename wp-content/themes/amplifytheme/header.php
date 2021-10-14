<?php
/**
 * Header template
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes();?>">
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordpress theme</title>
    <?php wp_head(); ?>
</head>
<body class="<?php body_class(); ?>">
<div id="page" class="site">
    <header id="masthead" class="site-header" role="header">
        <?php get_template_part('template-parts/header/nav')?>
    </header>
    <div id="content">
        <div class="container">