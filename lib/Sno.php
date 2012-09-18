<?php

	final class Sno
	{

		private static
			$location = array( );

		private function __construct( ) { }

		public static function using( $path )
		{

			$path = trim( $path );
			$path = str_replace( '.' , '/' , $path );

			if ( substr( $path , -1 , 1 ) != "/" )
				$path .= "/";

			if ( is_dir( $path ) )
			{

				if ( !in_array( $path , self::$location ) )
				{

					self::$location[ ] = $path;
					self::addIncludePath( $path );

				}

			}
			else
				throw new SNOException( "[$path] is not a valid directory" );

		}

		public static function autoload( $class )
		{

			$file = $class.'.php';

			if ( self::isReadable( $file ) && ( require( $file ) )
				&& ( class_exists( $class , false ) || interface_exists( $class , false ) ) )
				return true;

			return false;

		}

		public static function isReadable($file)
		{

			$f = fopen($file, 'r', true);
			$readable = is_resource($f);

			if ($readable)
				fclose($f);

			clearstatcache( );

			return $readable;

		}

		public static function addIncludePath( $path )
		{

			$rawPaths = get_include_path().PATH_SEPARATOR.$path;
		set_include_path( $rawPaths );

		}

		public static function define( $name , $define )
		{

			if ( !defined( $name ) )
				define( $name , $define );

		}

	}

?>
