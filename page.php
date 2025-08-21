<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MyPortfolio
 */

get_header();
?>

	<main id="primary" class="site-main">
		<!-- Page Title -->
		<div class="page-title light-background">
			<div class="container">
				<h1><?php the_title(); ?></h1>
				<nav class="breadcrumbs">
					<ol>
						<li><a href="<?php echo esc_url( home_url() ); ?>">Home</a></li>
						<li class="current"><?php the_title(); ?></li>
					</ol>
				</nav>
			</div>
		</div>

		<!-- Page Section -->
		 <section id="page" class="page section">
			<div class="container" data-aos="fade-up" data-aos-delay="100">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>
		 </section>
		

	</main><!-- #main -->

<?php
get_footer();
