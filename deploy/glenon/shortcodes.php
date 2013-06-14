<?php
/**
* @package Skeleton WordPress Theme Framework
* @subpackage skeleton
* @author Simple Themes - www.simplethemes.com
**/
global $content;
$content = wpautop(trim($content));

function mas_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'mas_one_third');

function mas_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'mas_one_third_last');

function mas_two_thirds( $atts, $content = null ) {
   return '<div class="two_thirds">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_thirds', 'mas_two_thirds');

function mas_two_thirds_last( $atts, $content = null ) {
   return '<div class="two_thirds last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_thirds_last', 'mas_two_thirds_last');

// 1-4 col 

function mas_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'mas_one_half');


function mas_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'mas_one_half_last');


function mas_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'mas_one_fourth');


function mas_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'mas_one_fourth_last');

function mas_three_fourths( $atts, $content = null ) {
   return '<div class="three_fourths">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourths', 'mas_three_fourths');


function mas_three_fourths_last( $atts, $content = null ) {
   return '<div class="three_fourths last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fourths_last', 'mas_three_fourths_last');


function mas_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'mas_one_fifth');

function mas_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'mas_two_fifth');

function mas_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'mas_three_fifth');

function mas_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'mas_four_fifth');

//

function mas_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fifth_last', 'mas_one_fifth_last');

function mas_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_fifth_last', 'mas_two_fifth_last');

function mas_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fifth_last', 'mas_three_fifth_last');

function mas_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('four_fifth_last', 'mas_four_fifth_last');

// 1-6 col 

// one_sixth
function mas_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'mas_one_sixth');

function mas_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_sixth_last', 'mas_one_sixth_last');

// five_sixth
function mas_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'mas_five_sixth');

function mas_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('five_sixth_last', 'mas_five_sixth_last');


// Callouts

function mas_callout( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'width' => '',
		'align' => ''
    ), $atts));
	if($width != '' ) {
		return '<div class="cta float-'.$align.'" style="width:'.$width.'px" >' .$content. '</div><div class="clear"></div>';
	} else {
		return '<div class="cta float-'.$align.'">' .$content. '</div><div class="clear"></div>';
	}
}
add_shortcode('callout', 'mas_callout');



// Buttons
function mas_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'size' => 'medium',
		'color' => '',
		'target' => '_self',
		'align' => 'right'
    ), $atts));	
	
	return '<div class="button shortcode '.$size.' '. $align.'">
				<a target="'.$target.'" class="button '.$color.'" href="'.$link.'">'.$content.'</a>
			</div>';
}
add_shortcode('button', 'mas_button');


// Tabs
add_shortcode( 'tabgroup', 'mas_tabgroup' );

function mas_tabgroup( $atts, $content ){
	
$GLOBALS['tab_count'] = 0;
do_shortcode( $content );

if( is_array( $GLOBALS['tabs'] ) ){
	
foreach( $GLOBALS['tabs'] as $tab ){
$tabs[] = '<li><a href="#'.$tab['id'].'">'.$tab['title'].'</a></li>';
$panes[] = '<li id="'.$tab['id'].'Tab">'.$tab['content'].'</li>';
}
$return = "\n".'<!-- the tabs --><div class="this-tab"><ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" --><div class="tabs-content"><ul class="tabs-content">'.implode( "\n", $panes ).'</ul></div></div>'."\n";
}
return $return;

}

add_shortcode( 'tab', 'mas_tab' );
function mas_tab( $atts, $content ){
extract(shortcode_atts(array(
	'title' => '%d',
	'id' => '%d'
), $atts));

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array(
	'title' => sprintf( $title, $GLOBALS['tab_count'] ),
	'content' =>  do_shortcode($content),
	'id' =>  $id );

$GLOBALS['tab_count']++;
}


// Toggle
function mas_toggle( $atts, $content = null ) {
	extract(shortcode_atts(array(
		 'title' => '',
		 'style' => 'list',
		 'size' => ''
    ), $atts));

	return '<div class="'.$style.'"><p class="trigger '.$size.'"><a href="#">' .$title. '</a></p>
				<div class="toggle_container"><div class="block no-br">' .$content. '</div></div></div>';
	}
add_shortcode('toggle', 'mas_toggle');


// Accordion
function mas_accordion( $atts, $content = null ) {
	extract(shortcode_atts(array(
		 'number' => '',
		 'title' => ''
    ), $atts));

	return '<div class="accButton"><span class="number">' .$number. '</span><span>' .$title. '</span></div>
				<div class="accContent"><div class="block no-br">' .$content. '</div></div>';
	}
add_shortcode('accordion', 'mas_accordion');


/*-----------------------------------------------------------------------------------*/
// Latest Posts
// Example Use: [latest excerpt="true" thumbs="true" width="50" height="50" num="5" cat="8,10,11"]
/*-----------------------------------------------------------------------------------*/

function mas_latest($atts, $content = null) {
	extract(shortcode_atts(array(
	"offset" => '',
	"num" => '5',
	"thumbs" => 'false',
	"thumbsize" => 'thumbnail',
	"excerpt" => 'false',
	"length" => '10',
	"morelink" => '',
	"type" => 'post',
	"parent" => '',
	"cat" => '',
	"orderby" => 'date',
	"order" => 'DESC',
	"taxonomy" => '',
	"terms" => ''
	), $atts));
	global $post;
	
	if ( $taxonomy == '' && $terms == '' ) {
	$do_not_duplicate[] = $post->ID;
	$args = array(
	  'post__not_in' => $do_not_duplicate,
		'cat' => $cat,
		'post_type' => $type,
		'post_parent' => $parent,
		'showposts' => $num,
		'orderby' => $orderby,
		'offset' => $offset,
		'order' => $order
		);	
	} else {
	$do_not_duplicate[] = $post->ID;
	$args = array(
	  'post__not_in' => $do_not_duplicate,
		'showposts' => $num,
		'orderby' => $orderby,
		'offset' => $offset,
		'order' => $order,
		$taxonomy => $terms
		);
	}
	// query
	$myposts = new WP_Query($args);
	
	// container
	$result='<div class="latestposts clearfix category-'.$cat.'">';

	while($myposts->have_posts()) : $myposts->the_post();
		// item
		$result.='<div class="latest-item clearfix"><div>';
		
		// thumbnail
		if (has_post_thumbnail()) {
			$result .= '<div>'.get_the_post_thumbnail($post->ID, $thumbsize ).'</div>';
		}
		
		// title
		if ( $excerpt == 'true' && strlen($post->post_title) > 36 ) {
			$result.='<h4><a href="'.get_permalink().'">'.substr(the_title($before = '', $after = '', false), 0, 35) . '...</a></h4>';
		} else {
			$result.='<h4><a href="'.get_permalink().'">'.the_title("","",false).'</a></h4>';			
		}

		// excerpt		
		if ($excerpt == 'true') {
			// allowed tags in excerpts
			$allowed_tags = '<a>,<i>,<em>,<b>,<strong>,<ul>,<ol>,<li>,<blockquote>,<img>,<span>,<p>';
		 	// filter the content
			$text = preg_replace('/\[.*\]/', '', strip_tags(get_the_excerpt(), $allowed_tags));
			// remove the more-link
			$pattern = '/(<a.*?class="more-link"[^>]*>)(.*?)(<\/a>)/';
			// display the new excerpt
			$content = preg_replace($pattern,"", $text);
			$result.= '<div class="latest-excerpt">'.mas_limit_words($content,$length).'</div>';
		}
		
		// excerpt		
		if ($morelink) {
			$result.= '<a class="more-link" href="'.get_permalink().'">'.$morelink.'</a>';
		}
		
		// item close
		$result.='</div></div>';
  
	endwhile;
		wp_reset_postdata();
	
	// container close
	$result.='</div>';
	return $result;
}
add_shortcode("latest", "mas_latest");

// Example Use: [latest excerpt="true" thumbs="true" width="50" height="50" num="5" cat="8,10,11"]

/*-----------------------------------------------------------------------------------*/
// Creates an additional hook to limit the excerpt
/*-----------------------------------------------------------------------------------*/

function mas_limit_words($string, $word_limit) {
	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character
	$words = explode(' ', $string);
	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character
	$word_limit = '15';
	return implode(' ', array_slice($words, 0, $word_limit));
}


// Related Posts - [related_posts]
add_shortcode('related_posts', 'arapah_related_posts');
function arapah_related_posts( $atts ) {
	extract(shortcode_atts(array(
	    'limit' => '5',
	), $atts));

	global $wpdb, $post, $table_prefix;

	if ($post->ID) {
		$retval = '<div class="mas_relatedposts">';
		$retval .= '<h4>Related Posts</h4>';
		$retval .= '<ul>';
 		// Get tags
		$tags = wp_get_post_tags($post->ID);
		$tagsarray = array();
		foreach ($tags as $tag) {
			$tagsarray[] = $tag->term_id;
		}
		$tagslist = implode(',', $tagsarray);

		// Do the query
		$q = "SELECT p.*, count(tr.object_id) as count
			FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE tt.taxonomy ='post_tag' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id  = p.ID AND tt.term_id IN ($tagslist) AND p.ID != $post->ID
				AND p.post_status = 'publish'
				AND p.post_date_gmt < NOW()
 			GROUP BY tr.object_id
			ORDER BY count DESC, p.post_date_gmt DESC
			LIMIT $limit;";

		$related = $wpdb->get_results($q);
 		if ( $related ) {
			foreach($related as $r) {
				$retval .= '<li><a title="'.wptexturize($r->post_title).'" href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></li>';
			}
		} else {
			$retval .= '
	<li>No related posts found</li>';
		}
		$retval .= '</ul>';
		$retval .= '</div>';
		return $retval;
	}
	return;
}

// Break
function mas_break( $atts, $content = null ) {
	return '<div class="clear"></div>';
}
add_shortcode('clear', 'mas_break');


// Line Break
function mas_linebreak( $atts, $content = null ) {
	return '<hr /><div class="clear"></div>';
}
add_shortcode('clearline', 'mas_linebreak');