<?php
if(is_home()):
    $pid = get_option( 'page_for_posts' );
else:
    $pid = get_the_ID();
endif;

    $fields = get_field_objects($pid);
    $flex_field = 'single_page_content_blocks';
    $fid = $fields[$flex_field]['ID'];
    if (isset($fid) && $fid != ''):
        $sections = array();
        $mydata = get_post_field('post_content', $fid);
        $mydata = unserialize($mydata);
        $newdata = $mydata['layouts'];
        foreach ($newdata as $l):
            array_push($sections, $l['name']);
        endforeach;
        if (have_rows($flex_field,$pid)) :
            while (have_rows($flex_field,$pid)) : the_row();
                $rowlayout = get_row_layout();
                if (in_array($rowlayout, $sections)) :
                    get_template_part("template-parts/content-module/" . $rowlayout);
                endif;
            endwhile;
        endif;
    endif;
?>