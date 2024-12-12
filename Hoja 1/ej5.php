<?php

$altura = readline("Pon la altura que deseas que sea la piramide: ");

for ($f = 1; $f <= $altura; $f++) {
for ($n = 1; $n <= $altura * 2 - 1; $n++) {
if ($n <= $altura - $f) {
    echo " ";
}
else if ($n <= $altura + $f - 1) {
echo $n - ($altura - $f);
}
}
echo "\n";}

?>