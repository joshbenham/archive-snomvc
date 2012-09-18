<?php

	class Sno_Module
	{

		private function __construct() { }

		public static function load( $module , $params=null )
		{

			if ( Sno_Module::exists( $module ) )
			{

				if ( class_exists( $module ) )
				{

					if ( isset( $params ) && is_array( $params ) )
						return call_user_func_array(
							array( new ReflectionClass( $module ), 'newInstance' ), $params
						);
					else
						return new $module;

				}
				else
					throw new ModuleException( 'No class was found' );

			}
			else
				throw new ModuleException( 'No file was found' );

		}

		public static function exists( $module )
		{

			$file = $module.'.php';

			if ( is_file( APP_DIR .'modules/'. $file ) )
				return true;
			else
				return false;

		}

	}

?>
