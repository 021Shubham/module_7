<?php

/**
 * Display single login
 *
 * @since v.1.0.0
 * @author themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

if ( ! defined( 'ABSPATH' ) )
	exit;


if(!tutor_utils()->get_option('enable_tutor_native_login', null, true, true)) {
    // Refer to login oage
    header('Location: '.wp_login_url($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
    exit;
}
    
tutor_utils()->tutor_custom_header();
$login_url = tutor_utils()->get_option('enable_tutor_native_login', null, true, true) ? '' : wp_login_url(tutor()->current_url);
?>

<?php do_action('tutor/template/login/before/wrap'); ?>
<div <?php tutor_post_class('tutor-page-wrap'); ?>>
    <div class="tutor-template-segment tutor-login-wrap">

        <div class="tutor-login-form-wrapper">
            <div class="tutor-fs-5 tutor-color-black tutor-mb-32">
                <?php esc_html_e( 'Login with your EPR credentials', 'tutor' ); ?>
            </div>
            <?php
                // load form template.
                $login_form = trailingslashit( tutor()->path ) . 'templates/login-form.php';
                tutor_load_template_from_custom_path(
                    $login_form,
                    false
                );
            ?>
            <?php do_action("tutor_after_login_form"); ?>
        </div>
    </div>
</div>
<style>
    .ast-page-builder-template .site-content > .ast-container {
    align-content: center;
    max-width: 100%;
    align-items: center;
    justify-content: center;
    padding: 0;
    height: 100vh;
    background-image: url("https://i.ibb.co/cy0w8YK/epr.png")
    background-repeat: no-repeat;
    background-size:cover;
    background-position: center;

}

:root{
    overflow: hidden;
}

.tutor-login-wrap{
    background: #c8d3c5e6;
    border-radius: 0px;
    padding: 40px 40px;
}
.elementor-765 .elementor-element.elementor-element-29a14566:not(.elementor-motion-effects-element-type-background), .elementor-765 .elementor-element.elementor-element-29a14566 > .elementor-motion-effects-container > .elementor-motion-effects-layer {
    display: none;
}
.elementor-23 .elementor-element.elementor-element-f7e9792 > .elementor-container {
 
    display: none;
}

.tutor-wrap .tutor-login-wrap {
    margin-bottom: 70px;
    display: block;
    float: right;
    margin-right: 4em;
    max-width: 27%;
}

.ast-container {
    height: 100vh;
    align-items: center;

}


section.elementor-section.elementor-top-section.elementor-element.elementor-element-3b74f0ae.elementor-reverse-mobile.elementor-section-boxed.elementor-section-height-default.elementor-section-height-default {
    display: none;
}
.site-content .ast-container {
    display: flex;
    width: 100vh;
    justify-content: center;
    align-content: center;
}

.elementor-column-gap-default>.elementor-column>.elementor-element-populated {
    padding: 10px;
    display: none;
}
#page .tutor-wrap {
    padding-top: 50px;
    padding-bottom: 50px;
    background-image: url(https://i.postimg.cc/tRtHg4t4/epr.png);
    background-repeat: no-repeat;
    background-size: cover;
    height:100vh;
    overflow: hidden;
}

#page .site-content {
    flex-grow: 1;
    background-image: url(https://www.twicetheice.com/wp-content/uploads/water-bottle-pollution-min-1024x666.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

</style>
<?php 
    do_action('tutor/template/login/after/wrap');
    //tutor_load_template_from_custom_path(tutor()->path . '/views/modal/login.php');
    tutor_utils()->tutor_custom_footer();
?>
