<?php
/**
 * The template for displaying Contact page
 * Template Name: Contact 
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
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-2">

          <div class="col-lg-5">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>Godawari, Lalitpur, Nepal</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call</h3>
                <p>+977 984 3761017</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email<br></h3>
                <p>meprakashtamang@gmail.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-7">
            <div class="contact-form" data-aos="fade-up" data-aos-delay="500">
              <?php echo do_shortcode('[contact-form-7 id="2d1c12b" title="Contact Form"]'); ?>
            </div>
            
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

	</main><!-- #main -->

<?php
get_footer();
