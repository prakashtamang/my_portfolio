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
				<h1>Portfolio Details</h1>
				<nav class="breadcrumbs">
					<ol>
						<li><a href="<?php echo esc_url( home_url() ); ?>">Home</a></li>
						<li class="current">Portfolio Details</li>
					</ol>
				</nav>
			</div>
		</div>

		<!-- Portfolio Details Section -->
		 <section id="portfolio-details" class="portfolio-details section">
			<div class="container" data-aos="fade-up" data-aos-delay="100">
				<div class="row gy-4">
					<div class="col-lg-8">
						<div class="portfolio-img">
							<?php  
							if ( has_post_thumbnail( ) ) {
								the_post_thumbnail( 'full', ['class' => 'img-fluid'] );
							} ?>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
							<h3>Project information</h3>
							<ul>
								<li><strong>Category</strong>: 
								<?php
								$terms = get_the_terms( get_the_ID(), 'portfolio_cat' ); 
								if ( $terms && ! is_wp_error( $terms ) ) {
									$term_names = array();
									foreach ( $terms as $term ) {
										$term_names[] = esc_html( $term->name );
									}
									echo implode( ', ', $term_names );
								} else {
									echo 'Uncategorized';
								}
								?></li>
								<li><strong>Client</strong>: <?php echo esc_html( get_field('client') ); ?></li>
								<li><strong>Project URL</strong>: <a target="_blank" href="<?php echo esc_attr( get_field('project_url') ); ?>"><?php echo esc_attr( get_field('project_url') ); ?></a></li>
							</ul>
						</div>
						<div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		 </section>

	</main><!-- #main -->

<?php
get_footer();
