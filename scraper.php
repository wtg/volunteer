<?php
	# Use the Curl extension to query Google and get back a page of results
	$url = "http://doso.rpi.edu/update.do?catcenterkey=36";
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$html = curl_exec($ch);
	curl_close($ch);

	# Create a DOM parser object
	$dom = new DOMDocument();

	# Parse the HTML from Google.
	# The @ before the method call suppresses any warnings that
	# loadHTML might throw because of invalid HTML in the page.
	@$dom->loadHTML($html);

	# Iterate over all the <a> tags
	foreach($dom->getElementById('content')->getElementsByTagName('ul') as $link) {
	        # Show the <a href>
	        echo $link->ownerDocument->saveHTML($link);
	        echo "<br />";
	}
?>