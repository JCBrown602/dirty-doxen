
<?php

$data = 'Lorem ipsum *** 2f71b70cbe2e3bb36f964f54d15abc1bóû‡zvM	WÌË3¿VŒ9IfD"
4Ÿ-þäåûBŸ“E ¼.vJÝà6¡úí‡³F£Ò_öFS[™"!…¶oK<í—_™{/#ö6Àøá{,ìRºã¬f[-Ì=›·8xKcU}á';
echo "\n\n\n";
for($i=-1;$i<=9;$i++)
    echo chunk_split(strtoupper(bin2hex(gzcompress($data,$i))),2," ") . PHP_EOL  . PHP_EOL;
echo "\n\n\n";
for($i=-1;$i<=9;$i++)
    echo chunk_split(strtoupper(bin2hex(gzdeflate($data,$i))),2," ") . PHP_EOL  . PHP_EOL;
echo "\n\n\n";
for($i=-1;$i<=9;$i++)
    echo chunk_split(strtoupper(bin2hex(gzencode($data,$i,FORCE_GZIP))),2," ") . PHP_EOL  . PHP_EOL;
echo "\n\n\n";
for($i=-1;$i<=9;$i++)
    echo chunk_split(strtoupper(bin2hex(gzencode($data,$i,FORCE_DEFLATE))),2," ") . PHP_EOL  . PHP_EOL;
echo "\n\n\n";

?>