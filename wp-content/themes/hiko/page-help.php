<?php get_header(); ?>

	<div id="content">

		<div id="inner-content">

		    <main id="main" class="large-10 medium-11 small-centered columns" role="main">

					<article id="post-<?php the_ID(); ?>" <?php esc_attr( post_class('') ); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

						<header class="article-header">
							<h1 class="page-title text-center"><?php esc_html_e( the_title(), 'jointswp' ); ?></h1>
							<h3 class="subheader page-title text-center">Resources &amp; Guides</h3>
						</header>

						<section class="entry-content archive-thumb-container" itemprop="articleBody">

								<a class="article-thumbnail" href="<?php echo get_page_link(get_page_by_title('Author Tutorial')->ID)?>">
									<section>
										<i class="helpthumb-icon fi-torsos-all"></i>
										<h4 class="text-center">Author Tutorial</h4>
										<p class="text-center subheader">A guide for students and authors on the Hiko platform</p>
									</section>
								</a>

								<a class="article-thumbnail" href="<?php echo get_page_link(get_page_by_title('Editor Manual')->ID)?>">
									<section>
										<i class="helpthumb-icon fi-torsos"></i>
										<h4 class="text-center">Editor Manual</h4>
										<p class="text-center subheader">A guide for authors and students on the Hiko platform</p>
									</section>
								</a>

								<a class="article-thumbnail" href="<?php echo get_page_link(get_page_by_title('Admin Manual')->ID)?>">
									<section>
										<i class="helpthumb-icon fi-torso-business"></i>
										<h4 class="text-center">Admin Manual</h4>
										<p class="text-center subheader">A guide for site administrators on the Hiko platform</p>
									</section>
								</a>

								<a class="article-thumbnail" href="<?php echo get_page_link(get_page_by_title('Writing Resources')->ID)?>">
									<section>
										<i class="helpthumb-icon fi-pencil"></i>
										<h4 class="text-center">Writing Resources</h4>
										<p class="text-center subheader">A collection of resources to aid writing on Hiko for the web</p>
									</section>
								</a>

								<a class="article-thumbnail" href="<?php echo get_page_link(get_page_by_title('Media Resources')->ID)?>">
									<section>
										<i class="helpthumb-icon fi-photo"></i>
										<h4 class="text-center">Media Resources</h4>
										<p class="text-center subheader">Guidelines and resources for including media in your Hiko articles</p>
									</section>
								</a>

								<a class="article-thumbnail" href="<?php echo get_page_link(get_page_by_title('FAQ')->ID)?>">
									<section>
										<i class="helpthumb-icon fi-comments"></i>
										<h4 class="text-center">FAQ</h4>
										<p class="text-center subheader">Answers to Frequently Asked Questions about the Hiko platform</p>
									</section>
								</a>

						</section>
					</article>

			</main>
		</div>
	</div>

	<!-- <p style="text-align: center;">Template: page-help.php</p> -->

<?php get_footer(); ?>
