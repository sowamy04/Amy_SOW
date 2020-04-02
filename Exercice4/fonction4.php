<?php
	
	function phrase_valide($phrase){
		if (preg_match('#^[A-Z]#', $phrase) && preg_match('#[.!?]$#', $phrase)) {
			return $phrase;
		}
	}

?>