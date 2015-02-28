<?php
ob_start();

function filter_bypass() {
	$html = ob_get_clean();
	$n = rand(1, 5);

	for($i = 0; $i < $n; $i++) {
		if(!isset($encode)) {
			$encode = base64_encode($html);
		} else {
			$encode = base64_encode($encode);
		}
	}

	$js = "document.write(";

	for($i = 0; $i < $n; $i++) {
		$js .= "atob(";
	}

	$js .= "'" . $encode . "'";

	for($i = 0; $i < $n; $i++) {
		$js .= ")";
	}

	$js .= ");";

	echo "<script>" . $js . "</script>";

}