
function PlaySound(idSoundElement)
{
    const element = document.querySelector(idSoundElement);
    
    if(element != null && element.localName === 'audio')
    {  
        element.play();
    }
    else
    {
        console.log("Teste");
    }
}

//Para passar para o evento, usamos sem as '()', para indicar que queremos guardar nela e nao executar
//Para resolver isso utilizamos funcoes anonimas
//document.querySelector('.tecla_pom').onclick = PlaySoundPom; 

const ButtonList = document.querySelectorAll('.tecla');

for(let i = 0; i< ButtonList.length; i++)
{
    const currentButton = ButtonList[i];

    // O classlist pega as classes que tem no seletor, como um arry que tem sua posicao
    const idSound = currentButton.classList[1];
    
    //Eventos
    //Funcao anonima, utilizando quando voce precisa passar o paramentro sem chamar a funcao
    currentButton.onclick = function (){PlaySound(`#som_${idSound}`);}

    //O parametro 'event' vai possuir o evento que foi acionado
    //Pegando o keybord
    currentButton.onkeydown = function(event)
    {
        //===, ele alem de comparar o valor, compara tambem o tipo 
        if(event.code === 'Space' || event.code === 'Enter')
        {
            currentButton.classList.add('ativa');
        }    
    }

    currentButton.onkeyup = function()
    {
        if(!currentButton.classList.contains('ativa'))
        {
            currentButton.classList.remove('ativa');
        }
    }
}






