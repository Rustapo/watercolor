<?php
	function newEditableArea($name, $default) {
		global $Wcms;

		// Check if the newEditableArea area is already exists, if not, create it
		if (empty($Wcms->get('blocks',$name))) {
			$Wcms->set('blocks',$name, 'content', $default);
		}

		// Fetch the value of the newEditableArea from database
		$value = $Wcms->get('blocks',$name,'content');

		// If value is empty, let's put something in it by default
		if (empty($value)) {
			$value = $default;
		}
		if ($Wcms->loggedIn) {
			// If logged in, return block in editable mode
			return $Wcms->block($name);
		}

		// If not logged in, return block in non-editable mode
		return $value;
	}
?>
