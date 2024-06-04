<?php
function levenshteinDistance($str1, $str2)
{
    $len1 = strlen($str1);
    $len2 = strlen($str2);

    $matrix = [];

    for ($i = 0; $i <= $len1; $i++) {
        $matrix[$i] = [];
        for ($j = 0; $j <= $len2; $j++) {
            if ($i == 0) {
                $matrix[$i][$j] = $j;
            } elseif ($j == 0) {
                $matrix[$i][$j] = $i;
            } else {
                $cost = ($str1[$i - 1] != $str2[$j - 1]) ? 1 : 0;
                $matrix[$i][$j] = min(
                    $matrix[$i - 1][$j] + 1,
                    $matrix[$i][$j - 1] + 1,
                    $matrix[$i - 1][$j - 1] + $cost
                );
            }
        }
    }

    return $matrix[$len1][$len2];
}


$kata1 = "bagaimana penjoealan bisa meningkat?";
$kata2 = "penjualan";

$distance = levenshtein($kata1, $kata2);
echo "Jarak Levenshtein antara kedua kalimat tersebut adalah: $distance";

$distance = levenshtein($kata1, $kata2);
