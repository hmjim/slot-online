<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package casino
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="c1_comments" class="c1_comments-area">


    <?php
  // код из comment-template.php, для тех кто немного знаком с PHP, без труда его разберет
  $fields = array(
  
    'author' => '<p class="c1_comment-form-author"><input placeholder="Ваше имя" id="c1_author" name="author" type="text" value="" size="30"/></p>',
    'email' => '<p class="c1_comment-form-email"><input placeholder="Ваш email" id="c1_email" name="email" type="text" value="" size="30"/></p>',
    
    
  );
  $args = array(
    'fields' => apply_filters('comment_form_default_fields', $fields),
    'title_reply_before' => '<h2 class="c1_br3">',
  'title_reply_after' => '</h2>',
  'title_reply' => 'Оставить отзыв',
  'comment_field' => '<p class="c1_comment-form-comment"><textarea id="c1_comment" name="comment" placeholder="Ваш отзыв" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea></p>',
    
  );
  comment_form($args);



    
    
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
	 	<h4 class="c1_br3">
			<?php
			/*	printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'casino' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);*/
		
        	?>
          Отзывы  
		</h4> 

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="c1_comment-nav-above" class="c1_navigation c1_comment-navigation" role="navigation">
			<h2 class="c1_screen-reader-text"><?php esc_html_e( 'Comment navigation', 'casino' ); ?></h2>
			<div class="c1_nav-links">

				<div class="c1_nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'casino' ) ); ?></div>
				<div class="c1_nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'casino' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="c1_comment-list">
			<?php
				wp_list_comments('type=comment&callback=mytheme_comment');
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="c1_comment-nav-below" class="c1_navigation c1_comment-navigation" role="navigation">
			<h2 class="c1_screen-reader-text"><?php esc_html_e( 'Comment navigation', 'casino' ); ?></h2>
			<div class="c1_nav-links">

				<div class="c1_nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'casino' ) ); ?></div>
				<div class="c1_nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'casino' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="c1_no-comments"><?php esc_html_e( 'Comments are closed.', 'casino' ); ?></p>
	<?php
	endif;

	
    
	?>
    
    <?php 
function mytheme_comment($comment, $args, $depth){
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="c1_li-comment-<?php comment_ID() ?>">
	<div id="c1_comment-<?php comment_ID(); ?>">
    
    <?php comment_text() ?>
    
	<div class="c1_comment-author vcard">
		<?php echo get_avatar( $comment, $size='48', $default='<path_to_url>' ); ?>

		<cite class="c1_fn"><?php echo get_comment_author() ?></cite> 
	
    <?php edit_comment_link('(Редактировать)', '  ', '') ?>
	</div>
	<?php if ($comment->comment_approved == '0') : ?>
		<em>Ваш комментарий ожидает проверки.</em>
		<br />
	<?php endif; ?>

	

	

	<div class="c1_reply">
		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	</div>
<?php
}
?>


</div><!-- #comments -->
