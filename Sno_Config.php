<?php

	/* Include the main class */
	include( 'lib/Sno.php' );
	
	/* Set defines */
	Sno::define( 'BASE_DIR' , dirname( __FILE__ ).'/' );
	Sno::define( 'LIB_DIR' , BASE_DIR.'lib/' );
	Sno::define( 'APP_DIR' , BASE_DIR.'app/' );
	
	/* Catch Exceptions First */
	Sno::using( 'app.exceptions' );
	
	/* Include all the library folders */
	Sno::using( 'lib' );
	Sno::using( 'lib.mvc' );
	Sno::using( 'lib.common' );
	
	/* Include the main app folders */
	Sno::using( 'app' );
	Sno::using( 'app.controllers' );
	Sno::using( 'app.models' );
	Sno::using( 'app.modules' );
	Sno::using( 'app.views' );
	
	/* Overwrite the standard __autoload function */
	spl_autoload_register( array( 'Sno' , 'autoload' ) );
	
?>