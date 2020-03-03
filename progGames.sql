CREATE DATABASE progGames;
-- DROP DATABASE progGames;
USE progGames;

CREATE TABLE usuario(
	idUsuario INT PRIMARY KEY AUTO_INCREMENT,
    nomeUsuario VARCHAR(50),
    nivelUsuario CHAR(1),
    statusUsuario CHAR(1),
    loginUsuario VARCHAR(40),
    senhaUsuario VARCHAR(16),
    fotoUsuario VARCHAR(50)
);

CREATE TABLE categoria(
	idCategoria INT PRIMARY KEY AUTO_INCREMENT,
    nomeCategoria VARCHAR(30)
);

CREATE TABLE postagem(
	idPostagem INT PRIMARY KEY AUTO_INCREMENT,
    tituloPostagem VARCHAR(40),
    subtituloPostagem VARCHAR(30),
    fotoPostagem VARCHAR(50),
    textoPostagem TEXT,
    dataPostagem VARCHAR(20),
    idCategoria INT,
	idUsuario INT
);

CREATE TABLE comentario (
	idComentario INT PRIMARY KEY AUTO_INCREMENT,
	comentario VARCHAR(255),
    dataComentario VARCHAR(20),
    statusComentario CHAR(1),
    idPostagem INT,
    idUsuario INT
);

/* adiciona uma chave estrangeira relacionando com o id da categoria */
ALTER TABLE postagem ADD CONSTRAINT fkCategoria 
FOREIGN KEY(idCategoria) REFERENCES categoria(idCategoria);

/* adiciona uma chave estrangeira relacionando com o id do usuario */
ALTER TABLE postagem ADD CONSTRAINT fkUsuarioPostagem 
FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario);

/* adiciona uma chave estrangeira relacionando com o id da postagem */
ALTER TABLE comentario ADD CONSTRAINT fkPostagem
FOREIGN KEY(idPostagem) REFERENCES postagem(idPostagem);

/* adiciona uma chave estrangeira relacionando com o id do usuario */
ALTER TABLE comentario ADD CONSTRAINT fkUsuarioComentario
FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario);

INSERT INTO categoria (nomeCategoria) VALUES 
('Shooter'),
('FPS'),
('Terceira Pessoa'),
('Aventura'),
('Hack and Slash'),
('Plataforma'),
('RPG'),
('Puzzle'),
('Simulação'),
('MOBA'),
('Esportes'),
('Luta'),
('Dança e Música'),
('Survival Horror'),
('Híbridos');

select * from usuario;
select * from postagem;

INSERT INTO usuario (nomeUsuario,nivelUsuario,loginUsuario,senhaUsuario) VALUES 
('Adminitrador do sistema',1,'DeusGrego',1234);