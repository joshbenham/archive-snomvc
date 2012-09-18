<?php

	abstract class Sno_Controller
	{

		protected
			$registry;

		public function __construct( Sno_Registry $registry )
		{

			$this->registry = $registry;

		}

		abstract public function index( );

	}

?>
