<?php

namespace App\services;

	class Component
	{
		public static function part($part_name)
		{
			require_once "views/components/" . $part_name . ".php";	
		}
	}