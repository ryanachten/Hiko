<?php get_header(); ?>

<div id="content">

	<div id="inner-content">

		<main id="main" class="attachment-container small-12 small-centered" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php  $img_mimes = array(
									'image/jpeg',
									'image/gif',
									'image/png',
									'image/bmp',
									'image/tiff'
								);

						if ( in_array( get_post_mime_type(), $img_mimes ) ) {

								echo wp_get_attachment_image($post->ID, 'full', 'true', array( "class" => "attachment-img" ));
						}

						esc_html_e( the_title('<h2>', '</h2>'), 'jointswp' );


						//Get metadata associated with the attachment
						$attachment_meta = wp_get_attachment_metadata($post->ID);?>

						<h4><?php _e( 'Media Information:' ); ?></h4>

						<section class="attachment_metainfo">
							<?php if ( !empty( get_the_excerpt() )): ?>
								<p><strong>Caption: </strong><?php echo esc_html_e( get_the_excerpt(), 'jointswp' ); ?></p>
							<?php endif; ?>
							<?php if ( !empty( get_the_content() )): ?>
								<p><strong>Description: </strong><?php echo esc_html_e( get_the_content(), 'jointswp' ); ?></p>
							<?php endif; ?>
							<p><strong>Filename: </strong><?php echo $attachment_meta['file']?></p>
							<p><strong>Width: </strong><?php echo $attachment_meta['width'] .'px' ?></p>
							<p><strong>Height: </strong><?php echo $attachment_meta['height'] .'px' ?></p>



							<?php foreach ($attachment_meta['image_meta'] as $key => $value) {
								// will only display info if the data isn't an array or empty
								if ( !is_array( $value ) && (int)$value !== 0 ) {
									echo '<strong>' . ucfirst( $key ) . ':</strong> ' . $value . '<br>';
								}
							} ?>

						</section>

		    	<?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<p style="text-align: center;">Template: attachment.php</p>

<!-- Comments not allowed on frontend of site - uncomment if requirement changes -->
<?php // comments_template(); ?>

<?php get_footer(); ?>
