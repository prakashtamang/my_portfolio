<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MyPortfolio
 */

get_header();
?>

	<main id="primary" class="site-main">
		<!-- Portfolio Section -->
		<section id="portfolio" class="portfolio section">
			<div class="container">
				<div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
					<div class="row align-items-center">
						<div class="col-lg-7 portfolio-info">
							<h3>Hey, I'm Prakash Tamang</h3>
							<p>Web Developer | WordPress Developer | Creating modern and responsive websites that make an impact.</p>
						</div>
						<div class="col-lg-5 text-center text-lg-end">
							<ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
								<li data-filter="*" class="filter-active">All</li>
								<?php
								$terms = get_terms(array(
									'taxonomy' => 'portfolio_cat',
									'hide_empty' => true,
								));

								if (!empty($terms) && !is_wp_error($terms)) {
									foreach ($terms as $term) {
										echo '<li data-filter=".' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</li>';
									}
								}
								?>	
							</ul>
						</div>
					</div>
					<?php
					$args = array(
						'post_type'   => 'portfolio',
						'post_status' => 'publish',
						'order'               => 'DESC',
						'orderby'             => 'date',
						'posts_per_page'         => 12,
					); 

					// the query
					$portfolio_query = new WP_Query( $args ); 

					if ( $portfolio_query->have_posts() ) : ?>
					<div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
						<?php // the loop
						while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); 
						$terms = wp_get_post_terms(get_the_ID(), 'portfolio_cat');
						$term_classes = '';
						$term_names   = array();
						foreach ($terms as $term) {
							$term_classes .= $term->slug . ' ';
							$term_names[] = $term->name;
						}
						?>
						<div class="col-lg-4 col-md-6 portfolio-item isotope-item <?php echo esc_attr(trim($term_classes)); ?>">
							<div class="portfolio-content h-100">
								<?php  
								if ( has_post_thumbnail( ) ) {
									the_post_thumbnail( 'full', ['class' => 'img-fluid'] );
								} ?>
								<div class="portfolio-info">
									<h4><?php the_title(); ?></h4>
									<p class="portfolio-category">
										<?php echo esc_html(implode(', ', $term_names)); ?>
									</p>
									<div>
										<?php if (has_post_thumbnail()) : 
											$img_url = wp_get_attachment_image_url(get_post_thumbnail_id(), 'large'); 
											$gallery_group = !empty($terms) ? $terms[0]->slug . '-gallery' : 'portfolioGallery';
											?>
											
											<a href="<?php echo esc_url($img_url); ?>" class="glightbox preview-link" data-gallery="<?php echo esc_attr($gallery_group); ?>" title="<?php the_title(); ?>">
												<i class="bi bi-zoom-in"></i> <!-- Bootstrap icon -->
											</a>
										<?php endif; ?>
									
										<a href="<?php the_permalink(); ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; 
						wp_reset_postdata(); ?>
					</div> 

					<?php else : ?>
					<div class="text-center">
						<p><?php _e( 'Sorry, no portfolio to show for now.' ); ?></p>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<!-- Skills Section -->
		 <section id="skills" class="skills section">
			<!-- Section Title -->
			 <div class="container section-title" data-aos="fade-up">
				<h2>My Skills</h2>
				<p>My technical expertise includes a diverse set of technologies and tools:</p>
			 </div>

			<div class="container" data-aos="fade-up" data-aos-delay="100">
				<div class="skills-set">
					<span class="skill">HTML5</span>
					<span class="skill">CSS3</span>
					<span class="skill">SCSS</span>
					<span class="skill">JavaScript(ES6+)</span>
					<span class="skill">React.js</span>
					<span class="skill">Node.js</span>
					<span class="skill">Express.js</span>
					<span class="skill">MongoDB</span>
					<span class="skill">WordPress</span>
					<span class="skill">WooCommerce</span>
					<span class="skill">PHP</span>
					<span class="skill">MySQL/SQL</span>
					<span class="skill">Tailwind CSS</span>
					<span class="skill">Bootstrap</span>
					<span class="skill">Figma</span>
					<span class="skill">Git & GitHub</span>
					<span class="skill">REST API Integration</span>
					<span class="skill">Web Development</span>
					<span class="skill">Responsive Design</span>
					<span class="skill">Website Optimization</span>
				</div>
			</div>
		 </section>
	</main><!-- #main -->

<?php
get_footer();
