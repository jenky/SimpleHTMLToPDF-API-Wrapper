#!/bin/bash

curlExec=`which curl`

baseUrl="http://api.simplehtmltopdf.com"
defaultOrientation="Portrait"
defaultMargins=(10 10 10 10)
userAgent="SimpleHTMLToPDF Bash Wrapper"
defaultName=`date +%Y%m%d%H%M%S`.pdf

url="http://www.google.com"
orientation="Portrait"

rawurlencode() {
	local string="${1}"
	local strlen=${#string}
	local encoded=""

	for (( pos=0 ; pos<strlen ; pos++ )); do
		c=${string:$pos:1}
		case "$c" in
			[-_.~a-zA-Z0-9] ) o="${c}" ;;
			* )               printf -v o '%%%02x' "'$c"
		esac
		encoded+="${o}"
	done
	echo "${encoded}"    # You can either set a return variable (FASTER)
	#REPLY="${encoded}"   #+or echo the result (EASIER)... or both... :p
	#return ${encode}
}

function makeUrl() {
	local m=$3[@]
	local margins=("${!m}")
	local ret="$baseUrl/?"
	ret="${ret}link=$(rawurlencode $1)"
	ret="${ret}&orientation=${2}"
	ret="${ret}&mtop=${margins[0]}&mleft=${margins[1]}&mright=${margins[2]}&mbot=${margins[3]}"

	echo $ret
}

function get() {
	local requestUrl=makeUrl $1 $2 $3
	local pdf=`curl --user-agent $userAgent $requestUrl`
	return pdf
}

marg=(10 11 12 13)

requestUrl=$(makeUrl $url "Portrait" $margins)

#echo ok
echo $requestUrl