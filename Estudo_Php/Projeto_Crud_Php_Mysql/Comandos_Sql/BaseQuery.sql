create table produtos
(
	id int primary key not null auto_increment,
    tipo varchar(50) not null,
    nome varchar(50) not null,
    descricao varchar(50) not null,
    imagem varchar(80) not null,
    preco decimal(5,2) not null
);