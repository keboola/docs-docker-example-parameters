<?php

$config = json_decode(file_get_contents('/data/config.json'), true);

$fhIn = fopen('/data/in/tables/source.csv', 'r');
$fhOut = fopen('/data/out/tables/destination.csv', 'w');

$header = fgetcsv($fhIn);
$numberIndex = array_search('number', $header);
fputcsv($fhOut, array_merge($header, ['double_number']));

while ($row = fgetcsv($fhIn)) {
	$row[] = $row[$numberIndex] * $config['parameters']['multiplier'];
	fputcsv($fhOut, $row);
}

fclose($fhIn);
fclose($fhOut);
echo "All done";

print_r($_ENV);
