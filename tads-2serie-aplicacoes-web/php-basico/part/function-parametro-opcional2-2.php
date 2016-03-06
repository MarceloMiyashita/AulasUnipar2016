<?php
// errado (nem executa)
function iogurtera ($tipo = 'azedo', $sabor) {
    return 'Fazendo uma taça de $sabor $tipo';
}
echo iogurtera ('morango');

// certo
function iogurtera ($sabor, $tipo = 'azedo') {
    return 'Fazendo uma taça de $sabor $tipo';
}
echo iogurtera ('morango'); // Fazendo uma taça de morango azedo
echo iogurtera ('morango', 'doce'); // Fazendo uma taça de morango doce