<?php

	class NewsView extends Sno_View
	{

		protected
				$registry;

		public function __construct( Sno_Registry $registry )
		{
			parent::__construct( 'NewsView.stpl.php' );

			$this->registry = $registry;
			$this->model = new NewsModel( $this->registry );
		}

	}

?>
