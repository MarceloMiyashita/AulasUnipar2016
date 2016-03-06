<?php
function cafeteira ($tipo = "cappuccino") {
    return "Fazendo uma xícara de café $tipo";
}

// Fazendo uma xicara de café cappuccino
echo cafeteira();

// Fazendo uma xicara de café 
echo cafeteira(null);

// Fazendo uma xicara de café expresso
echo cafeteira("expresso");