<?php
/**
 * Template Name: Home
 * Description: A full-width template for homepage
 *
 * @package WordPress
 * @subpackage Akasha Nepal
 * @since Akasha Nepal 1.0
 */
get_header(); ?>
<?php if( have_rows('h_banner') ):
while( have_rows('h_banner') ) : the_row();
$hb_image = get_sub_field('hb_image');
$hb_description = get_sub_field('hb_description'); ?>
<section class="slider vh-75 bg-cover" style="background-image:url('<?php echo $hb_image['url'];?>') ;">
    <div class="container">
    </div>
</section>
<?php endwhile; endif; ?>

<?php $aboutID = 104;
$about_obj = get_post($aboutID); ?>
<section class="spacing__py spacing__mb bg-light about-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7">
                <div class="heading">
                    <h2>Akasha Academy</h2>
                </div>
                <div class="text-wrap">
                    <p class="mb-5"><?php echo wp_trim_words( $about_obj->post_content, 40, '...' ); ?></p>
                    <a href="<?php echo get_the_permalink($aboutID); ?>" class="btn btn-primary">About Us</a>
                </div>
            </div>
            <?php if(has_post_thumbnail($aboutID)){ 
                $featimg = get_the_post_thumbnail_url($aboutID, 'artwork_thumb');
            } else {
                $featimg = Akashanepal_IMAGES_URL.'/blog/blog-1.jpg';
            } ?>
            <div class="col-lg-3">
                <div class="image-wrap">
                    <img src="<?php echo $featimg;?>">
                </div>
            </div>
        </div>
    </div>
</section>

<?php if( have_rows('rb_items') ): ?>
<section class="spacing__mb feature-section">
    <div class="container">
        <div class="row">
            <?php while( have_rows('rb_items') ) : the_row();
            $rb_title = get_sub_field('rb_title');
            $rb_image = get_sub_field('rb_image'); ?>
            <div class="col-lg-3">
                <div class="card text-center border-0">
                    <figure class="card-image">
                        <img src="<?php echo $rb_image['url'];?>" alt="">
                    </figure>
                    <div class="card-body">
                        <h5 class="font-base"><?php echo $rb_title; ?></h5>
                    </div>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php $qb_image = get_field('qb_image'); 
$qb_description = get_field('qb_description');
$qb_title = get_field('qb_title'); 
if($qb_image): ?>
<section class="spacing__mb bg-cover vh-75 flex-v-center " style="background-image: url('<?php echo $qb_image['url'];?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-wrap text-center text-wrap__quote ">
                    <p class="fw-bold h5 mb-5 text-white">„<?php echo $qb_description;?>”
                    </p>
                    <h5 class="text-white">- <?php echo $qb_title;?></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if( have_rows('pl_items') ): ?>
<section class="spacing__mb">
    <div class="container">
        <div class="row">
            <?php while( have_rows('pl_items') ) : the_row();
            $pl_title = get_sub_field('pl_title');
            $pl_image = get_sub_field('pl_image');
            $pl_link = get_sub_field('pl_link'); ?>
            <div class="col-lg-4">
                <div class="thumbnail shadow">
                    <div class="thumbnail-image">
                        <img src="<?php echo $pl_image['url'];?>" alt="" class="img-fluid">
                    </div>
                    <div class="thumbnail-body">
                        <h4 class="thumbnail-title mb-4"><?php echo $pl_title;?></h4>
                        <a href="<?php echo $pl_link; ?>" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<section class=" bg-cover vh-85 position-relative" style="background-image: url('<?php echo Akashanepal_IMAGES_URL;?>/IMAGE.jpg');">
    <div class="container">
        <div class="floating-card bg-white__85">
            <h5 class="title">Akasha Traineeship</h5>
            <p>Get an insight into the social and ecological projects in Nepal and our commitment in Germany.</p>
            <a href="#" class="btn btn-primary"> Learn More</a>
        </div>
    </div>
</section>
<section class="spacing__mb bg-cover spacing__py bg-overlay overlay-white-85" style="background-image: url('<?php echo Akashanepal_IMAGES_URL;?>/IMAGE.jpg');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="media-card">
                    <div class="media-card__img">
                        <img src="<?php echo Akashanepal_IMAGES_URL;?>/IMG_9872 1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $args = [
    'post_type'        => 'testimonial',
    'posts_per_page'   => -1,
    'orderby'          => 'date',
    'order'            => 'ASC',
]; 
$testimonials = get_posts( $args ); 
if($testimonials): ?>
<section class="spacing__mb">
    <div class="container">
        <div class="heading">
            <h2>What Our Student Say</h2>
        </div>
        <!-- Slider main container -->
        <div class="swiper testimonials" id="testimonials">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php foreach($testimonials as $testimonial): 
                $upload_dir   = wp_upload_dir(); 
                //echo '<pre>', print_r( $upload_dir['baseurl'].'/2022/10/dummy.png');
                $t_subtitle = get_field('t_subtitle', $testimonial->ID);
                if(has_post_thumbnail($testimonial->ID)){ 
                    $testimonial_featimg = get_the_post_thumbnail_url($testimonial->ID, 'artwork_thumb');
                } else {
                    $testimonial_featimg = Akashanepal_IMAGES_URL.'/team/test-thumb1.jpg';
                } ?>
                <div class="swiper-slide">
                    <div class="card border-0 text-center ">
                        <div class="card-image">
                            <img src="<?php echo $testimonial_featimg; ?>" alt="">
                        </div>
                        <div class="card-body">
                            <p><?php echo $testimonial->post_content; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<section class="spacing__mb instagram-image__wrap">
    <div class="container-fluid p-0 text-center">
        <div class="row g-0 mb-5">
            <?php echo do_shortcode('[instagram-feed num=6 cols=3]');?>
        </div>
    </div>
</section>
<?php get_footer(); ?>