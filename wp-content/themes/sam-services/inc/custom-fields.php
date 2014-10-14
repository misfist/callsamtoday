<?php

/******************************************************/
/******************** Custom Fields *******************/
/******************************************************/

if(function_exists("register_field_group")) {
	register_field_group(array (
		'id' => 'samservices_call-to-action',
		'title' => 'Call to Action',
		'fields' => array (
			array (
				'key' => 'field_cta_label',
				'label' => 'Label',
				'name' => 'cta-label',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Enter button text',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_cta_link',
				'label' => 'Link',
				'name' => 'cta-link',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'post',
					1 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>
