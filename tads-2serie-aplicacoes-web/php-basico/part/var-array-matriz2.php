<?php
$frutas = array('banana', 'laranja');
$folhas = array('alface', 'couve');
$alimento = array($frutas, $folhas);

echo $frutas[0]; // banana
echo $alimento[0][0]; // banana

echo $folhas[1]; // couve
echo $alimento[1][1]; // couve

/* Array (
[0] => Array ( [0] => banana [1] => laranja )
[1] => Array ( [0] => alface [1] => couve )
) */
print_r($alimento);