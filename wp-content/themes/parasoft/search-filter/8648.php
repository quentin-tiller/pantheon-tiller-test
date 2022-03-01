<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */
?>
<section class="resources-sec" style="background-color:#fff;">
    <div class="resources-wrap">
        <div class="container">
            <div class="row">
                <?php
                global $post;
                $count = 1;
                $countId = 1;
                if ($query->have_posts()):
                    ?>
                    <?php
                    while ($query->have_posts()):
                        $query->the_post();
                        //$id = $query->post->ID;
                        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                        if ($image_url) {
                            $imageurl = $image_url[0];
                        } else {
                            $imageurl = get_template_directory_uri() . '/images/no-img-available.png';
                        }
                        $add_read_time = get_field('add_read_time');

                        if ($count % 6 == 1) {
                            echo "<div class='scroll-sec' id='scroll-".$countId."'>";
                        }
                        ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 blog-list">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="blog-list-bg-wrap">
                                        <a href ="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                            <div class="blog-list-bg" style="background-image:url('<?php echo $imageurl; ?>');">
                                                <!--                        
                                                <div class="blog-list-bg-main">
                                                        <div class="blog-list-bg-cont">
                                                                <h3><?php //echo wp_trim_words( get_the_title(), 12, '' );              ?></h3>
                                                        </div>
                                                </div>
                                                -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="blog-list-cont-wrap">
                                        <div class="blog-list-cont">
                                            <h2><a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
                                            <p><?php echo wp_trim_words(get_the_excerpt(), 39, '...'); ?><a href="<?php echo get_permalink($id); ?>" title="Keep reading">Keep reading</a></p>
                                        </div>
                                    </div>
                                    <div class="blog-read-text">
                                        <?php echo do_shortcode('[rt_reading_time label="Reading Time:" postfix="minutes" postfix_singular="minute"]'); ?>
                                    </div>
                                    <?php
                                    if ($add_read_time) {
                                        //echo '<div class="blog-read-text"><span>'.$add_read_time.' read</span></div>';
                                    }
                                    ?>	
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($count % 6 == 0) {
                            echo "</div>";
                        }
                        $count++;
                        $countId++;
                    endwhile;
                    ?>
                    <?php if ($query->max_num_pages > 1): ?>    
                        <div class="pagination-list">
                            <div class="pagination-wrap">
                                <?php
                                echo paginate_links(array(
                                    'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                                    'total' => $query->max_num_pages,
                                    'current' => max(1, get_query_var('paged')),
                                    'format' => '?paged=%#%',
                                    'show_all' => false,
                                    'type' => 'plain',
                                    'end_size' => 2,
                                    'mid_size' => 1,
                                    'prev_next' => true,
                                    'prev_text' => sprintf('<i></i> %1$s', __('Newer Posts', 'text-domain')),
                                    'next_text' => sprintf('%1$s <i></i>', __('Older Posts', 'text-domain')),
                                    'add_args' => false,
                                    'add_fragment' => '',
                                ));
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p><?php echo "No Results Found"; ?></p>
                    </div>
                <?php
                endif;
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>    
</section>