<?php
/**
 * tehnodim carbon fields
 *
 * @package tehnodim
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if( class_exists( "\\Carbon_Fields\\Field\\Field" ) ){
	Container::make( 'theme_options', __( 'Tehnodim' ) )
		->add_tab( __('Загальні'), array(
			Field::make( 'text', 'ch_phone', __( 'Номер телефона' ) ),
			Field::make( 'text', 'ch_email', __( 'E-mail' ) ),
			Field::make( 'map', 'sd_location', __( 'Локация' ) )
				->set_position( 37.423156, -122.084917, 14 ),
		) )
		->add_tab( __('Соц. мережі'), array(
			Field::make( 'text', 'td_instagram', __( 'Instagram' ) )
				->set_help_text( 'Введіть посилланя на ваш Instagram' ),
			Field::make( 'text', 'td_facebook', __( 'Facebook' ) )
				->set_help_text( 'Введіть посилланя на ваш Facebook' ),
		) )
	
		->add_tab( __('Клієнти'), array(
			Field::make( 'complex', 'td_clientage', __( 'Клієнти' ) )
				->add_fields( array(
					Field::make( 'image', 'image', __( 'Зображення' ) )->set_width(100),
				) )
		) );
}
