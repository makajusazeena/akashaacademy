<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package akashanepal
 */
$aboutID = 104;
$about_obj = get_post($aboutID);
$email = get_field('_email', 'option'); 
$phone_no = get_field('_phone_no', 'option');
$address = get_field('_address', 'option'); ?>
<footer class="footer spacing__py">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-widget pe-lg-5">
                    <h4 class="footer-widget__title text-white">
                        <?php echo $about_obj->post_title; ?>
                    </h4>
                    <p>
                        <?php echo $about_obj->post_content; ?>
                    </p>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="footer-widget">
                    <h4 class="footer-widget__title">Quick Links</h4>
                    <?php wp_nav_menu( array( 
			            'theme_location' => 'quick-link',
			            'menu_class'=>'mb-0 ps-0',
			            'container'=>'ul',
			            ) ); ?>
                </div>
            </div>  
            <?php $facebook = get_field('_facebook', 'option');
			$twitter = get_field('_twitter', 'option');
			$linkedin = get_field('_linkedin', 'option');
			$instagram = get_field('_instagram', 'option'); ?>
			<div class="col-lg-2">
				<div class="footer-widget">
	                <h4 class="footer-widget__title text-white">Follow Us</h4>
			        <ul class="inline-list social-links ps-0">
			            <?php if($facebook): ?>
			            <li>
			                <a href="<?php echo $facebook; ?>" class="social-links__icon" target="_blank">
			                    <i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
			            </li>
			            <?php endif; ?>
			            <?php if($twitter): ?>
			            <li>
			                <a href="<?php echo $twitter; ?>" class="social-links__icon" target="_blank">
			                    <i class="fa-brands fa-twitter" aria-hidden="true"></i></a>
			            </li>
			            <?php endif; ?>
			            <?php if($instagram): ?>
			            <li>
			                <a href="<?php echo $instagram; ?>" class="social-links__icon" target="_blank">
			                    <i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
			            </li>
			            <?php endif; ?>
			            <?php if($linkedin): ?>
			            <li>
			                <a href="<?php echo $linkedin; ?>" class="social-links__icon" target="_blank">
			                    <i class="fa-brands fa-linkedin" aria-hidden="true"></i></a>
			            </li>
			            <?php endif; ?>
			        </ul>
			    </div>
			</div>
            
            <div class="col-lg-3">
                <div class="footer-widget">
                    <h4 class="footer-widget__title text-white">Contact Us</h4>
                    <ul class="footer-widget__contact">
                        <?php if($phone_no): ?>
                        <li><i class="fa-solid fa-phone"></i>
                            <a href="tel: <?php echo $phone_no;?>">
                                <?php echo $phone_no;?></a>
                        </li>
                        <?php endif; ?>
                        <?php if($email): ?>
                        <li><i class="fa-solid  fa-envelope"></i>
                            <a href="mailto: <?php echo $email;?>">
                                <?php echo $email;?></a>
                        </li>
                        <?php endif; ?>
                        <?php if($address): ?>
                        <li><i class="fa-solid fa-location-dot"></i>
                            <?php echo $address;?>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>