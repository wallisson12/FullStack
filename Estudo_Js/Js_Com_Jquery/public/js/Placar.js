$('#botao-placar').click(MostraPlacar);
$('#botao-syn').click(SincronizaPlacar);

function InserePlacar()
{
    //Vai procurar um elemento e depois procurar dentro dele outro
    let corpoTabela = $('.placar').find('tbody');
    
    let usuario = "wa";
    let numPalavras = $('#contador-palavras').text();
    
    let linha = NovaLinha(usuario,numPalavras);
    
    //Funcao para remover linha
    linha.find(".botao-remover").click(RemoveLinha)


    //O metodo append faz a implantacao de uma string que segue o modelo de html em uma tag
    //apropriada (Tipo o innerHTML)  
    corpoTabela.append(linha);

    $('.placar').slideDown(500);
    ScrollPlacar();
}

function NovaLinha(usuario,palavras)
{
    //Fazendo isso ele ja cria um elemento tr;
    let linha = $("<tr>");
    let colunaUsuario = $("<td>").text(usuario);
    let colunaPalavras = $("<td>").text(palavras);

    let colunaRemover = $("<td>");
    let link = $("<a>").addClass("botao-remover").attr("href","#placar");
    let icone = $("<i>").addClass("small").addClass("material-icons").text("delete"); 

    //Montando
    link.append(icone);
    colunaRemover.append(link);

    linha.append(colunaUsuario);
    linha.append(colunaPalavras);
    linha.append(colunaRemover);
    
    return linha;

}

function RemoveLinha()
{
    //Pega o obejto que foi clicado e envolve ele para ser um dom
    //Para poder ter acesso a metodos do jquery
    let linha = $(this).parent().parent();
    let TimeFade = 1000;

    linha.fadeOut(TimeFade);   

    //Vai esperar o tempo para executar a logica 
    setTimeout(() => {

        linha.remove();

    }, TimeFade);
}


function MostraPlacar()
{
    //Pode ser substituido por show()
    //$('.placar').css("display","block");
    //Ou posso usar a toggle()
    $('.placar').stop().slideToggle(600);
}

function ScrollPlacar()
{
     //Pegando a posicao da tag plcar
     let posicaoPlacar = $('.placar').offset().top;

     //Fazendo a animacao do corpo da pagina
     //Passanmdo o tempo que a animcao via durar
     $('body').animate({
         scrollTop: posicaoPlacar+"px"
     },1000);
}


function SincronizaPlacar()
{
    let placar = [];

    //Tras todos os filhos de um tag
    //Nesse caso tras todas as tr do tbody
    let linhas = $("tbody>tr")

    //Eh tipo um foreach
    linhas.each(function(){

        //Pega o this, que eh a tr e pega o primeiro filho que eh uma td
        let usuario = $(this).find("td:nth-child(1)").text();
        let palavras = $(this).find("td:nth-child(2)").text();
        
        //Montando a estrutura
        let score = {
            usuario: usuario,
            pontos: palavras
        };


        //Adciona um elemento na lista
        placar.push(score);

    });


    //Objeto do js
    let dados = 
    {
        placar: placar
    };

    //Envia dados para a requisicao
    $.post("http://localhost:3000/placar",dados,function(){

        console.log("Salvou os dados");
    });
}

function AtualizaPlacar()
{
    $.get("http://localhost:3000/placar",function(dados){

        $(dados).each(function()
        {
            let linha = NovaLinha(this.usuario,this.pontos);
            
            linha.find(".botao-remover").click(RemoveLinha);

            //Adcionando no corpo do html
            $('tbody').append(linha);
        });
    });
}
