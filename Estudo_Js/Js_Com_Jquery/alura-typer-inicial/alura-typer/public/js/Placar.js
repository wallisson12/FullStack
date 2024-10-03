
function InserePlacar()
{
    //Vai procurar um elemento e depois procurar dentro dele outro
    let corpoTabela = $('.placar').find('tbody');
    
    let usuario = "wa";
    let numPalavras = $('#contador-palavras').text();
    
    let linha = NovaLinha(usuario,numPalavras);
    
    //Funcao para remover linha
    linha.find(".botao-remover").click(function(event)
        {
            //Pega o obejto que foi clicado e envolve ele para ser um dom
            //Para poder ter acesso a metodos do jquery
            $(this).parent().parent().remove();   
        });


    //O metodo append faz a implantacao de uma string que segue o modelo de html em uma tag
    //apropriada (Tipo o innerHTML)  
    corpoTabela.append(linha);
    
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
