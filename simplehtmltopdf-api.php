<?php

class SimpleHTMLToPDF {

	private $baseUrl = "http://api.simplehtmltopdf.com/";

	public function get($url, $orientation = "Portrait", $marges = array(10,10,10,10)) {

		$orientation = ($orientation == "Landscape") ? $orientation : "Portrait";

		$requestUrl = $this->baseUrl . "?link=".urlencode($url)."&amp;orientation=". $orientation;

		if(!count($marges) == 4 || !is_array($marges))
			$marges = array(10,10,10,10);

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

	public function download($url, $orientation = "Portrait", $marges = array(10,10,10,10)) {

		header("Content-Type: application/pdf");
		header("Cache-Control: no-cache");
		header("Accept-Ranges: none");
		header("Content-Disposition: attachment; filename=\"your_pdf_name.pdf\"");

		echo $this->get($url, $orientation, $marges);
	}

	public function display($url, $orientation = "Portrait", $marges = array(10,10,10,10)) {

		header("Content-Type: application/pdf");
		header("Cache-Control: no-cache");
		header("Accept-Ranges: none");

		echo $this->get($url, $orientation, $marges);
	}
}

?>