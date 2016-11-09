window.onload = prepararInicio;
function prepararInicio() {
	var html = '';
	for (var i = 1; i <= 8; i++) {
		html += '<li><label for="modelo' + i + '"><input type="radio" name="modelo" id="modelo' + i + '" value="' + i + '" /><img src="img/img' + i + '.png" /></label></li>';
	}

	document.querySelector('#telaStart ul')
		.innerHTML = html;

	document.getElementById('confirmar')
		.addEventListener('click', confirmarClicado)
}
function confirmarClicado() {
	qtdCarros = parseInt(document.getElementById('qtdCarros').value, 10);

	carroImg = document.querySelector('#telaStart ul input:checked').value;
	carroImg = parseInt(carroImg, 10);

	document.querySelector('#telaStart')
		.style.display = 'none';

	prepararTela();

	document.querySelector('#telaJogo')
		.style.display = 'block';
}
function fim(vencedor) {
	vencedor++;

	document.querySelector('#telaFinal p')
		.innerHTML = 'Carro ' + vencedor + ' é o vencedor';

	document.querySelector('#telaJogo')
		.style.display = 'none';

	document.querySelector('#telaFinal')
		.style.display = 'block';
}















/**/
