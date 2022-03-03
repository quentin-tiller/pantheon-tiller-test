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


	
				<div class="careers-list-wrap">
					<table>
						<thead>
							<tr>
								<th>Position</th>
								<th>Location</th>
							</tr>
						</thead>
						<tbody>
        <?php 
		global $post;
        if ($query->have_posts()): ?>
        <?php
            while ($query->have_posts()):
                $query->the_post();
                $id = $query->post->ID;
                $typesterms = wp_get_post_terms( get_the_ID(), 'location' );
					if( $typesterms ) {
					  $types_terms = array();
					  foreach( $typesterms as $term ) {
					   $types_terms[] = $term->name;
					  }
					 $catename = implode(', ', $types_terms); 
					}
            ?>
			
			<tr>
								<td><?php the_title(); ?></td>
								<td><?php echo $catename; ?></td>
								<td><a href="<?php the_permalink(); ?>">Apply <i>»</i></a></td>
              </tr>


      
           
        <?php endwhile; ?>
            <?php if($query->max_num_pages > 1): ?>    

                <div class="pagination-list">
                <?php 
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $query->max_num_pages,
                        'current'      => max( 1, get_query_var( 'paged' ) ),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 1,
                        'prev_next'    => true,
                        'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
                        'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
                        'add_args'     => false,
                        'add_fragment' => '',
                    ) );
                ?>
            </div>
      
            <?php endif; ?>
    <?php else: ?>
        <div class="col-12 text-center">
            <p><?php echo "No Results Found"; ?></p>
        </div>
    <?php endif; 
    wp_reset_query();
    ?>

</tbody>
					</table>
				</div>
		


