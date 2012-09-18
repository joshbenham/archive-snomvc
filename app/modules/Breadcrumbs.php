<?php

	class Breadcrumbs
	{

		private
			$registry,
			$args;

		public function __construct( Sno_Registry $registry )
		{

			$this->registry = $registry;

			$mapper = new Sno_Mapper( $this->registry );
			$this->args = $mapper->getURI( );

		}

		public function dispatch( $char = '/' )
		{

			$trail = "";
			$crumbs = '<a href="/">home</a> :: ';

			if ( isset( $this->args ) )
			{

				foreach( $this->args as $args )
				{

					$trail .= $args.'/';
					$crumbs .= $char.' <a href="/'.$trail.'">'.$args.'</a> ';

				}

			}
			else
				$crumbs .= '/';

			echo $crumbs;

		}

	}

?>
