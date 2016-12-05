var qtdPares = 3;
var paresAbertos;

var qtdCartoes = qtdPares * 2;
var cartoes = [];
var botoes;

window.onload = iniciar;
function iniciar() {
	//window.alert('Iniciar jogo da memória');
	prepararJogo();
}

function prepararJogo() {
	paresAbertos = 0;
	carta1 = null;
	carta2 = null;
	fecharCartas = false;
	cartoes = [];

	gerarCartoes();
	gerarHtml();
}

function gerarHtml() {
	var html = '';
	for (var i = 0; i < qtdCartoes; i++) {
		html += '<div data-numero="' + i + '"></div>';
	}
	document.getElementById('jogo').innerHTML = html;

	botoes = document.querySelectorAll('#jogo div');
	for(i = 0; i < botoes.length; i++) {
		botoes[i].addEventListener('click', cartaoClicado);
	}
}

var carta1 = null;
var carta2 = null;
var fecharCartas = false;
function cartaoClicado(evento) {
	if (fecharCartas) {
		desvirarCartao(carta1);
		desvirarCartao(carta2);
		carta1 = null;
		carta2 = null;
		fecharCartas = false;
	}

	var numero = evento.target.dataset.numero;
	virarCartao(numero);

	if (carta1 == null) {
		carta1 = numero;
		return ;
	} else {
		carta2 = numero;
	}

	// Testar se cartas sao iguais
	if (cartoes[carta1] == cartoes[carta2]) {
		carta1 = null;
		carta2 = null;
		paresAbertos++;
		testarFim();
	} else {
		fecharCartas = true;
	}
}

function gerarCartoes() {
	var i, numero;

	i = 0;
	do {
		numero = mt_rand(1, qtdPares);

		if (procuraNumero(numero) < 2) {
			cartoes[i] = numero;
			i++;
		}
	} while (i < qtdCartoes);

	//console.log(cartoes);
}

function procuraNumero(numero) {
	var encontrados = 0;
	for (var i = 0; i < cartoes.length; i++) {
		if (numero == cartoes[i]) {
			encontrados++;
		}
	}
	return encontrados;
}

function virarCartao(i) {
	var img = 'url(img/img' + cartoes[i] + '.png)';
	botoes[i].style.backgroundImage = img;
}

function desvirarCartao(i) {
	var img = 'url(img/img0.png)';
	botoes[i].style.backgroundImage = img;
}

function testarFim() {
	if (paresAbertos == qtdPares) {
		setTimeout(function(){
			window.alert('Fim do jogo');
			prepararJogo();
		}, 50);
	}
}









/**/
