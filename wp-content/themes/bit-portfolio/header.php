<?php 

$logo_text = get_theme_mod('bit_portfolio_logo_text');
$copyright_text_before_date = get_theme_mod('bit_portfolio_copyright_text_before_date');
$copyright_text_after_date = get_theme_mod('bit_portfolio_copyright_text_after_date');

$links_target = get_theme_mod( 'bit_portfolio_header_links_target');

$facebook_url = get_theme_mod('bit_portfolio_item_facebook');
$twitter_url = get_theme_mod('bit_portfolio_item_twitter');
$instagram_url = get_theme_mod('bit_portfolio_item_instagram');
$linkedin_url = get_theme_mod('bit_portfolio_item_linkedin');
?>

<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title(); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

        <?php wp_head(); ?>

    </head>
<body <?php body_class(); ?> >
    <?php wp_body_open(); ?>
<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo"><a href="<?php echo esc_url(get_home_url()); ?>"><?php echo esc_html($logo_text); ?><span>.</span></a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<?php 
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1'
                    ));
                ?>
			</nav>

			<div class="colorlib-footer">
				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			  <?php echo esc_html($copyright_text_before_date); ?> 
              &copy;<script>document.write(new Date().getFullYear());</script> 
              <?php echo esc_html($copyright_text_after_date); ?>
                
              
                <?php if( !empty($facebook_url) || !empty($twitter_url) || !empty($instagram_url) || !empty($linkedin_url)): ?>    
                    <?php
                        $target_attribute = ''; 
                        if($links_target)  {
                            $target_attribute = ' target="_blank"';
                        }  
                    ?>
                    <ul>
                        <?php if(!empty($facebook_url)): ?>
                            <li><a href="<?php echo esc_url($facebook_url);?>" <?php echo $target_attribute;?>><i class="icon-facebook"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty($twitter_url)): ?>
                            <li><a href="<?php echo esc_url($twitter_url);?>" <?php echo  $target_attribute;?>><i class="icon-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty($instagram_url)): ?>
                            <li><a href="<?php echo esc_url($instagram_url);?>" <?php echo $target_attribute;?>><i class="icon-instagram"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty($linkedin_url)): ?>
                            <li><a href="<?php echo esc_url($linkedin_url);?>" <?php echo $target_attribute;?>><i class="icon-linkedin"></i></a></li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->      