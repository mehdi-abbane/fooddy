<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body x-data="global" style="background-color: var(--color-background);" x-init="init()">
    <?php get_template_part('template-parts/header/site-header'); ?>
