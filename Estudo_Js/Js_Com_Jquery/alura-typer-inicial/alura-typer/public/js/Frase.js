$('#botao-frase').click(FraseAleatoria);
$('#botao-frase-id').click(BuscaFrase);

function FraseAleatoria()
{
    let spinner = $('#spinner');

    //Animacao do spinner
    spinner.show();

    //Faz a requesicao assincrona, passando um endereco http e retornando com o dado
    //O fail(), eh responsavel por verificar erro na requisicao
    //O always(), sempre vai executar independente se der certo ou nao
    $.get("http://localhost:3000/frases",TrocaFraseAleatoria).
    fail(TratamentoErroRequisicao).
    always(function()
    {
        spinner.hide();
    });

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

function TratamentoErroRequisicao()
{
    let mensagemErro = $('#erro');
    let timeShow = 2000;

    //Mostra a mensagem de erro
    mensagemErro.show();

    //Faz uma funcao que espera um certo tempo para executar
    setTimeout(()=>
    {
        mensagemErro.hide();
    },timeShow);
}

function BuscaFrase()
{
    $('#spinner').show();

    let idFrase = $('#frase-id').val();

    //Passar o dado que quero mandar, como um objeto do js
    let dados = {id:idFrase};

    //A propria requisicao tem uma maniera de fazer verificacao 
    //ela tem um paramento onde voce pode mandar os dados
    $.get("http://localhost:3000/frases",dados,TrocaFraseId).
    fail(TratamentoErroRequisicao).
    always( () => $('#spinner').hide() ); 

}

function TrocaFraseId(data)
{
    let frase = $('.frase');
    frase.text(data.texto);

    //Chamando a atualizacao das frases
    AtualizaTamnahoFrase();
    AtualizaTempoInicial(data.tempo);
}
