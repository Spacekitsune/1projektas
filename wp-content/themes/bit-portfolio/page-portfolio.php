<?php get_header(); //pasiima header php ?>
		<div id="colorlib-main">
			<section class="ftco-section-2">
				<div class="photograhy">
					<div class="row no-gutters">

                        <?php 
                        
                            $query = new WP_Query(array(
                                'post_type' => 'works'
                            ));
                        
                            if($query->have_posts()) :
                        ?>
                            <?php while($query->have_posts()): 
                                $query->the_post();

                                $work_image = get_field("image_field", get_the_ID() );
                                $image_size = 'thumbnail';
                                ?>
                               
                                <div class="col-md-3">
                                <a href="#" class="photography-entry img d-flex justify-content-center align-items-center" 
                                style="background-image: url(<?php echo $work_image['url'] ?>);">
								<div class="overlay"></div>
								<div class="text text-center">
									<h3><?php the_title(); ?></h3>
									<span><?php echo get_field('git_hub_url', get_the_ID()); ?></span> 
                                    <!-- githubo url -->
								</div>
                                </a>
						    </div> 
                            <?php endwhile; ?>
                            <?php wp_reset_postdata();?>    


                         <?php endif; ?>       
					</div>
				</div>
			</section>
<?php get_footer(); //pasiima footer.php ?>