<?php
/*
Widget Name: MusicMacho Timer Widget
Description: 
*/

class musicmacho_timer_widget extends SiteOrigin_Widget {
	function __construct() {
		
		parent::__construct(
			'timer-widget',
			__('MusicMacho Timer', 'musicmacho'),
			array(
				'description' => __('Set Countdown Timer.', 'musicmacho'),
				//'panels_icon' => 'dashicons dashicons-clock',
				'panels_groups' => array('musicGroup')
			),
			array(

			),
			$form_options = array(
				'musicmacho_title' => array(
					'type' => 'text',
					'label' => __('Title of Event','musicmacho'),
				),
				'musicmacho_date_time' => array(
					'type' => 'text',
					'label' => __('Date and Time of event','musicmacho'),
					'description' => __('"8 September 2020 09:00:00" please follow this formate only','musicmacho'),
				),
				'musicmacho_timer_text_color' => array(
					'type'          => 'color',
					'sanitize'      => 'sanitize_text_fields',
					'label'         => __( 'Select Text color', 'musicmacho' ),
				),
				'musicmacho_timer_text_hover_color' => array(
					'type'          => 'color',
					'sanitize'      => 'sanitize_text_fields',
					'label'         => __( 'Select Text Hover color', 'musicmacho' ),
				),
				'musicmacho_timer_background_color' => array(
					'type'          => 'color',
					'sanitize'      => 'sanitize_text_fields',
					'label'         => __( 'Select Background color', 'musicmacho' ),
				),
				'musicmacho_timer_align' => array(
					'type'          => 'select',
					'sanitize'      => 'sanitize_text_fields',
					'label'         => __( 'Alignment', 'musicmacho' ),
					'default'		=> 'center',
					'options' 		=> array(
						'left' => __( 'Left', 'musicmacho' ),
						'center' => __( 'center', 'musicmacho' ),
						'right' => __( 'right', 'musicmacho' ),
					),
				),
				'musicmacho_timezone' => array(
					'type' => 'select',
					'label' => __('Select Timezone','musicmacho'),
					'options' => $this->musicmacho_time_zone()
				),
			),
			plugin_dir_path(__FILE__)
		);
	}
	function get_less_variables($instance){
		if( empty( $instance ) ) return array();
		return array(
			'musicmacho_timer_text_color' => isset( $instance['musicmacho_timer_text_color'] ) ? $instance['musicmacho_timer_text_color'] : '',
			'musicmacho_timer_text_hover_color' => isset( $instance['musicmacho_timer_text_hover_color'] ) ? $instance['musicmacho_timer_text_hover_color'] : '',
			'musicmacho_timer_background_color' => isset( $instance['musicmacho_timer_background_color'] ) ? $instance['musicmacho_timer_background_color'] : '',
			'musicmacho_timer_align' => isset( $instance['musicmacho_timer_align'] ) ? $instance['musicmacho_timer_align'] : '',
		);
	}	

	function get_template_name($instance) {
		return 'timer-widget-template';
	}

	function get_style_name($instance) {
		return 'timer-widget-style';
	}
	function musicmacho_time_zone(){
		return array (
		    'UTC-11:00' => 'Pacific/Midway',
		    'UTC-11:00' => 'Pacific/Samoa',
		    'UTC-10:00' => 'Pacific/Honolulu',
		    'UTC-09:00' => 'US/Alaska',
		    'UTC-08:00' => 'America/Los_Angeles',
		    'UTC-08:00' => 'America/Tijuana',
		    'UTC-07:00' => 'US/Arizona',
		    'UTC-07:00' => 'America/Chihuahua',
		    'UTC-07:00' => 'America/Chihuahua',
		    'UTC-07:00' => 'America/Mazatlan',
		    'UTC-07:00' => 'US/Mountain',
		    'UTC-06:00' => 'America/Managua',
		    'UTC-06:00' => 'US/Central',
		    'UTC-06:00' => 'America/Mexico_City',
		    'UTC-06:00' => 'America/Mexico_City',
		    'UTC-06:00' => 'America/Monterrey',
		    'UTC-06:00' => 'Canada/Saskatchewan',
		    'UTC-05:00' => 'America/Bogota',
		    'UTC-05:00' => 'US/Eastern',
		    'UTC-05:00' => 'US/East-Indiana',
		    'UTC-05:00' => 'America/Lima',
		    'UTC-05:00' => 'America/Bogota',
		    'UTC-04:00' => 'Canada/Atlantic',
		    'UTC-04:30' => 'America/Caracas',
		    'UTC-04:00' => 'America/La_Paz',
		    'UTC-04:00' => 'America/Santiago',
		    'UTC-03:30' => 'Canada/Newfoundland',
		    'UTC-03:00' => 'America/Sao_Paulo',
		    'UTC-03:00' => 'America/Argentina/Buenos_Aires',
		    'UTC-03:00' => 'America/Argentina/Buenos_Aires',
		    'UTC-03:00' => 'America/Godthab',
		    'UTC-02:00' => 'America/Noronha',
		    'UTC-01:00' => 'Atlantic/Azores',
		    'UTC-01:00' => 'Atlantic/Cape_Verde',
		    'UTC+00:00' => 'Africa/Casablanca',
		    'UTC+00:00' => 'Europe/London',
		    'UTC+00:00' => 'Etc/Greenwich',
		    'UTC+00:00' => 'Europe/Lisbon',
		    'UTC+00:00' => 'Europe/London',
		    'UTC+00:00' => 'Africa/Monrovia',
		    'UTC+00:00' => 'UTC',
		    'UTC+01:00' => 'Europe/Amsterdam',
		    'UTC+01:00' => 'Europe/Belgrade',
		    'UTC+01:00' => 'Europe/Berlin',
		    'UTC+01:00' => 'Europe/Berlin',
		    'UTC+01:00' => 'Europe/Bratislava',
		    'UTC+01:00' => 'Europe/Brussels',
		    'UTC+01:00' => 'Europe/Budapest',
		    'UTC+01:00' => 'Europe/Copenhagen',
		    'UTC+01:00' => 'Europe/Ljubljana',
		    'UTC+01:00' => 'Europe/Madrid',
		    'UTC+01:00' => 'Europe/Paris',
		    'UTC+01:00' => 'Europe/Prague',
		    'UTC+01:00' => 'Europe/Rome',
		    'UTC+01:00' => 'Europe/Sarajevo',
		    'UTC+01:00' => 'Europe/Skopje',
		    'UTC+01:00' => 'Europe/Stockholm',
		    'UTC+01:00' => 'Europe/Vienna',
		    'UTC+01:00' => 'Europe/Warsaw',
		    'UTC+01:00' => 'Africa/Lagos',
		    'UTC+01:00' => 'Europe/Zagreb',
		    'UTC+02:00' => 'Europe/Athens',
		    'UTC+02:00' => 'Europe/Bucharest',
		    'UTC+02:00' => 'Africa/Cairo',
		    'UTC+02:00' => 'Africa/Harare',
		    'UTC+02:00' => 'Europe/Helsinki',
		    'UTC+02:00' => 'Europe/Istanbul',
		    'UTC+02:00' => 'Asia/Jerusalem',
		    'UTC+02:00' => 'Europe/Helsinki',
		    'UTC+02:00' => 'Africa/Johannesburg',
		    'UTC+02:00' => 'Europe/Riga',
		    'UTC+02:00' => 'Europe/Sofia',
		    'UTC+02:00' => 'Europe/Tallinn',
		    'UTC+02:00' => 'Europe/Vilnius',
		    'UTC+03:00' => 'Asia/Baghdad',
		    'UTC+03:00' => 'Asia/Kuwait',
		    'UTC+03:00' => 'Europe/Minsk',
		    'UTC+03:00' => 'Africa/Nairobi',
		    'UTC+03:00' => 'Asia/Riyadh',
		    'UTC+03:00' => 'Europe/Volgograd',
		    'UTC+03:30' => 'Asia/Tehran',
		    'UTC+04:00' => 'Asia/Muscat',
		    'UTC+04:00' => 'Asia/Baku',
		    'UTC+04:00' => 'Europe/Moscow',
		    'UTC+04:00' => 'Asia/Muscat',
		    'UTC+04:00' => 'Europe/Moscow',
		    'UTC+04:00' => 'Asia/Tbilisi',
		    'UTC+04:00' => 'Asia/Yerevan',
		    'UTC+04:30' => 'Asia/Kabul',
		    'UTC+05:00' => 'Asia/Karachi',
		    'UTC+05:00' => 'Asia/Karachi',
		    'UTC+05:00' => 'Asia/Tashkent',
		    'UTC+05:30' => 'Asia/Calcutta',
		    'UTC+05:30' => 'Asia/Kolkata',
		    'UTC+05:30' => 'Asia/Calcutta',
		    'UTC+05:30' => 'Asia/Calcutta',
		    'UTC+05:30' => 'Asia/Calcutta',
		    'UTC+05:45' => 'Asia/Katmandu',
		    'UTC+06:00' => 'Asia/Almaty',
		    'UTC+06:00' => 'Asia/Dhaka',
		    'UTC+06:00' => 'Asia/Dhaka',
		    'UTC+06:00' => 'Asia/Yekaterinburg',
		    'UTC+06:30' => 'Asia/Rangoon',
		    'UTC+07:00' => 'Asia/Bangkok',
		    'UTC+07:00' => 'Asia/Bangkok',
		    'UTC+07:00' => 'Asia/Jakarta',
		    'UTC+07:00' => 'Asia/Novosibirsk',
		    'UTC+08:00' => 'Asia/Hong_Kong',
		    'UTC+08:00' => 'Asia/Chongqing',
		    'UTC+08:00' => 'Asia/Hong_Kong',
		    'UTC+08:00' => 'Asia/Krasnoyarsk',
		    'UTC+08:00' => 'Asia/Kuala_Lumpur',
		    'UTC+08:00' => 'Australia/Perth',
		    'UTC+08:00' => 'Asia/Singapore',
		    'UTC+08:00' => 'Asia/Taipei',
		    'UTC+08:00' => 'Asia/Ulan_Bator',
		    'UTC+08:00' => 'Asia/Urumqi',
		    'UTC+09:00' => 'Asia/Irkutsk',
		    'UTC+09:00' => 'Asia/Tokyo',
		    'UTC+09:00' => 'Asia/Tokyo',
		    'UTC+09:00' => 'Asia/Seoul',
		    'UTC+09:00' => 'Asia/Tokyo',
		    'UTC+09:30' => 'Australia/Adelaide',
		    'UTC+09:30' => 'Australia/Darwin',
		    'UTC+10:00' => 'Australia/Brisbane',
		    'UTC+10:00' => 'Australia/Canberra',
		    'UTC+10:00' => 'Pacific/Guam',
		    'UTC+10:00' => 'Australia/Hobart',
		    'UTC+10:00' => 'Australia/Melbourne',
		    'UTC+10:00' => 'Pacific/Port_Moresby',
		    'UTC+10:00' => 'Australia/Sydney',
		    'UTC+10:00' => 'Asia/Yakutsk',
		    'UTC+11:00' => 'Asia/Vladivostok',
		    'UTC+12:00' => 'Pacific/Auckland',
		    'UTC+12:00' => 'Pacific/Fiji',
		    'UTC+12:00' => 'Pacific/Kwajalein',
		    'UTC+12:00' => 'Asia/Kamchatka',
		    'UTC+12:00' => 'Asia/Magadan',
		    'UTC+12:00' => 'Pacific/Fiji',
		    'UTC+12:00' => 'Asia/Magadan',
		    'UTC+12:00' => 'Asia/Magadan',
		    'UTC+12:00' => 'Pacific/Auckland',
		    'UTC+13:00' => 'Pacific/Tongatapu'
		);
	}
}
siteorigin_widget_register('timer-widget', __FILE__, 'musicmacho_timer_widget');