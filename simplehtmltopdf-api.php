<?php

class SimpleHTMLToPDF {

	private $baseUrl = "http://api.simplehtmltopdf.com/";

	public function get($url, $orientation = "Portrait") {

		$orientation = ($orientation == "Landscape") ? $orientation : "Portrait";

		$requestUrl = $this->baseUrl . "?link=".urlencode($url)."&amp;orientation=". $orientation;

		$curl = curl_init($requestUrl);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'User-Agent: SimpleHTMLToPDF PHP Wrapper'
		));

		$result = curl_exec($curl);

		return $result;
	}

	public function download($url, $orientation = "Portrait") {

		header("Content-Type: application/pdf");
		header("Cache-Control: no-cache");
		header("Accept-Ranges: none");
		header("Content-Disposition: attachment; filename=\"your_pdf_name.pdf\"");

		echo $this->get($url, $orientation);
	}

	public function display($url, $orientation = "Portrait") {

		header("Content-Type: application/pdf");
		header("Cache-Control: no-cache");
		header("Accept-Ranges: none");

		echo $this->get($url, $orientation);
	}
}

?>