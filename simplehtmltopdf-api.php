<?php

class SimpleHTMLToPDF {

	private $baseUrl = "http://api.simplehtmltopdf.com/";
	private $defaultOrientation = "Portrait";
	private $defaultMargins = array(10,10,10,10);

	public function get($url, $orientation = NULL, $margins = NULL) {

		$orientation = ($orientation == "Landscape") ? $orientation : $this->defaultOrientation;

		$requestUrl = $this->baseUrl . "?link=".urlencode($url)."&amp;orientation=". $orientation;

		if(!count($margins) == 4 || !is_array($margins))
			$marges = $this->defaultMargins;

		$requestUrl .= "&amp;mtop="   . $marges[0];
		$requestUrl .= "&amp;mleft="  . $marges[1];
		$requestUrl .= "&amp;mright=" . $marges[2];
		$requestUrl .= "&amp;mbot="   . $marges[3];

		$curl = curl_init($requestUrl);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'User-Agent: SimpleHTMLToPDF PHP Wrapper'
		));

		$result = curl_exec($curl);

		return $result;
	}

	public function download($url, $orientation = NULL, $margins = NULL) {

		header("Content-Type: application/pdf");
		header("Cache-Control: no-cache");
		header("Accept-Ranges: none");
		header("Content-Disposition: attachment; filename=\"your_pdf_name.pdf\"");

		echo $this->get($url, $orientation, $marges);
	}

	public function display($url, $orientation = NULL, $marges = NULL) {

		header("Content-Type: application/pdf");
		header("Cache-Control: no-cache");
		header("Accept-Ranges: none");

		echo $this->get($url, $orientation, $marges);
	}
}

?>