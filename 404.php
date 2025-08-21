<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MyPortfolio
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="custom-404 not-found">
			<div class="container">
				<h1>404</h1>
				<h2>Oops! Page not found.</h2>
				<p>Sorry, the page you are looking for does not exist. Try going back to the homepage.</p>
				<a href="<?php echo esc_url(home_url()); ?>">Go to Homepage</a>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
