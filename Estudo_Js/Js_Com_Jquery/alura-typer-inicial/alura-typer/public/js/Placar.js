$('#botao-placar').click(MostraPlacar);


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
