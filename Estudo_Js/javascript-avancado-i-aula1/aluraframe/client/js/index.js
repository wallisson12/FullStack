var campos = [

    document.querySelector('#data'),
    document.querySelector('#quantidade'),
    document.querySelector('#valor'),   
];

//Pegando a tbody no index
var tBody = document.querySelector('table tbody')

//Adcionando um evento ao seletor
document.querySelector('.form').addEventListener('submit',function(event){

    //Permite exibir o formulario sem a necessidade de recarregar
    event.preventDefault()

    var tr = document.createElement('tr');

    campos.forEach(function(campo)
    {

        var td = document.createElement('td');
        td.textContent = campo.value;

        //Adcionando um filho
        tr.appendChild(td); 
    });

    var tdVolume = document.createElement('td');
    tdVolume.textContent = campos[1].value * campos[2].value;
    tr.appendChild(tdVolume);

    //Adcionando um filho    
    tBody.appendChild(tr);


    campos[0].value = '';
    campos[1].value = 0;
    campos[2].value = 0;

    //Esse campo vai ganhar o foco
    campos[0].focus();
    
})
