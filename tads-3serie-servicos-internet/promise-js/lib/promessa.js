// function resolvido(result) {
//   console.log(result);
//
//   return new Promise(function(resolve, reject){
//     setTimeout(function() { resolve('Deu certo denovo'); }, 2000);
//   });
// }
// function rejeitado(reason){
//   console.log(reason);
// }
//
// var p1 = new Promise(function(resolve, reject) {
//   setTimeout(function() {
//     resolve('Deu certo');
//   }, 2000);
// })
// .then(resolvido)
// .then(resolvido)
// .then(resolvido)
// ;

//////////////////////////////////////////////////

var px = new Promise(function(resolve, reject) {
  setTimeout(function() {
    console.log('Promessa X');
    resolve('X');
  }, 10000);
});
var py = new Promise(function(resolve, reject) {
  setTimeout(function() {
    console.log('Promessa Y');
    resolve('Y');
  }, 5000);
});

var pz = Promise.all([px, py])
.then(function(result) {
  console.log(result);
});










//
