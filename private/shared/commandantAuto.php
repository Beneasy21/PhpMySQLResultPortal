<?php
	
//echo "Commandant does not have comment so am checking average";
	if ($AverageScore >= 75.0000)
	{
		$Comment =  "Excellent Result. Keep It up";
	}
	elseif ($AverageScore >= 70.0000 && $AverageScore < 75.0000)
	{
		$Comment =  "Very Good Result";
	}
	elseif ($AverageScore >= 60.0000 && $AverageScore < 70.0000)
	{
		$Comment =  "Good Result";
	}
	elseif ($AverageScore >= 55.0000 && $AverageScore < 59.0000)
	{
		$Comment =  "Fairly Good Result, Need to improve upon.";
	}
	elseif ($AverageScore >= 50.0000 && $AverageScore < 55.0000)
	{
		$Comment =  "Average Performance";
	}
	elseif ($AverageScore >= 40.0000 && $AverageScore < 50.0000)
	{
		$Comment =  "Weak Performance, Work Harder";
	}
	else
	{
		$Comment =  "Fail";
	}
	
	echo $Comment;
?> 
