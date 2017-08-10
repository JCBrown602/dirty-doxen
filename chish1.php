<?php
echo '<body style="
		background-color: darkgray; 
		margin: 20px;">';
echo '<div style="
		width: 100%; 
		height: 100%; 
		padding: 75px 100px; 
		background-color: lightgray;">';

$dieTxt = "Can't open the file, Captain!";

echo "<hr>";


///////////// SETTING UP THE ACTIONS /////////////
///// This is the top half, above the encoded part ($Bob)
function firstAction()
{ 
	echo "<h3>First Action</h1>";
	// Initialized hunger...
	// (Trying to keep track of the data in its current stage w/ one var)
	$Bob = 'tacos';

	echo "<p>Originally combined & called (2 uscores): wp__wp<br>";
	$firstArr = array("\r","\n");
	$secondArr = array('','');

	echo "<p>Original base64 encoded junk: junk1.txt<br>";
	$chi = file_get_contents("junk1.txt");

	// File to put the first decode in
	$chinFile1 = fopen("chinFile1.txt", "w") or die ($dieTxt);
	
	echo "<p>Second step: Take the 64decode and str_replace it<br>";
	$Bob = str_replace($firstArr, $secondArr, $chi);
	$TWO = base64_decode($Bob);

	// DEBUG: single quotes == don't have to escape $
	echo '<p>Putting the decoded $Bob into the $chinFile1...<br>';
	fwrite($chinFile1, $TWO);
	fclose($chinFile1);

	// DEBUG: just checking output on the page instead of opening the txt every time
	echo '<p>Compare $chi and $Bob: ' . strcmp($chi, $Bob) . '<br><br>';
	//echo '$chi:<br> ' . $chi . '<br><br>'; // No need to see this every time!
	echo '$Bob:<br> ' . substr($Bob, 0, 50) . '<br><br>';
	echo '$Bob:<br> ' . substr($TWO, 0, 50) . '<br><br>';

	echo "<hr>";
}

function secondAction()
{
	echo "<h3>Second Action</h1>";
	// Get our decoded $Bob
	$TWO = file_get_contents("chinFile1.txt");

	$ONE ="localhost";
	echo "<p>\$ONE: $ONE";

	$ONE = md5($ONE);
	echo "<p>md5(\$ONE): $ONE<br>";
	// forloop was here!
	fileIt($ONE);

	echo '<p>Reversing the $ONE, and hashing the hash:<br>';
	$secondONE = substr(md5(strrev($ONE)), 0, strlen($ONE));
	echo "substr(md5(strrev($ONE)), 0, strlen($ONE)): <br>" . $secondONE;

	fileIt($secondONE);

	echo "<hr>";
}

function forLoop()
{
    echo "<hr>";
    echo "<h4>For Loop!</h4>";
	$ONE = file_get_contents("testFile.txt");
	$TWO = file_get_contents("chinFile1.txt");
	// Is $THREE just an index?
	for ($THREE = 0; $THREE < 49537; $THREE++) 
		{
			$TWO[$THREE] = chr((ord($TWO[$THREE]) - ord($ONE[$THREE])) % 256);
			// Track progress
			if ($THREE%1000 == 0)
			{
				echo "<br>> Count: $THREE --- \$TWO[\$THREE] #: " . $TWO[$THREE];
				echo "<br>> Count: $THREE --- \$ONE #: " . $ONE;
			}
			$ONE.= $TWO[$THREE];
		}

	$mysteryFile = "mysteryFile.txt";	
	fileIt2($ONE, $mysteryFile);

    if ($TWO = @gzinflate($TWO)) 
    { 
    	// @ is error suppression
    	echo '<br>&&& if ($TWO = @gzinflate($TWO))<br><br>';
    	echo '';
        $THREE = create_function('', $TWO);
        unset($TWO, $ONE);
        echo "\$THREE(): $THREE<br>";
    }
    else
    {
    	echo '<br><p>NO WORKIES!!!</br>';
    }
}

// fx to make testing easier to break down on secondAction()
function fileIt($stuffToWrite)
{
	echo "<br>***********<br>";
	echo "<em>File IT!</em>";
	$path = "/";
	$fileName = "testFile.txt";

	$file = fopen($fileName, "w") or die ($dieTxt);
	fwrite($file, $stuffToWrite);
	echo "<p>File: $fileName<br>Wrote: $stuffToWrite<br>";
	echo "***********<br>";
}

// fx to make testing easier to break down on secondAction()
function fileIt2($stuffToWrite, $file)
{
	echo "<br>***********<br>";
	echo "<em>File IT - TOO!</em>";
	$path = "/";

	$file = fopen($file, "w") or die ($dieTxt);
	fwrite($file, $stuffToWrite);
	echo "<p>File: $file<br>Wrote: Some stuff...<br>";
	echo "<br>***********<br>";
}

///////////// ACTIONS /////////////
// firstAction() appears to be working...
firstAction();
//
secondAction();

forLoop();

echo "<hr>";
echo '</div></body>';
	?>