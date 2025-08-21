<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		<section class="section">
			<div class="container">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'my_portfolio' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'my_portfolio' ) . '</span> <span class="nav-title">%title</span>',
						)
					);

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
