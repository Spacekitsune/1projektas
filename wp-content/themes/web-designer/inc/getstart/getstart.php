<?php
//about theme info
add_action( 'admin_menu', 'web_designer_gettingstarted' );
function web_designer_gettingstarted() {
	add_theme_page( esc_html__('About Web Designer', 'web-designer'), esc_html__('About Web Designer', 'web-designer'), 'edit_theme_options', 'web_designer_guide', 'web_designer_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function web_designer_admin_theme_style() {
	wp_enqueue_style('web-designer-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('web-designer-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'web_designer_admin_theme_style');

//guidline for about theme
function web_designer_mostrar_guide() { 
	//custom function about theme customizer
	$web_designer_return = add_query_arg( array()) ;
	$web_designer_theme = wp_get_theme( 'web-designer' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Web Designer', 'web-designer' ); ?> <span class="version"><?php esc_html_e( 'Version', 'web-designer' ); ?>: <?php echo esc_html($web_designer_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','web-designer'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Web Designer at 20% Discount','web-designer'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','web-designer'); ?> ( <span><?php esc_html_e('vwpro20','web-designer'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( WEB_DESIGNER_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'web-designer' ); ?></a>
			</div>
		</div>
   	</div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="web_designer_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'web-designer' ); ?></button>
			<button class="tablinks" onclick="web_designer_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'web-designer' ); ?></button>
			<button class="tablinks" onclick="web_designer_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'web-designer' ); ?></button>
			<button class="tablinks" onclick="web_designer_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'web-designer' ); ?></button>
		  	<button class="tablinks" onclick="web_designer_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'web-designer' ); ?></button>
		</div>

		<?php
			$web_designer_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$web_designer_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Web_Designer_Plugin_Activation_Settings::get_instance();
				$web_designer_actions = $plugin_ins->recommended_actions;
				?>
				<div class="web-designer-recommended-plugins">
				    <div class="web-designer-action-list">
				        <?php if ($web_designer_actions): foreach ($web_designer_actions as $key => $web_designer_actionValue): ?>
				                <div class="web-designer-action" id="<?php echo esc_attr($web_designer_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($web_designer_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($web_designer_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($web_designer_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','web-designer'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($web_designer_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'web-designer' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Web Designer is a free WordPress theme with elegant and sophisticated design for the theme and web developers, graphics designers, web development agencies, SEO and marketing companies, web design services, branding and application development, etc. Multiple companies can use it as a multipurpose theme. Its Minimal design makes your content pop and its expertly crafted design gives a perfect display of your services. The retina-ready and functionally advanced theme is also made responsive to work brilliantly across all the devices. The user-friendly design of the theme is very useful for beginners and for those who are not knowing how to code. It comes with a stunningly beautiful banner and various sections including Blog, Team, Testimonial section, etc. With personalization options provided, you can easily bring the changes to the layout. The design is also made SEO-friendly for bringing great results for your website in the SERP. There are clean and secure HTML codes for bringing an interactive design that performs well across various browsers and delivers a faster page load time. This modern theme is also made translation ready for supporting various languages. You will get a lot of social media icons and a robust design in this Bootstrap-based WP theme.','web-designer'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'web-designer' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'web-designer' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( WEB_DESIGNER_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'web-designer' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'web-designer'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'web-designer'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'web-designer'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'web-designer'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'web-designer'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( WEB_DESIGNER_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'web-designer'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'web-designer'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'web-designer'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( WEB_DESIGNER_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'web-designer'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'web-designer' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','web-designer'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=web_designer_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','web-designer'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=web_designer_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','web-designer'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=web_designer_service_section') ); ?>" target="_blank"><?php esc_html_e('Service Section','web-designer'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','web-designer'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','web-designer'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=web_designer_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','web-designer'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=web_designer_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','web-designer'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','web-designer'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','web-designer'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','web-designer'); ?></span><?php esc_html_e(' Go to ','web-designer'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','web-designer'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','web-designer'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','web-designer'); ?></span><?php esc_html_e(' Go to ','web-designer'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','web-designer'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','web-designer'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','web-designer'); ?> <a class="doc-links" href="<?php echo esc_url( WEB_DESIGNER_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','web-designer'); ?></a></p>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Web_Designer_Plugin_Activation_Settings::get_instance();
			$web_designer_actions = $plugin_ins->recommended_actions;
			?>
				<div class="web-designer-recommended-plugins">
				    <div class="web-designer-action-list">
				        <?php if ($web_designer_actions): foreach ($web_designer_actions as $key => $web_designer_actionValue): ?>
				                <div class="web-designer-action" id="<?php echo esc_attr($web_designer_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($web_designer_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($web_designer_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($web_designer_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','web-designer'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($web_designer_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'web-designer' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','web-designer'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','web-designer'); ?></span></b></p>
	              	<div class="web-designer-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','web-designer'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

              	<div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'web-designer' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','web-designer'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=web_designer_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','web-designer'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','web-designer'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=web_designer_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','web-designer'); ?></a>
							</div>
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=web_designer_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','web-designer'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','web-designer'); ?></a>
							</div> 
						</div>
					</div>
				</div>			
					
	        </div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Web_Designer_Plugin_Activation_Settings::get_instance();
			$web_designer_actions = $plugin_ins->recommended_actions;
			?>
				<div class="web-designer-recommended-plugins">
				    <div class="web-designer-action-list">
				        <?php if ($web_designer_actions): foreach ($web_designer_actions as $key => $web_designer_actionValue): ?>
				                <div class="web-designer-action" id="<?php echo esc_attr($web_designer_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($web_designer_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($web_designer_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($web_designer_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'web-designer' ); ?></h3>
				<hr class="h3hr">
				<div class="web-designer-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','web-designer'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'web-designer' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','web-designer'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=web_designer_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','web-designer'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','web-designer'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=web_designer_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','web-designer'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=web_designer_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','web-designer'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','web-designer'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'web-designer' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Web Design Agency WordPress Theme is a gorgeous theme that will give you a stunning portfolio for your web designing company or as a website developer. It is specifically geared towards web developers, application developers, and designers. The best thing about this theme is its default design which is just perfect to get online and still provides you with the freedom to customize it according to your personal style using the customization options. View the changes live with the Live Theme Customizer as it helps you to check the things at the last minute before you push them live. WP Web Design Agency WordPress Theme includes a wonderful slider having the capability to put full-width images to display. You may also upload videos of your work to showcase the kind of work you do. Even if you are looking to go with the demo, it will do a great job in providing a professional website for your web designing agency.','web-designer'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( WEB_DESIGNER_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'web-designer'); ?></a>
					<a href="<?php echo esc_url( WEB_DESIGNER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'web-designer'); ?></a>
					<a href="<?php echo esc_url( WEB_DESIGNER_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'web-designer'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'web-designer' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'web-designer'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'web-designer'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'web-designer'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'web-designer'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'web-designer'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'web-designer'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'web-designer'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'web-designer'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'web-designer'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'web-designer'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'web-designer'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'web-designer'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'web-designer'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'web-designer'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'web-designer'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'web-designer'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'web-designer'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'web-designer'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'web-designer'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'web-designer'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'web-designer'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( WEB_DESIGNER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'web-designer'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'web-designer'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'web-designer'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( WEB_DESIGNER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'web-designer'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'web-designer'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'web-designer'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( WEB_DESIGNER_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'web-designer'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'web-designer'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'web-designer'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( WEB_DESIGNER_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'web-designer'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'web-designer'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'web-designer'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( WEB_DESIGNER_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','web-designer'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'web-designer'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'web-designer'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( WEB_DESIGNER_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'web-designer'); ?></a>
				</div>
		  	</div>
		</div>

	</div>
</div>

<?php } ?>