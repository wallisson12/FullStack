class NegociacaoController
{
    constructor()
    {
        //Sintaxe parecidad com jquery, o bind serve para o 'quereryseletor' ainda seja um metodo 
        //do dom
        let $ = document.querySelector.bind(document);

        this._inputData = $('#data');
        this._inputQuantidade = $('#quantidade');
        this._inputValor = $('#valor');
    }

    ToAdd(event)
    {  
        event.preventDefault();
        
        //Conversao da data
        let date = new Date
        (
            ...this._inputData.value
            .split('-')
            .map((item,indice) => {return item - (indice % 2);})
        );

        //Criando a negociacao
        let negociacao = new Negociacao(date,this._inputQuantidade.value,this._inputValor.value);

        console.log(negociacao);

    }
}