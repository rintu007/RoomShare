<?php

	$arp=array(array());
	$arp[0][0]=200;
	$arp[0][1]=2;
	$arp[0][2]=300;

	$arp[1][0]=100;
	$arp[1][1]=1;
	$arp[1][2]=25;

	
	$arp[2][0]=100;
	$arp[2][1]=1;
	$arp[2][2]=26;


	
$num=3;


	for($i=0;$i<3;$i++)
	{
		for($j=0;$j<3;$j++)
		{
			echo $arp[$i][$j]."   ";
		}
		echo "<br>";
	}

					for($i=0;$i<$num;$i++)
					{
						for($j=0;$j<$num-1;$j++)
						{
							if($arp[$j][1] > $arp[$j+1][1])
							{
								$temp0=$arp[$j][0];
								$temp1=$arp[$j][1];
								$temp2=$arp[$j][2];
								
								$arp[$j][0]=$arp[$j+1][0];
								$arp[$j][1]=$arp[$j+1][1];
								$arp[$j][2]=$arp[$j+1][2];

								$arp[$j+1][0]=$temp0;
								$arp[$j+1][1]=$temp1;
								$arp[$j+1][2]=$temp2;

							}
						}
					}


	for($i=0;$i<3;$i++)
	{
		for($j=0;$j<3;$j++)
		{
			echo $arp[$i][$j]."   ";
		}
		echo "<br>";
	}

?>