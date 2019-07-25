<?php
	//build a function to validate a form to avoid SQL injections
	/*	We used 
	*	trim()
	*	stripslashes()
	*	htmlspecialchars()
	*	strip_tags()
	*	str_replace()	
	*/
	function validateFormData($formData)
	{
		$formData = trim(stripslashes(htmlspecialchars(strip_tags(str_replace(array('(', ')'), '', $formData)), ENT_QUOTES)));
		return $formData;
	}

?>