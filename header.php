<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php bloginfo('name'); ?>
	</title>
	<?php wp_head(); ?>
</head>

<body class="p-1 md:px-[64px]" style="background-color: var(--color-background);">
	<?php get_template_part('template-parts/header/site-header'); ?>
