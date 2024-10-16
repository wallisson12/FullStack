<?php

    //trazendo o codigo de conecao com o banco
    require_once "src/conexao_db.php";

    //Fazendo as consultas no banco
    $SQL1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco ";
    $stdment = $pdo->query($SQL1);
    $produtosCafe = $stdment->fetchAll(PDO::FETCH_ASSOC);

    $SQL2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco ";
   $stdment2 =  $pdo->query($SQL2);
   $produtosAlmoco = $stdment2->fetchAll(PDO::FETCH_ASSOC);

?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Serenatto - Cardápio</title>

</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
                <?php foreach ($produtosCafe as $produto) : ?>

                    <div class="container-produto">
                        <div class="container-foto">
                            <img src=<?php echo 'img/'.$produto['imagem'] ?> >
                        </div>
                        <p><?php echo $produto['nome']?></p>
                        <p><?php echo $produto['descricao'] ?></p>
                        <p><?php echo 'R$: '. $produto['preco'] ?> </p>
                    </div>

                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">

                <?php foreach ($produtosAlmoco as $almoco) : ?>

                    <div class="container-produto">
                        <div class="container-foto">
                            <img src= <?php echo 'img/'.$almoco['imagem'] ?> >
                        </div>
                        <p><?php echo $almoco['nome'] ?></p>
                        <p><?php echo $almoco['descricao']?></p>
                        <p><?php echo 'R$: '.$almoco['preco'] ?></p>
                    </div>

                <?php endforeach; ?>
            </div>

        </section>
    </main>
</body>
</html>