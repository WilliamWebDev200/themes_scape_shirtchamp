<?php
/**
 * The template for displaying all pages
 */
?>

<?php get_header(); ?>

<?php
$wtbx_layout = wtbx_layout_settings();
$layout_js_styles = '';
$layout_js_styles .= $wtbx_layout['sidebar'] !== 'no_sidebar' && is_active_sidebar($wtbx_layout['sidebar_widgetarea']) ? '#sidebar{width:' . (!empty($wtbx_layout['sidebar_width']) && $wtbx_layout['sidebar_width'] !== -1 ? esc_html($wtbx_layout['sidebar_width']) : '340') . 'px}' : '';
$layout_js_styles .= $wtbx_layout['sidebar'] !== 'no_sidebar' && is_active_sidebar($wtbx_layout['sidebar_widgetarea']) ? '#content{width:calc(100% - ' . (!empty($wtbx_layout['sidebar_width']) && $wtbx_layout['sidebar_width'] !== -1 ? esc_html($wtbx_layout['sidebar_width']) : '340') . 'px)}' : '';
$layout_js_styles .= $wtbx_layout['sidebar'] !== 'no_sidebar' && is_active_sidebar($wtbx_layout['sidebar_widgetarea']) && !empty($wtbx_layout['sidebar_font']) ? '#sidebar{'.esc_html(wtbx_font_styling($wtbx_layout['sidebar_font'])).'}' : '';
$layout_js_styles .= $wtbx_layout['sidebar'] !== 'no_sidebar' && is_active_sidebar($wtbx_layout['sidebar_widgetarea']) && !empty($wtbx_layout['sidebar_padding']) ? '#sidebar .page-sidebar{padding-top:' . esc_html($wtbx_layout['sidebar_padding']) . 'px}}' : '';
$layout_js_styles .= $wtbx_layout['content_limit'] !== '' ? '#container {max-width:'.esc_html(intval($wtbx_layout['content_limit'])).'px}' : '';
if ( !empty($layout_js_styles) ) {
	wtbx_js_styles($layout_js_styles);
}
$wtbx_page_template  = get_post_meta( get_the_id(), 'page-template-type-single', true );
$wtbx_slider_anim    = $wtbx_page_template === 'slider' ? get_post_meta( get_the_id(), 'page-template-slider-anim-single', true ) : '';
$wtbx_slider_nav     = $wtbx_page_template === 'slider' ? get_post_meta( get_the_id(), 'page-template-slider-nav-single', true ) : '';
$wtbx_page_nav       = $wtbx_page_template === 'default' ? get_post_meta( get_the_id(), 'page-navigation-single', true ) : '';
if ( $wtbx_page_template === 'slider' ) {
    wtbx_script_queue('fullpage');
	wtbx_script_queue('scape-fullpage');
}
if ( $wtbx_page_nav !== '' || $wtbx_slider_nav !== '' ) {
	wtbx_script_queue('scape-pagenav');
	wp_enqueue_style('scape-fullscreen');
}
?>


	<div id="searh-box" class="seacch-control">
		<?php echo do_shortcode('[content_block slug=search]'); ?>
	</div>


	<div id="container" class="row-inner <?php echo trim(esc_attr('page-template-'.$wtbx_page_template . ' ' . ( is_active_sidebar($wtbx_layout['sidebar_widgetarea']) || $wtbx_layout['sidebar'] === 'no_sidebar' ? $wtbx_layout['sidebar'] : '') . $wtbx_layout['fullwidth'])); ?>">
		<div id="content">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
					<div class="entry-content clearfix"<?php if ($wtbx_slider_anim !== '') {echo ' data-anim="'.esc_attr($wtbx_slider_anim).'"';} if ($wtbx_slider_nav !== '') {echo ' data-nav="'.esc_attr($wtbx_slider_nav).'"';} if ($wtbx_page_nav !== '') {echo ' data-page-nav="'.esc_attr($wtbx_page_nav).'"';} ?>>
						<?php the_content(); ?>
						<?php get_template_part( 'templates/section-multipage-nav' ); ?>
					</div><!-- .entry-content -->
				</article>

			<?php endwhile; ?>

		</div><!-- #content -->

		<?php if ( in_array( $wtbx_layout['sidebar'], array('sidebar_left', 'sidebar_left_sticky', 'sidebar_right', 'sidebar_right_sticky') ) && $wtbx_layout['sidebar_widgetarea'] !== 'none' && is_active_sidebar($wtbx_layout['sidebar_widgetarea']) )  : ?>

            <div id="sidebar" class="<?php echo esc_attr($wtbx_layout['sidebar_skin']), esc_attr($wtbx_layout['sidebar_sticky']); ?>">
                <div class="page-sidebar">
					<div class="widget-area">
						<?php dynamic_sidebar($wtbx_layout['sidebar_widgetarea']); ?>
					</div>
				</div>
			</div><!-- #sidebar -->

		<?php endif; ?>

        <?php if ( ( comments_open() || get_comments_number() ) && wtbx_option('page-comments') !== '0' ) : ?>
            <div class="row-inner clearfix">
                <div class="wtbx-width wtbx-large-7 wtbx-medium-8 wtbx-small-9">
                    <?php comments_template(); ?>
                </div>
            </div>
		<?php endif; ?>

	</div><!-- #container -->


<div class="mobile-sidebar-option__modal">
    <div class="mobile-sidebar-option__closebox"> </div>

    <!-- mobile-sidebar-option__sidebar -->
    <div class="mobile-sidebar-option__sidebar">
        <div class="mobile-sidebar-option__closebox--icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M13.46,12L19,17.54V19H17.54L12,13.46L6.46,19H5V17.54L10.54,12L5,6.46V5H6.46L12,10.54L17.54,5H19V6.46L13.46,12Z"/></svg>
        </div>

		<div id="sidebar" class="mobile-sidebar-option__sidebar-holder" <?php echo esc_attr($wtbx_layout['sidebar_skin']), esc_attr($wtbx_layout['sidebar_sticky']); ?>">
			<div class="page-sidebar" id="modal-box">
				<div class="widget-area">
					<?php dynamic_sidebar( 'wtbx_sidebar_1316382482322236' );?>
				</div>
			</div>
		</div><!-- #sidebar -->
    </div>
        <!-- mobile-sidebar-option__sidebar -->

</div>


<div class="mobile-control">
		<?php echo do_shortcode('[content_block slug=home-mobile-menu]'); ?>
</div>


<?php get_footer(); ?>