<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package tehnodim
 */

get_header(); ?>
	<section class="error-page">
		<h1><span>404. </span> <?php _e('Простите, такой страницы не существует!', 'tehnodim'); ?> </h1>
		<a href="<?php echo site_url();?>" class="ch-button"><?php _e('На главную', 'tehnodim'); ?></a>
	</section>
<?php get_footer();
