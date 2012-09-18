<?php

	class Sno_Mapper
	{

		private
			$registry,
			$route,
			$args;

		public function __construct( Sno_Registry $registry )
		{

			$this->registry = $registry;
			$this->route = $this->registry->get( 'route' );

			$this->getArgs( );

		}

		public function assign( )
		{

			$loop = 0;

			$this->args[0] = ( empty( $this->args[0] ) ) ? "Base" : $this->args[0];
			$this->args[1] = ( empty( $this->args[1] ) ) ? "index" : $this->args[1];

			$search = strtolower( $this->args[0] );

			if ( $search == "genericpage" )
				$search = "default";

			$dom = $this->loadXML( );
			$nodes = $this->evalXML( $dom );

			foreach ( $nodes as $node )
			{

				if ( !empty( $this->args[$loop] ) )
					$_GET[$node->getAttribute('name')] = trim( stripslashes( $this->args[$loop] ) );

				$loop++;

			}

			if ( isset( $_GET['route'] ) )
				unset( $_GET['route'] );

		}

		private function getArgs( )
		{

			$this->route = trim( $this->route , "/" );

			if ( $this->route )
			{

				$this->args = explode( "/" , $this->route );

				foreach ( $this->args as $args )
				{

					if ( !preg_match( "/^\w+$/" , $args ) )
						throw new MapperException( 'Incorrect characters were found in the URL' );

				}

			}

		}

		private function loadXML( )
		{

			$file = APP_DIR.'/Map.xml';

			if ( !is_file( $file ) )
				throw new MapperException( 'No URL map was found' );

			$dom = new DOMDocument( );
			$dom->validateOnParse = true;
			$dom->load( $file );

			return $dom;

		}

		private function evalXML( $dom )
		{

			$search = $this->args[0];
			$xpath = new DOMXPath( $dom );
			$nodes = $xpath->evaluate( "/map/$search/param" );

			if ( $nodes->length == 0 )
			{

				$nodes = $xpath->evaluate( "/map/default/param" );

				if ( $nodes->length == 0 )
					throw new NoURLMapDefaultFoundException( 'Mapper : No default xml structure was found' );

			}

			return $nodes;

		}

		public function getPage( )
		{
			return $this->args[0];
		}

		public function getAction( )
		{
			return $this->args[1];
		}

		public function getURI( )
		{
			return $this->args;
		}

	}

?>
