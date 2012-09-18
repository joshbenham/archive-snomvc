<?php

	error_reporting( E_ALL | E_STRICT );

	try
	{

		include( 'Sno_Config.php' );

		$registry = new Sno_Registry;
		$router = new Sno_FrontController( $registry );
		$registry->set( 'router' , $router );

		$router->dispatch( );

	}
	catch( Exception $e )
	{
		echo 'Exception: ', $e->getMessage( ), '<br/>[', $e->getCode( ), '] ',
			$e->getFile( ), ' - line ', $e->getLine( ), '<br/>',
			$e->getTraceAsString( );
	}

?>
