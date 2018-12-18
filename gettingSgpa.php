<?php 
// Multiplying credit and obtained for every subject
function SubjectCalculation($credit, $obtainedgpa){
	return $credit * $obtainedgpa;
}
// Credit and obtained array following serial
function sgpa($creditArray, $obtainedArray){
	$totalSubjects = count($creditArray);

	$totalSum = 0;

	$totalCredit = array_sum($creditArray);

	// Getting toalSum (Credit Per Subject x Obtained GPA)
	for ($i=0; $i < $totalSubjects ; $i++) { 
		$totalSum += SubjectCalculation($creditArray[$i], $obtainedArray[$i]);
	}

	/// Getting SGPA
	return $totalSum / $totalCredit;

}

$credit = [4, 4, 3, 4];
$obtained = [3, 4, 2, 2];

echo sgpa($credit, $obtained);



?>