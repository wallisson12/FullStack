const ButtonList = document.querySelectorAll('.tecla');

function PlaySound(idSoundElement)
{
    document.querySelector(idSoundElement).play();
}

//Para passar para o evento, usamos sem as '()', para indicar que queremos guardar nela e nao executar
//Para resolver isso utilizamos funcoes anonimas
//document.querySelector('.tecla_pom').onclick = PlaySoundPom; 

let i = 0
while(i<ButtonList.length)
{
    const currentButton = ButtonList[i];

    // O classlist pega as classes que tem no seletor
    const idSound = currentButton.classList[1];
    
    //Funcao anonima
    currentButton.onclick = function (){PlaySound(`#som_${idSound}`)};
    i++;
}






