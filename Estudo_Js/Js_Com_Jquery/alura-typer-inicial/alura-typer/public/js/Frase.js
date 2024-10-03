$('#botao-frase').click(FraseAleatoria);

function FraseAleatoria()
{
    //Faz a requesicao assincrona, passando um endereco http e retornando com o dado
    $.get("http://localhost:3000/frases",TrocaFraseAleatoria)
}

function TrocaFraseAleatoria(data)
{
    let frase = $('.frase');
    let numeroAleatorio = Math.floor((Math.random() * data.length));
    
    frase.text(data[numeroAleatorio].texto);

    //Chamando a atualizacao das frases
    AtualizaTamnahoFrase();
    AtualizaTempoInicial(data[numeroAleatorio].tempo);
}
