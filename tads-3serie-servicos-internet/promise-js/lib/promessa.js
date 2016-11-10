function resolvido(result) {
  console.log(result);

  return new Promise(function(resolve, reject){
    setTimeout(function() { resolve('Deu certo denovo'); }, 2000);
  });
}
function rejeitado(reason){
  console.log(reason);
}

var p1 = new Promise(function(resolve, reject) {
  setTimeout(function() {
    resolve('Deu certo');
  }, 2000);
})
.then(resolvido)
.then(resolvido)
.then(resolvido)
;













//
