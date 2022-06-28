<?php 

$contact_form_shortcode = get_field('contact_form_shortcode');

$contact_title = get_field('contact_title');
$contact_address = get_field('contact_address');
$contact_phone = get_field('contact_phone');
$contact_email = get_field('contact_email');

?>
<?php get_header(); ?>
		<div id="colorlib-main">
			<section class="ftco-section contact-section">
	      <div class="container">
	        <div class="row d-flex mb-5 contact-info">
	          <div class="col-md-12 mb-4">
	            <h2 class="h4 font-weight-bold"><?php echo $contact_title ?></h2>
	          </div>
	          <div class="w-100"></div>
	          <div class="col-md-3">
	            <p><span>Address:</span> <?php echo $contact_address ?></p>
	          </div>
	          <div class="col-md-3">
	            <p><span>Phone:</span> <?php echo $contact_phone; ?></p>
	          </div>
	          <div class="col-md-3">
	            <p><span>Email:</span> <?php echo $contact_email; ?></p>
	          </div>
	        </div>
	        <div class="row block-9">
	          <div class="col-md-6 order-md-last pr-md-5">
	            <!-- <form action="#">
	              <div class="form-group">
	                <input type="text" class="form-control" placeholder="Your Name">
	              </div>
	              <div class="form-group">
	                <input type="text" class="form-control" placeholder="Your Email">
	              </div>
	              <div class="form-group">
	                <input type="text" class="form-control" placeholder="Subject">
	              </div>
	              <div class="form-group">
	                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
	              </div>
	              <div class="form-group">
	                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
	              </div>
	            </form> -->

                <?php echo do_shortcode( $contact_form_shortcode ); ?>
	          
	          </div>

	          <div class="col-md-6">
	          </div>
	        </div>
	      </div>
	    </section>

  <?php get_footer(); ?>