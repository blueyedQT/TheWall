<?php
foreach($_POST as $name => $value) {
	if(empty($value)) {
		echo $name . ' can not be blank!<br>';
	} else {
		switch (variable) {
			case 'value':
				# code...
				break;
			
			default:
				# code...
				break;
		}
	}
}
?>