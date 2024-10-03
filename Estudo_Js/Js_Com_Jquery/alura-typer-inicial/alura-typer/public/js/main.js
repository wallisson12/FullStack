
const contadorValorInicial = $("#contador-segundos").text();
let campo = $('.texto-digitacao');
let contadorPalavras = $('#contador-palavras');
let contadorCaracters = $('#contador-caracteres');
let botaoReiniciar = $('#botao-reiniciar');

//chamado quando o documento esta pronto para uso, posso usar so $(function(){logica}), que faz a mesma coisa
$(document).ready(function()
{   
    AtualizaTamnahoFrase();
    InicializaContador();
    InicializaConometro();
    VerificaTextoDigitado()

    //Outra maneira de chamar o evento de click
    botaoReiniciar.click(ReiniciaGame);

});


//Atualiza o tamnaho do texto para escrever
function AtualizaTamnahoFrase()
{   
    //Pegando a referencia
    let texto = $(".frase").text();
    let tamanhoFraseTxt = $('#tamanho-frase');

    //Adcionando o tamanho
    let numeroPalavras = texto.split(' ').length;
    tamanhoFraseTxt.text(numeroPalavras);
}

function InicializaContador()
{
    campo.on("input",function(){
        
        //Pega o conteudo de um input
        let conteudo = campo.val();
    
        let qtdPalavras = conteudo.split(/\S+/).length - 1;
        let qtdCaracters = conteudo.length; 
    
    
        contadorPalavras.text(qtdPalavras);
        contadorCaracters.text(qtdCaracters);
        
    });
}


function InicializaConometro()
{
    let contadorSegundos = $("#contador-segundos").text();
    
    //Vai ser chamado uma vez
    campo.one("focus",function(){
    
        //Habilita o botao de reiniciar
        botaoReiniciar.attr('disabled',true);

        //Vai ser chamado a cada 1s
        const id = setInterval(function(){
            
            let current = contadorSegundos--;
            $("#contador-segundos").text(current);

                //Jogo finaliza
                if(current < 1)
                {
                    FinalizaGame();
                    
                    //Paro a execucao do update
                    clearInterval(id);
                }
    
        },1000)
    
    });
}


function VerificaTextoDigitado()
{
    let frase = $('.frase').text();
    
    campo.on("input",function()
    {
        let digitado = campo.val();
    
        //Responsavel por pega um pedaco da string comecando de um ponto ate o outro
        //Vai comparar do comeco ate onde consiguiu digitar
        let comparavel = frase.substr(0,digitado.length);
    
        if(digitado === comparavel)
        {
            //O toggle faz a mesma coisa que o add e remove
            campo.addClass('campo-correto');
            campo.removeClass('campo-errado');
        }
        else
        {   
            campo.addClass('campo-errado');
            campo.removeClass('campo-correto');
        }
    });
}



function ReiniciaGame()
{
    //Removendo a disabilitacao do input
    campo.attr('disabled',false);

    //Lipando o campo
    campo.val("");

    //Zerando os contadores
    contadorCaracters.text("0");
    contadorPalavras.text("0");
    
    //Voltando o tempo inicial
    $("#contador-segundos").text(contadorValorInicial);

    //Voltando a contabilizar o tempo    
    InicializaConometro();

    //Voltando o css
    campo.removeClass('campo-desativado');
    campo.removeClass('campo-correto');
    campo.removeClass('campo-errado');
}


function FinalizaGame()
{
    InserePlacar();

    botaoReiniciar.removeAttr('disabled');
    
    campo.addClass('campo-desativado');
    
    //Adciono um elemento na minha tag html e ja pasa o valor
    campo.attr("disabled",true);
    
}




