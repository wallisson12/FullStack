/*Criando o banco*/
create table produtos
(
	id int primary key not null auto_increment,
    tipo varchar(50) not null,
    nome varchar(50) not null,
    descricao varchar(50) not null,
    imagem varchar(80) not null,
    preco decimal(5,2) not null
);

/*Buscando no banco*/
SELECT * FROM produtos; 

/*Populando o banco*/
insert into produtos (tipo,nome,descricao,imagem,preco) 
values 
('Café', 'Café Cremoso', 'Café cremoso irresistivelmente suave e que envolve seu paladar',
 'cafe-cremoso.jpg', '5.00');
 
INSERT INTO `serenatoo`.`produtos` (`tipo`, `nome`, `descricao`, `imagem`, `preco`) VALUES ('Café', 'Café com Leite', 'A harmonia perfeita do café e do leite, uma experiência reconfortante', 'cafe-com-leite.jpg', '2.00');

INSERT INTO `serenatoo`.`produtos` (`tipo`, `nome`, `descricao`, `imagem`, `preco`) VALUES ('Café', 'Cappuccino', 'Café suave, leite cremoso e uma pitada de sabor adocicado', 'cappuccino.jpg', '7.00');

INSERT INTO `serenatoo`.`produtos` (`tipo`, `nome`, `descricao`, `imagem`, `preco`) VALUES ('Café', 'Café Gelado', 'Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.', 'cafe-gelado.jpg', '3.00');

INSERT INTO `serenatoo`.`produtos` (`tipo`, `nome`, `descricao`, `imagem`, `preco`) VALUES ('Almoço', 'Bife', 'Bife, arroz com feijão e uma deliciosa batata frita', 'bife.jpg', '27.90');

INSERT INTO `serenatoo`.`produtos` (`tipo`, `nome`, `descricao`, `imagem`, `preco`) VALUES ('Almoço', 'Filé de peixe', 'Filé de peixe salmão assado, arroz, feijão verde e tomate.', 'prato-peixe.jpg', '24.99');

INSERT INTO `serenatoo`.`produtos` (`tipo`, `nome`, `descricao`, `imagem`, `preco`) VALUES ('Almoço', 'Frango', 'Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante', 'prato-frango.jpg', '23.00');

INSERT INTO `serenatoo`.`produtos` (`tipo`, `nome`, `descricao`, `imagem`, `preco`) VALUES ('Almoço', 'Fettuccine', 'Prato italiano autêntico da massa do fettuccine com peito de frango grelhado', 'fettuccine.jpg', '22.50');



 
 
 
 