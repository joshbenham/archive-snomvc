<?php

	class Sno_Registry implements ArrayAccess
	{

		// Create a registry array
		private
			$registry = array( );

		// If service exists get
		public function get( $name )
		{

			self::sanitize( $name );

			if ( array_key_exists( $name , $this->registry ) )
				return $this->registry[$name];

			return null;

		}

		// Set a service
		public function set( $name , $registry )
		{

			self::sanitize( $name );

			if ( !array_key_exists( $name , $this->registry ) )
				$this->registry[$name] = $registry;

			return true;

		}

		// See if service exists
		public function exists( $name )
		{

			self::sanitize( $name );

			return array_key_exists( $name , $this->registry );

		}

		// Remove a service from the array
		public function remove( $name )
		{

			self::sanitize( $name );

			if ( array_key_exists( $name , $this->registry ) )
				unset( $this->registry[$name] );

			return true;

		}

		// Count the number of registry running on a page
		public function count( )
		{

			return count( $this->registry );

		}


		// Always open to add more
		public static function sanitize( &$name )
		{

			$name = strtolower($name);

		}

		// Standard SPL code
		public function offsetExists( $offset )
		{

			return isset( $this->registry[ $offset ] );

		}

		public function offsetGet( $offset )
		{

			return $this->get( $offset );

		}

		public function offsetSet( $offset , $value )
		{

			$this->set( $offset , $value );

		}

		public function offsetUnset( $offset )
		{

			unset( $this->registry[ $offset ] );

		}

	}

?>
