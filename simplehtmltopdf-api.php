<?php

class SimpleHTMLToPDF {

	private $baseUrl = "http://api.simplehtmltopdf.com/";
	private $defaultOrientation = "Portrait";
	private $defaultMargins = array(10,10,10,10);
	private $userAgent = "SimpleHTMLToPDF PHP Wrapper";

	/**
	 * This function get the raw content of your PDF
	 * @param  string $url         The url to get and transform in PDF
	 * @param  string $orientation The PDF orientation, possible values : "Landscape", "Portrait" (default)
	 * @param  array  $margins     The margin of PDF pages, default array(10,10,10,10)
	 * @return string              Return the raw content of the PDF
	 */
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
			'User-Agent: '. $this->userAgent
		));

		$result = curl_exec($curl);

		return $result;
	}

	/**
	 * This function change the header to download the content of a PDF
	 * See SimpleHTMLToPDF::get() for parameters
	 */
	public function download($url, $orientation = NULL, $margins = NULL) {

		header("Content-Type: application/pdf");
		header("Cache-Control: no-cache");
		header("Accept-Ranges: none");
		header("Content-Disposition: attachment; filename=\"your_pdf_name.pdf\"");

		echo $this->get($url, $orientation, $marges);
	}

	/**
	 * This function change the header to let the user directly see the PDF in his browser
	 * See SimpleHTMLToPDF::get() for parameters
	 */
	public function display($url, $orientation = NULL, $marges = NULL) {

		header("Content-Type: application/pdf");
		header("Cache-Control: no-cache");
		header("Accept-Ranges: none");

		echo $this->get($url, $orientation, $marges);
	}
}

?>