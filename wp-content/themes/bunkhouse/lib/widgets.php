<?php
//Register widgets
//Register the sidebar
if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'id' => 'sidebar1',
		'description' => 'This is the main sidebar',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		)
	);
}

if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Footer 1',
		'id' => 'footer1',
		'description' => 'This is the left footer widget',
		'before_widget' => '<div class="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		)
	);
}
if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Footer 2',
		'id' => 'footer2',
		'description' => 'This is the 2nd footer widget',
		'before_widget' => '<div class="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		)
	);
}
if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Footer 3',
		'id' => 'footer3',
		'description' => 'This is the 3rd footer widget',
		'before_widget' => '<div class="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		)
	);
}

if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Footer 4',
		'id' => 'footer4',
		'description' => 'This is the 4th footer widget',
		'before_widget' => '<div class="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		)
	);
}

