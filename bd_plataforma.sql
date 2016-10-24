
CREATE TABLE categoria (
                id_categoria INT NOT NULL,
                categoria_projeto VARCHAR(30) NOT NULL,
                CONSTRAINT PKCATEGORIA PRIMARY KEY (id_categoria)
);


CREATE TABLE usuario (
                codigo_usuario INT AUTO_INCREMENT NOT NULL,
                id_categoria INT,
                cpf VARCHAR(11) NOT NULL,
                login VARCHAR(30) UNIQUE NOT NULL,
                status VARCHAR(15) NOT NULL,
                senha VARCHAR(10) NOT NULL,
                nome VARCHAR(100) NOT NULL,
                pais VARCHAR(50) NOT NULL,
                cidade VARCHAR(30) NOT NULL,
                estado VARCHAR(20) NOT NULL,
                rua VARCHAR(30) NOT NULL,
                numero_residencia INT NOT NULL,
                bairro VARCHAR(30) NOT NULL,
                data_nascimento DATE NOT NULL,
                email VARCHAR(40) NOT NULL,
                tipo INT NOT NULL,
                CONSTRAINT PKUSUARIO PRIMARY KEY (codigo_usuario)
);


CREATE TABLE projeto (
                codigo_projeto INT AUTO_INCREMENT NOT NULL,
                id_categoria INT NOT NULL,
                codigo_usuario INT NOT NULL,
                nome_projeto VARCHAR(30) NOT NULL,
                duracao_projeto INT NOT NULL,
                valor_projeto DOUBLE PRECISION NOT NULL,
                status VARCHAR(20) NOT NULL,
                CONSTRAINT PKPROJETO PRIMARY KEY (codigo_projeto)
);


ALTER TABLE projeto ADD CONSTRAINT categoria_projeto_fk
FOREIGN KEY (id_categoria)
REFERENCES categoria (id_categoria)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE usuario ADD CONSTRAINT categoria_usuario_fk
FOREIGN KEY (id_categoria)
REFERENCES categoria (id_categoria)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE projeto ADD CONSTRAINT usuario_projeto_fk
FOREIGN KEY (codigo_usuario, id_categoria)
REFERENCES usuario (codigo_usuario, id_categoria)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
