<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="row">

		    <main id="main" class="large-8 medium-8 small-centered columns" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php esc_attr( post_class('') ); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

							<header class="article-header">
								<h1 class="page-title text-center"><?php esc_html_e( the_title(), 'jointswp' ); ?></h1>
							</header>

							<section class="entry-content" itemprop="articleBody">
								<?php esc_html_e( the_content(), 'jointswp' ); ?>
							</section>

							<footer class="article-footer">

							</footer>

						</article>

		    <?php endwhile; endif; ?>

			</main>

		</div>

	</div>

	<!-- <p style="text-align: center;">Template: page-about.php</p> -->

<?php get_footer(); ?>
