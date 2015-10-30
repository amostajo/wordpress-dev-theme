<?php
/**
 * Header will include HTML nav, head, body and others.
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */
?>

<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title> <?php wp_title( '-', true, 'right' ) ?> </title>

		<?php wp_head() ?> 

		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ) ?>" />

	</head>

	<body <?php body_class() ?> id="page-top">
		
		<?php get_template_part( 'nav' ) ?>