<?php
/**
 * The template for displaying About page
 * Template Name: About 
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

    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4">
                  <?php  
                  if ( has_post_thumbnail( ) ) {
                    the_post_thumbnail( 'full', ['class' => 'img-fluid'] );
                  } ?>
                </div>
                <div class="col-lg-8 content">
                    <h2>Web Developer</h2>
                    <?php
                    $content = get_post_field('post_content', get_the_ID()); // raw content from DB
                    echo $content;
                    ?>
                  </p>
                    <div class="row py-3">
                    <div class="col-lg-6">
                        <ul>
                        <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.prakashtamang.com</span></li>
                        <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>meprakashtamang@gmail.com</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul>
                        <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Godawari, Lalitpur</span></li>
                        <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                        </ul>
                    </div>
                    </div>
                    <p>
                    Over the years, I have developed and managed websites for educational institutions, organizations, and businesses. Currently, I work as a freelance developer, collaborating with clients to deliver tailored digital solutions. I enjoy solving problems, learning new technologies, and helping businesses grow through innovative digital solutions.
                    </p>
                </div>
                </div>
        </div>
    </section>

    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Resume</h2>
        <p>A summary of my professional journey, including my education and work experience as a Web Developer. </p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Sumary</h3>

            <div class="resume-item pb-0">
              <h4>Prakash Tamang</h4>
              <p><em>Passionate and detail-oriented Web Developer with expertise in HTML, CSS, JavaScript, React.js, and WordPress. Experienced in designing and developing responsive, user-friendly, and scalable web solutions for businesses, educational institutions, and organizations.</em></p>
              <ul>
                <li>Godawari, Lalitpur, Nepal</li>
                <li>meprakashtamang@gmail.com</li>
              </ul>
            </div><!-- Edn Resume Item -->

            <h3 class="resume-title">Education</h3>
            <div class="resume-item">
              <h4>Bachelor of Science in Information Technology (B.Sc.IT)</h4>
              <h5>2012 - 2015</h5>
              <p><em>Sikkim Manipal University</em></p>
              <p>Completed a comprehensive IT program with a strong focus on web technologies, programming, software development, and database management.</p>
            </div><!-- Edn Resume Item -->

            <h3 class="resume-title">Certifications</h3>
            <div class="resume-item">
              <h4>Full-Stack Web Development with MERN Diploma</h4>
              <h5>2025</h5>
              <p><em>Skill Shikshya, Nepal</em></p>
              <p>Successfully completed a <strong>180-hour professional diploma course</strong> focused on the MERN stack (MongoDB, Express.js, React.js, Node.js). Gained hands-on experience in building full-stack applications, REST APIs, authentication systems, and deployment processes.</p>
            </div><!-- Edn Resume Item -->

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <h3 class="resume-title">Professional Experience</h3>
            <div class="resume-item">
              <h4>Freelance Web Developer</h4>
              <h5>2020 - Present</h5>
              <p><em>Remote / Nepal </em></p>
              <ul>
                <li>Developed and managed websites for educational institutions, organizations, and businesses.</li>
                <li>Specialized in WordPress development, including custom themes, plugins, and optimization. </li>
                <li>Collaborated with clients to deliver tailored solutions, from concept to deployment.</li>
                <li>Created responsive React.js applications and full-stack projects using the MERN stack.</li>
              </ul>
            </div><!-- Edn Resume Item -->

            <div class="resume-item">
              <h4>WordPress Developer</h4>
              <h5>2016 - 2017</h5>
              <p><em>Web Experts Nepal Pvt. Ltd.</em></p>
              <ul>
                <li>Developed and delivered responsive, user-friendly, and high-performing WordPress websites for clients across various industries.</li>
                <li>Managed web projects from initial planning to final deployment, ensuring quality and on-time delivery.</li>
                <li>Collaborated with team members and clients through clear communication and strong commitment to deadlines.</li>
                <li>Contributed to team success by maintaining best practices in coding, design, and project execution.</li>
              </ul>
            </div><!-- Edn Resume Item -->

          </div>

        </div>

      </div>

    </section><!-- /Resume Section -->

	</main><!-- #main -->

<?php
get_footer();
