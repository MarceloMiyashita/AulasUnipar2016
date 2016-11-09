var carroImg = 6;
var qtdCarros = 4;
var carros = [];
var carrosPos;
var comprimentoPista;

function prepararTela() {
	prepararPista();

	document.querySelector('#iniciarJogo')
		.addEventListener('click', iniciar);
}

function prepararPista() {
	var html = '';
	for (var i = 0; i < qtdCarros; i++) {
		html += '<li><img src="img/img' + carroImg + '.png"></li>';
	}
	document.getElementById('jogo').innerHTML = html;

	carros = document.querySelectorAll('#jogo li img');
}

function iniciar() {
	carrosPos = [];
	for (var i = 0; i < qtdCarros; i++) {
		carrosPos[i] = 0;
	}

	comprimentoPista = document.querySelector('#jogo').offsetWidth;
	comprimentoPista -= carros[0].offsetWidth + 5;

	quadro();
}

function quadro() {
	for (var i = 0; i < qtdCarros; i++) {
		carrosPos[i] += passo(carrosPos[i]);
		carros[i].style.left = carrosPos[i] + 'px';

		if (carrosPos[i] >= comprimentoPista) {
			fim(i);
			return ;
		}
	}
	setTimeout(quadro, 1000/24);
}

function passo(pos) {
	pos = pos / comprimentoPista;
	if (pos < 0.333) {
		return mt_rand(1,3);
	} else if (pos < 0.666) {
		return mt_rand(2,4);
	} else {
		return mt_rand(3,5);
	}
}






/**/
