
let texto = $(".frase").text();
let tamanhoFrase = $('#tamanho-frase');

let numeroPalavras = texto.split(' ').length;

tamanhoFrase.text(numeroPalavras);

let campo = $('.texto-digitacao');

campo.on("input",function(){

    let contadorPalavras = $('#contador-palavras');
    let contadorCaracters = $('#contador-caracteres');

    //Pega o conteudo de um input
    let conteudo = campo.val();

    let qtdPalavras = conteudo.split(/\S+/).length - 1;
    let qtdCaracters = conteudo.length; 


    contadorPalavras.text(qtdPalavras);
    contadorCaracters.text(qtdCaracters);
    
});


let contadorSegundos = $("#contador-segundos").text();

//Vai ser chamado uma vez
campo.one("focus",function(){

    //Vai ser chamado a cada 1s
    const id = setInterval(function(){
        
        let current = contadorSegundos--;
        $("#contador-segundos").text(current);

            if(current < 1)
            {
                campo.attr("disabled",true);
                clearInterval(id);
            }

    },1000)

});




