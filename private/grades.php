<?php 
	if ($result->examTotal >=75)
		{
		$Grade= "A1";
		}
		elseif($result->examTotal<75 && $result->examTotal >=70)
		{
		$Grade = "B2";
		}
		elseif($result->examTotal<70 && $result->examTotal >=65)
		{
		$Grade = "B3";
		}
		elseif($result->examTotal<65 && $result->examTotal >=60)
		{
		$Grade = "C4";
		}
														elseif($result->examTotal<60 && $result->examTotal >=55)
														{
															$Grade = "C5";
														}
														elseif($result->examTotal<55 && $result->examTotal >=50)
														{
															$Grade = "C6";
														}
														elseif($result->examTotal<50 && $result->examTotal >=45)
														{
															$Grade = "D7";
														}
														elseif($result->examTotal<45 && $result->examTotal >=40)
														{
															$Grade = "E8";
														}
														else 
														{
															$Grade = "F9";
														}
													echo $Grade;?>