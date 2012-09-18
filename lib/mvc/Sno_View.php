<?php

	class Sno_View
	{

		protected
			$template;

		public function __construct( $template )
		{

			$this->template = APP_DIR.'pages/'.$template;

			if ( !file_exists( $this->template ) )
				throw new ViewException( 'The template your calling does not exist' );

		}

		public function addInclude( $include )
		{

			$include = APP_DIR.'pages/inc/'.$include;

			if ( !file_exists( $include ) )
				throw new ViewException( 'The file your including does not exist' );

			include( $include );

		}

		public function render( )
		{

			include( $this->template );

		}

	}

?>
