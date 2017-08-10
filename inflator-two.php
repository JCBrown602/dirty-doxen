<?php

$data = 'Lorem ipsum';
$data = gzinflate($data, strlen($data));
echo "Data: $data";

$compressed   = gzdeflate('Compress me', 9);
$uncompressed = gzinflate($compressed);
echo "<p>$uncompressed";

?>