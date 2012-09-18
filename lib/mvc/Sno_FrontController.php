<?php

	class Sno_FrontController
	{

		private
			$registry,
			$route;

		public function __construct( Sno_Registry $registry )
		{

			$this->registry = $registry;
			$this->route = ( empty( $_GET['route'] ) ) ? '' : $_GET['route'];

			$this->registry->set( 'route' , $this->route );

		}

		public function dispatch( )
		{

			$mapper = new Sno_Mapper( $this->registry );
			$mapper->assign( );

			$page = $mapper->getPage( );
			$action = $mapper->getAction( );

			$class = ucfirst( $page ).'Controller';

			if ( is_file( APP_DIR.'controllers/'. $class.'.php' ) == false )
				throw new FrontControllerException( 'The current page you are looking for does not exist' );

			$controller = new $class( $this->registry );

			if ( !is_callable( array( $controller , $action ) ) )
				throw new FrontControllerException( 'The current action you are trying to do does not exist' );

			$controller->$action( );

		}

	}

?>
