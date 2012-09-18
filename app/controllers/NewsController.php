<?php

	class NewsController extends Sno_Controller
	{

		private
			$view;

		public function __construct( Sno_Registry $registry )
		{

			parent::__construct( $registry );
			$this->view = new NewsView( $this->registry );

		}

		public function index( )
		{

			$this->view->render();

		}

	}

?>
