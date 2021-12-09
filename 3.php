<?php

include "vendor/autoload.php";

$input = new FileReader('inputs/3.txt');

$ones = $zeros = [];
$totalPositions = 0;
$gammaRate = $epsilonRate = '';

foreach ($input->rows() as $row) {

    $codeArray = str_split($row);

    // ignore \n
    array_pop($codeArray);

    // calculate total positions only one time
    if ($totalPositions === 0) {
        $totalPositions = count($codeArray);
        $ones = array_fill(0, $totalPositions, null);
        $zeros = array_fill(0, $totalPositions, null);
    }

    foreach ($codeArray as $position => $bit) {
        $bit == "0" ? $ones[$position]++ : $zeros[$position]++;
    }
}


for ($position = 0; $position < $totalPositions; $position++) {
    $gammaRate .= $ones[$position] > $zeros[$position] ? "0" : "1";
    $epsilonRate .= $ones[$position] < $zeros[$position] ? "0" : "1";
}

$gammaRateDecimal = bindec($gammaRate);
$epsilonRateDecimal = bindec($epsilonRate);

echo "gamma rate: $gammaRate | decimal: $gammaRateDecimal \n";
echo "epsilon rate: $epsilonRate | decimal: $epsilonRateDecimal \n";
echo "Result: " . ($gammaRateDecimal * $epsilonRateDecimal);

echo "\n============ part 2 ==============\n";

$input = new FileReader('inputs/3.txt');

$rows = $rowsCo2 = [];

foreach ($input->rows() as $row) {
    // ignore \n
    $rowsOxy[] = $rowsCo2[] = trim($row);
}


$oxygenValue = calculateBitsRating($rowsOxy, "1", 0, '');
$oxygenDecimal = bindec($oxygenValue);
$co2Value = calculateBitsRating($rowsCo2, "0", 0, '');
$co2Decimal = bindec($co2Value);

echo "Oxygen: $oxygenValue | decimal: $oxygenDecimal \n";
echo "Co2: $co2Value | decimal: $co2Decimal \n";

echo "\nResult: " . ($oxygenDecimal * $co2Decimal) . "\n";

function calculateBitsRating(&$rows, $bitType, $position, $oxigenValue)
{
    $ones = $zeros = 0;
    $antiBitType = $bitType == "0" ? "1" : "0";

    foreach ($rows as $row) {
        $codeArray = str_split($row);
        $codeArray[$position] == "1" ? $ones++ : $zeros++;
    }

    $oxigenValue .= $ones >= $zeros ? $bitType : $antiBitType;

    $rows = array_filter($rows, function ($value) use ($oxigenValue) {
        return substr($value, 0, strlen($oxigenValue)) === $oxigenValue;
    });

    $position++;

    if (count($rows) > 1) {
        return calculateBitsRating($rows, $bitType, $position, $oxigenValue);
    }

    return reset($rows);
}