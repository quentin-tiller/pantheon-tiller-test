<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Parasoft
 * @since Microconstants 1.0
 */

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
$id         = get_the_ID();
$post_type = get_post_type($id);
  if($post_type == 'post'){
	 $postname = 'Blog';
	}
	elseif($post_type == 'webinar'){
	 $postname = 'Webinar';			 
	}
	elseif($post_type == 'video'){
	 $postname = 'Video';  	
	}
	elseif($post_type == 'white_paper'){
	 $postname = 'Whitepaper';  	
	}
	elseif($post_type == 'data_sheet'){
	 $postname = 'Datasheet';  	
	}
	elseif($post_type == 'case_studies'){
	 $postname = 'Case Study';  	
	}
	elseif($post_type == 'infographic'){
	 $postname = 'Infographic';  	
	}
	elseif($post_type == 'ebook'){
	 $postname = 'Ebook';  	
	}
	elseif($post_type == 'analyst_research'){
	 $postname = 'Analyst Research';
      }
	elseif($post_type == 'business_partner'){
	 $postname = 'Business Partner';
      }
	elseif($post_type == 'customer_journey'){
	 $postname = 'Customer Journey'; 
      }
	elseif($post_type == 'open_positions'){
	 $postname = 'Open Positions'; 
      }
	elseif($post_type == 'press_mention'){
	 $postname = 'Press Mention'; 
      }
	elseif($post_type == 'technology_partners'){
	 $postname = 'Technology Partner'; 
      }
	elseif($post_type == 'news'){
	 $postname = 'News';  
      }
	elseif($post_type == 'page'){
	 $postname = 'Page';  			 
	}else{
		$postname = $post_type;
	}
	
	$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

	if ( $image_url ) {
		$imageurl = $image_url[0];
	} else {
		$imageurl = get_template_directory_uri() . '/dist/assets/images/search-placeholder.jpg';
	}
?>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 search-results-list">
	<div class="search-bg" style="background-image:url('<?php echo $imageurl; ?>');"></div>
	<div class="search-title">
		<h3><a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo $postname; ?>: <?php echo get_the_title(); ?></a></h3>
	</div>
	<div class="search-cont">
		<?php the_excerpt(); ?>
	</div>
</div>

