<?php
/**
 * The template for displaying archive pages
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
                <h1><?php the_archive_title(); ?></h1>
                <nav class="breadcrumbs">
                <ol>
                    <li><a href="<?php echo esc_url( home_url() ); ?>">Home</a></li>
                    <li class="current"><?php the_archive_title(); ?></li>
                </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

		<?php if ( have_posts() ) : ?>
			<section class="section">
				<div class="container">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				</div>
			</section>
	</main><!-- #main -->

<?php
get_footer();
