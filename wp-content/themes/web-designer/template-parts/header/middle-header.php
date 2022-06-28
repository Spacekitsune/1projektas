<?php
/**
 * The template part for Middle Header
 *
 * @package Web Designer
 * @subpackage web-designer
 * @since web-designer 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-9">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('web_designer_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('web_designer_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('web_designer_tagline_hide_show',true) != ''){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="<?php if(get_theme_mod('web_designer_talk_btn_url') != '' || get_theme_mod('web_designer_talk_btn_text') != ''){ ?>col-lg-7 col-md-5<?php } else {?> col-lg-9 col-md-8 <?php }?> col-3 align-self-center">
        <?php get_template_part('template-parts/header/navigation'); ?>
      </div>
      <?php if(get_theme_mod('web_designer_talk_btn_url') != '' || get_theme_mod('web_designer_talk_btn_text') != ''){ ?>
        <div class="col-lg-2 col-md-3 talk-btn align-self-center text-md-end text-center mt-md-0 mt-3">
          <a href="<?php echo esc_url(get_theme_mod('web_designer_talk_btn_url')); ?>"><?php echo esc_html(get_theme_mod('web_designer_talk_btn_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('web_designer_talk_btn_text')); ?></span></a>
        </div>
      <?php }?> 
    </div>
  </div>
</div>