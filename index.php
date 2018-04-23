<?php
/*
 Author 1: Riley Sims
 Purpose: Simulate the scenario in the A Solace in Quantum paper
 Date: April 13th 2018

*/
function generate(){

	//generate an array with the potential outputs
	$options = array ("-", "/", "\\", "|");
	$optionsCount = count($options) - 1;

	//generate an array with the potential filters
	$filterOpt = array("+","x");
	$filterCount = count($filterOpt) -1;

    $counter = 0;
    $count = 0;

	//while we do not have 128 useable bits
	while($counter < 128){
		//generate a random index number for the output array
		$rand = mt_rand(0,$optionsCount);
		$in = $options[$rand];

		//generate a random index number for the filter array
		$rand = mt_rand(0,$filterCount);
		$filter = $filterOpt[$rand];

		//check if it yields a bit 
		if($in == '-' && $filter == '+'){
			$bit = "0";
			$percieved = $in;
			$counter++; //if a useable bit was added increase the while counter
		}else if($in == '|' && $filter == '+'){
			$bit = "1";
			$percieved = $in;
			$counter++;
		}else if($in == '/' && $filter == 'x'){
			$bit = "0";
			$percieved = $in;
			$counter++;
		}else if($in == '\\' && $filter == 'x'){
			$bit = "1";
			$percieved = $in;
			$counter++;
		}else{ //if it was not a useable bit
			$bit = " ";
			if($in == '-'){
				$percieved = "/";
			}else if($in == '/'){
				$percieved = "-";
			}else if($in == '|'){
				$percieved = "\\";
			}else if($in == '\\'){
				$percieved = "|";

			}
		}
		if($bit!= " "){
			$choice = "Y";
		} else{
			$choice = "N";
		}

        $table = "<tr align='center'><td>".$count."</td><td>".$in."</td><td>".$filter."</td><td>".$percieved."</td><td>".$choice."</td><td>".$bit."</td></tr>";
        $count++;
        echo $table;
	}
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<center>
		<p> Info3085 Quantum Simulator</p>
		<p> Author: Riley Sims</p>
		<p> Simulating Transmissions from Alice to Bob </p>
		<table border="1">
			<tr>
                <th>Counter</th>
				<th>Alice Sent</th>
				<th>Filter used by Bob</th>
				<th>Percieved value</th>
				<th>Correct Choice?</th>
				<th>Bit Value</th>
			</tr>
			<?php generate() ?>
		</table>
	</center>
</body>
</html>