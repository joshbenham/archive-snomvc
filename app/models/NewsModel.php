<?php

	class NewsModel extends Sno_Model
	{

		public function getCrumbs()
		{

			if ( Sno_Module::exists( 'Breadcrumbs') )
			{
				$crumbs = Sno_Module::load( 'Breadcrumbs' , array( $this->registry ) );
				$crumbs->dispatch();
			}
			else
				echo 'Breadcrumbs is not supported';

		}

	}

?>
