#!/bin/bash

curlExec=`which curl`;

baseUrl="http://api.simplehtmltopdf.com";
defaultOrientation="Portrait";
defaultMargins=(10 10 10 10);
userAgent="SimpleHTMLToPDF Bash Wrapper";
defaultName=`date +%Y%m%d%H%M%S`.pdf;

echo ${defaultMargins[0]}
