<?php 
	// Mother's Little Helpers

	function convertForSelect($query, $key, $value) {
		$selectArray = array();
	  // Gotta convert the json to a proper array for the select box
	  foreach($query as $single) {
	      $selectArray[$single->$key] = $single->$value;
	  }

	  return $selectArray;
	}
	

