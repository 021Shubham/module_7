<?php

/**
 * Template for displaying courses
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.5.8
 */
tutor_utils()->tutor_custom_header();

$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if(str_contains($url,"?")){
	$splitted_url = explode("?", $url);
	if (count($splitted_url) > 1 ){
		$url_parameters = $splitted_url[1];
		$exploded_parameters = explode("&",$url_parameters);
		$get_arr = [];
		$i = 1;	//	0 is hardcoded, let it start from one.
		foreach($exploded_parameters as $value){
			$splitted_values = explode("=", $value);
			if (!array_key_exists($splitted_values[0], $get_arr) || $splitted_values[0] == 'tutor-course-filter-category') {
				$get_arr[$splitted_values[0]] = $splitted_values[1];				
				if(str_contains($splitted_values[0], "tutor-course-filter-category%5B%5D")){
					$category_arr[0] = $splitted_values[1];
				}
			} else {
				if (str_contains($splitted_values[0], "tutor-course-filter-category%5B%5D") && array_key_exists($splitted_values[0], $get_arr)) {
					$category_arr[$i] = $splitted_values[1];
					$i++;
				}
			}
		}
		if(array_key_exists('tutor-course-filter-category%5B%5D', $get_arr)){
			unset($get_arr['tutor-course-filter-category%5B%5D']);
		}
		isset ($category_arr) ? ($get_arr['tutor-course-filter-category'] = $category_arr):'';
		$_GET = isset($get_arr) ? $get_arr : $_GET;
	}
}

if ( isset( $_GET['course_filter'] ) ) {
	$filter = (new \Tutor\Course_Filter(false))->load_listing( $_GET, true );
	query_posts( $filter );
}

	
// Load the 
tutor_load_template('archive-course-init', array_merge($_GET, array(
	'course_filter' => (bool) tutor_utils()->get_option('course_archive_filter', false),
	'supported_filters' => tutor_utils()->get_option('supported_course_filters', array()),
	'loop_content_only' => false
)));

tutor_utils()->tutor_custom_footer(); 
