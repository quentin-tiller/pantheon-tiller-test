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
/* 798 - blog */
?>
<div class="resources-sec alt-v2 alt-news">
    <h2>Latest News</h2>
    <div class="resources-wrap">
        <div class="container">
            <div class="row">
                <?php
                global $post;
                if ($query->have_posts()):

                    while ($query->have_posts()):
                        $query->the_post();
                        $id = $query->post->ID;
                        $image_url = get_the_post_thumbnail_url($query->post, 'large');
                        $date = date('M j, Y', strtotime(get_the_date()));
                        $end_date = get_field('end_date');
                        if (!empty($end_date)):
                            $endDate = ' - ' . $end_date;
                        else:
                            $endDate = '';
                        endif;
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
                            <div class="resources-list">
                                <a href="<?php echo get_permalink($id); ?>" title="<?php echo get_the_title(); ?>">
                                    <div class="resources-top">
                                        <div class="content">
                                            <div class="resources-info">
                                                <span class="resource_type">News</span>
                                                <span class="rt"><?php echo $date.$endDate; ?></span>
                                            </div>
                                            <h3><?php echo get_the_title(); ?></h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>

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
                <?php endif; wp_reset_query();?>
            </div>
        </div>
    </div>
</div>