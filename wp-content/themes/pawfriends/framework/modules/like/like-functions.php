<?php

if ( ! function_exists( 'pawfriends_mikado_like' ) ) {
	/**
	 * Returns PawFriendsMikadoClassLike instance
	 *
	 * @return PawFriendsMikadoClassLike
	 */
	function pawfriends_mikado_like() {
		return PawFriendsMikadoClassLike::get_instance();
	}
}

function pawfriends_mikado_get_like() {
	
	echo wp_kses( pawfriends_mikado_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
        'svg'    => array(
            'xmlns'   => true,
            'class'   => true,
            'viewbox' => true,
            'width'   => true,
            'height'  => true,
        ),
        'path'   => array(
            'd'  => true,
        ),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}