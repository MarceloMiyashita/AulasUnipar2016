CREATE TABLE `categoria` (
  `idcategoria`  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `categoria`  TEXT NOT NULL
);

CREATE TABLE `post` (
  `idpost`  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `idcategoria`  INTEGER NOT NULL,
  `titulo`  TEXT NOT NULL,
  `texto`  TEXT NOT NULL
);

INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES (NULL, 'Esportes');
INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES (NULL, 'Politica');
INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES (NULL, 'Games');

INSERT INTO `post` (`idcategoria`, `titulo`, `texto`) VALUES (1, 'Jogo de Futebol', 'Neste ultimo final de semana, os times jogaram ...');
INSERT INTO `post` (`idcategoria`, `titulo`, `texto`) VALUES (1, 'Mundial de Voley', 'O Brasil venceu a seleção da Servia e Montenegro');
INSERT INTO `post` (`idcategoria`, `titulo`, `texto`) VALUES (3, 'Lançamento de Call Of Dutty XXI', 'Nesta semana será lançado o novo jogo da série Call Of Dutty');
