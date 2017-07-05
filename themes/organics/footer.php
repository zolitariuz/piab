<?php
/**
 * The template for displaying the footer.
 */

organics_close_wrapper();	// <!-- </.content> -->

// Show main sidebar
get_sidebar();

if (organics_get_custom_option('body_style')!='fullscreen') organics_close_wrapper();	// <!-- </.content_wrap> -->
?>

</div>		<!-- </.page_content_wrap> -->

<?php

// Footer sidebar
$footer_show  = organics_get_custom_option('show_sidebar_footer');
$sidebar_name = organics_get_custom_option('sidebar_footer');
if (!organics_param_is_off($footer_show) && is_active_sidebar($sidebar_name)) {
	organics_storage_set('current_sidebar', 'footer');
    ?>
    <footer class="footer_wrap widget_area scheme_<?php echo esc_attr(organics_get_custom_option('sidebar_footer_scheme')); ?>">
        <div class="footer_wrap_inner widget_area_inner">
            <div class="content_wrap">

            <?php
                if (organics_get_custom_option('show_footer_shortcode_area')=='yes') { ?>
                    <div class="sc_section scheme_<?php echo esc_attr(organics_get_custom_option('footer_shortcode_area_scheme')); ?>">
                        <div class="footer_shortcode_area"><?php echo force_balance_tags(do_shortcode(organics_get_custom_option('footer_shortcode_area'))); ?></div>
                    </div>
                <?php
                }
            ?>
                <div class="columns_wrap"><?php
                    ob_start();
                    do_action( 'before_sidebar' );
                    if ( !dynamic_sidebar($sidebar_name) ) {
                        // Put here html if user no set widgets in sidebar
                    }
                    do_action( 'after_sidebar' );
                    $out = ob_get_contents();
                    ob_end_clean();
                    echo trim(chop(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $out)));
                    ?></div>	<!-- /.columns_wrap -->
            </div>	<!-- /.content_wrap -->
        </div>	<!-- /.footer_wrap_inner -->
    </footer>	<!-- /.footer_wrap -->
<?php
}


// Google map
if ( organics_get_custom_option('show_googlemap')=='yes' ) {
    $map_address = organics_get_custom_option('googlemap_address');
    $map_latlng  = organics_get_custom_option('googlemap_latlng');
    $map_zoom    = organics_get_custom_option('googlemap_zoom');
    $map_style   = organics_get_custom_option('googlemap_style');
    $map_height  = organics_get_custom_option('googlemap_height');
    if (!empty($map_address) || !empty($map_latlng)) {
        $args = array();
        if (!empty($map_style))		$args['style'] = esc_attr($map_style);
        if (!empty($map_zoom))		$args['zoom'] = esc_attr($map_zoom);
        if (!empty($map_height))	$args['height'] = esc_attr($map_height);
        echo trim(organics_sc_googlemap($args));
    }
}

// Footer contacts
if (organics_get_custom_option('show_contacts_in_footer')=='yes') {
    $address_1 = organics_get_theme_option('contact_address_1');
    $address_2 = organics_get_theme_option('contact_address_2');
    $phone = organics_get_theme_option('contact_phone');
    $fax = organics_get_theme_option('contact_fax');
    if (!empty($address_1) || !empty($address_2) || !empty($phone) || !empty($fax)) {
        ?>
        <footer class="contacts_wrap scheme_<?php echo esc_attr(organics_get_custom_option('contacts_scheme')); ?>">
            <div class="contacts_wrap_inner">
                <div class="content_wrap">
                    <?php require organics_get_file_dir('templates/_parts/logo.php'); ?>
                    <div class="contacts_address">
                        <address class="address_right">
                            <?php if (!empty($phone)) echo esc_html__('Phone:', 'organics') . ' ' . esc_html($phone) . '<br>'; ?>
                            <?php if (!empty($fax)) echo esc_html__('Fax:', 'organics') . ' ' . esc_html($fax); ?>
                        </address>
                        <address class="address_left">
                            <?php if (!empty($address_2)) echo esc_html($address_2) . '<br>'; ?>
                            <?php if (!empty($address_1)) echo esc_html($address_1); ?>
                        </address>
                    </div>
                    <?php echo trim(organics_sc_socials(array('size'=>"tiny", 'shape'=>"round"))); ?>
                </div>	<!-- /.content_wrap -->
            </div>	<!-- /.contacts_wrap_inner -->
        </footer>	<!-- /.contacts_wrap -->
    <?php
    }
}

// Copyright area
$copyright_style = organics_get_custom_option('show_copyright_in_footer');
if (!organics_param_is_off($copyright_style)) {
    ?>
    <div class="copyright_wrap copyright_style_<?php echo esc_attr($copyright_style); ?>  scheme_<?php echo esc_attr(organics_get_custom_option('copyright_scheme')); ?>">
        <div class="copyright_wrap_inner">
            <div class="content_wrap<?php if (!organics_param_is_off($footer_show) && is_active_sidebar($sidebar_name)) echo ' copyright_line'; else ''; ?>">

                <?php
				if ($copyright_style == 'menu') {
					if (($menu = organics_get_nav_menu('menu_footer'))!='') {
						echo trim($menu);
					}
				} else if ($copyright_style == 'socials') {
					echo trim(organics_sc_socials(array('size'=>"tiny", 'shape'=>"round")));
				}
                ?>
                <div class="copyright_text"><?php echo force_balance_tags(do_shortcode(organics_get_custom_option('footer_copyright'))); ?></div>
                <?php
                if ($copyright_style == 'emailer') {
                    echo trim(organics_sc_emailer(array('open'=>"no")));
                }
                ?>
            </div>
        </div>
    </div>
<?php } ?>

</div>	<!-- /.page_wrap -->

</div>		<!-- /.body_wrap -->

<?php if ( !organics_param_is_off(organics_get_custom_option('show_sidebar_outer')) ) { ?>
    </div>	<!-- /.outer_wrap -->
<?php } ?>

<?php
if (organics_get_custom_option('show_theme_customizer')=='yes') {
    require_once organics_get_file_dir('core/core.customizer/front.customizer.php');
}
?>

<a href="#" class="scroll_to_top icon-up" title="<?php esc_attr_e('Scroll to top', 'organics'); ?>"></a>

<div class="custom_html_section">
    <?php echo force_balance_tags(organics_get_custom_option('custom_code')); ?>
</div>

<?php echo force_balance_tags(organics_get_custom_option('gtm_code2')); ?>

<?php wp_footer(); ?>

</body>
</html>