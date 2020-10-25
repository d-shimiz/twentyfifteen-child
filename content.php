<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>

		<?php
			if( date('Ym') - get_the_time('Ym') > 94 ) { ?>
				<div class="old-post-message" style="border: 3px solid #b7b7e7; background: #F0F0FA; padding: 2px 5px">
					<p>この記事は公開されてから半年以上経過しています (公開日<?php the_time('Y年n月j日') ?>)。</p>
				</div>
		<?php } ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>

            <div style="padding : 10px 0px" >

              <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-text="<?php the_title_attribute(); ?>" style="margin:0!important;" data-url="https://blog.d-shimizu.io/article/<?php the_ID(); ?>">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

              <a href="https://b.hatena.ne.jp/entry/s/<?php bloginfo('url'); ?>/article/<?php the_ID(); ?>"
                  class="hatena-bookmark-button" 
                  data-hatena-bookmark-url="<?php echo esc_url( home_url() ); ?>/article/<?php the_ID(); ?>" 
                  data-hatena-bookmark-title="<?php the_title_attribute(); ?>"
                  data-hatena-bookmark-layout="basic-label-counter" 
                  data-hatena-bookmark-lang="ja" 
              title="このエントリーをはてなブックマークに追加">
              <img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none; margin:0!important" />
              </a>

	      <div id="fb-root"></div>
              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v8.0" nonce="Yj1Iw9vx"></script>

	      <div class="fb-like" data-href="https://blog.d-shimizu.io" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>

           </div>


	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
