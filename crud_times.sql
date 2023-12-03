CREATE TABLE campeonatos (
                             id int AUTO_INCREMENT NOT NULL,
                             nome varchar(70) NOT NULL,
                             premiacao int NOT NULL,
                             CONSTRAINT pk_campeonatos PRIMARY KEY (id)
);

CREATE TABLE times (
                       id int AUTO_INCREMENT NOT NULL,
                       nome varchar(70) NOT NULL,
                       classificacao integer NOT NULL,
                       ano_fundacao int NOT NULL,
                       id_estado int NOT NULL,
                       id_campeonato int NOT NULL,
                       CONSTRAINT pk_times PRIMARY KEY (id)
);

CREATE TABLE estados (
                         id int AUTO_INCREMENT NOT NULL,
                         nome varchar(70) NOT NULL,
                         sigla varchar(2) NOT NULL,
                         CONSTRAINT pk_estados PRIMARY KEY (id)
);

ALTER TABLE times ADD CONSTRAINT fk_campeonatos FOREIGN KEY (id_campeonato) REFERENCES campeonatos (id);
ALTER TABLE times ADD CONSTRAINT fk_estados FOREIGN KEY (id_estado) REFERENCES estados (id);


INSERT INTO estados (nome, sigla) VALUES ('Acre', 'AC');
INSERT INTO estados (nome, sigla) VALUES ('Alagoas', 'AL');
INSERT INTO estados (nome, sigla) VALUES ('Amapá', 'AP');
INSERT INTO estados (nome, sigla) VALUES ('Amazonas', 'AM');
INSERT INTO estados (nome, sigla) VALUES ('Bahia', 'BA');
INSERT INTO estados (nome, sigla) VALUES ('Ceará', 'CE');
INSERT INTO estados (nome, sigla) VALUES ('Distrito Federal', 'DF');
INSERT INTO estados (nome, sigla) VALUES ('Espírito Santo', 'ES');
INSERT INTO estados (nome, sigla) VALUES ('Goiás', 'GO');
INSERT INTO estados (nome, sigla) VALUES ('Maranhão', 'MA');
INSERT INTO estados (nome, sigla) VALUES ('Mato Grosso', 'MT');
INSERT INTO estados (nome, sigla) VALUES ('Mato Grosso do Sul', 'MS');
INSERT INTO estados (nome, sigla) VALUES ('Minas Gerais', 'MG');
INSERT INTO estados (nome, sigla) VALUES ('Pará', 'PA');
INSERT INTO estados (nome, sigla) VALUES ('Parana', 'PR');
INSERT INTO estados (nome, sigla) VALUES ('Paraíba', 'PB');
INSERT INTO estados (nome, sigla) VALUES ('Pernambuco', 'PE');
INSERT INTO estados (nome, sigla) VALUES ('Piauí', 'PI');
INSERT INTO estados (nome, sigla) VALUES ('Rio de Janeiro', 'RJ');
INSERT INTO estados (nome, sigla) VALUES ('Rio Grande do Norte', 'RN');
INSERT INTO estados (nome, sigla) VALUES ('Rio Grande do Sul', 'RS');
INSERT INTO estados (nome, sigla) VALUES ('Rondônia', 'RO');
INSERT INTO estados (nome, sigla) VALUES ('Roraima', 'RR');
INSERT INTO estados (nome, sigla) VALUES ('Santa Catarina', 'SC');
INSERT INTO estados (nome, sigla) VALUES ('São Paulo', 'SP');
INSERT INTO estados (nome, sigla) VALUES ('Sergipe', 'SE');
INSERT INTO estados (nome, sigla) VALUES ('Tocantins', 'TO');

INSERT INTO campeonatos (nome, premiacao) VALUES ('Campeonato Brasileiro de Futebol', '50');
INSERT INTO campeonatos (nome, premiacao) VALUES ('Copa Libertadores da América', '94');
INSERT INTO campeonatos (nome, premiacao) VALUES ('Copa do Brasil de Futebol', '100');
INSERT INTO campeonatos (nome, premiacao) VALUES ('Copa Sul-Americana', '77');



