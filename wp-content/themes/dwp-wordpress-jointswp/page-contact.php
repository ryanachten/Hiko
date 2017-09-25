<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="row">

		    <main id="main" class="large-8 medium-8 small-11 small-centered columns" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

							<header class="article-header">
								<h1 class="page-title"><?php the_title(); ?></h1>
							</header> <!-- end article header -->

							<section class="entry-content" itemprop="articleBody">
								<h3 class="subheader text-center"><?php the_content(); ?></h3>

								<form data-abide novalidate>
									<div class="row">

										<div class="name-field large-6 columns">
									    <label>Your name <small>required</small>
									      <input type="text" required placeholder="Name...">
									    </label>
									    <!-- <small class="error">Name is required and must be a string.</small> -->
									  </div>

									  <div class="email-field large-6 columns">
									    <label>Email <small>required</small>
									      <input type="email" placeholder="Email..." required>
									    </label>
									    <!-- <small class="error">An email address is required.</small> -->
									  </div>
									</div>

									<div>
										<label>Your message <small>required</small>
										<textarea placeholder="Message..." required></textarea>
	  								<!-- <small class="error">Invalid entry</small> -->
									</div>


								  <button class="button" type="submit">Submit</button>
								</form>

							</section> <!-- end article section -->

							<footer class="article-footer">

							</footer> <!-- end article footer -->

						</article> <!-- end article -->

		    <?php endwhile; endif; ?>

			</main> <!-- end #main -->

		    <?php //get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

	<p style="text-align: center;">Template: page-contact.php</p>

<?php get_footer(); ?>
