<?php

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'singlepage'); ?></p> 
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number(__('No comment', 'singlepage'), __('Has one comment', 'singlepage'), __('% comments', 'singlepage'));?> <?php printf(__('to &#8220;%s&#8221;', 'singlepage'), the_title('', '', false)); ?></h3>
<div class="upcomment"><?php _e('You can ','singlepage'); ?><a id="leaverepond" href="#comments"><?php _e('leave a reply','singlepage'); ?></a>  <?php _e(' or ','singlepage'); ?> <a href="<?php trackback_url(true); ?>" rel="trackback"><?php _e('Trackback','singlepage'); ?></a> <?php _e('this post.','singlepage'); ?></div>
	<ol id="thecomments" class="commentlist comments-list">
	<?php wp_list_comments('type=comment&callback=singlepage_comment');?>
	</ol>

<!-- comments pagenavi Start. -->
	<?php
	if (get_option('page_comments')) {
		$comment_pages = paginate_comments_links('echo=0');
		if ($comment_pages) {
?>
		<div id="commentnavi">
			<span class="pages"><?php _e('Comment pages', 'singlepage'); ?></span>
			<div id="commentpager">
				<?php echo $comment_pages; ?>
				
			</div>
			<div class="fixed"></div>
		</div>
<?php
		}
	}
?>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php //_e('Comments are closed.', 'singlepage'); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond" class="respondbg">

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'singlepage'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>
<?php 
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
global $required_text;
$commenter['comment_author']        = ($commenter['comment_author'] == "")?__('Name', 'singlepage')." *":$commenter['comment_author'];
$commenter['comment_author_email']  = ($commenter['comment_author_email'] == "")?__('Email', 'singlepage')." *":$commenter['comment_author_email'];
$commenter['comment_author_url']    = ($commenter['comment_author_url'] == "")?__('Website', 'singlepage'):$commenter['comment_author_url'];
$comments_args = array(
'class_submit'         => 'submitss',
         'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Your email address will not be published.', 'singlepage' ) . ( $req ? $required_text : '' ) .
    '</p>',
        // change the title of the reply section
        'title_reply'=>__('Write a Reply or Comment', 'singlepage'),
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<div class="clear"></div>
<section class="comment-form-comment"><div id="comment-textarea"><textarea id="comment" name="comment" onFocus="if(this.value==\''.__('Message', 'singlepage').' *\'){this.value=\'\'}" onBlur="if(this.value==\'\'){this.value=\''.__('Message', 'singlepage').' *\'}"  cols="45" rows="8"  class="textarea-comment" aria-required="true">'.__('Message', 'singlepage').' *</textarea></div></section>',
		'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<section class="comment-form-author"><input id="author" class="input-name" name="author" onFocus="if(this.value==\''.__('Name', 'singlepage').' *\'){this.value=\'\'}" onBlur="if(this.value==\'\'){this.value=\''.__('Name', 'singlepage').' *\'}" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' /></section>',

    'email' =>
      '<section class="comment-form-email"><input id="email" class="input-name" name="email" onFocus="if(this.value==\''.__('Email', 'singlepage').' *\'){this.value=\'\'}" onBlur="if(this.value==\'\'){this.value=\''.__('Email', 'singlepage').' *\'}" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /></section>',

    'url' =>
      '<section class="comment-form-url"><input id="url" class="input-name" name="url" onFocus="if(this.value==\''.__('Website', 'singlepage').'\'){this.value=\'\'}" onBlur="if(this.value==\'\'){this.value=\''.__('Website', 'singlepage').'\'}" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /></section>'
    ))
);
?>
<?php comment_form($comments_args);?>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; 