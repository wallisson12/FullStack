class NegociacaoController
{
    constructor()
    {
        //Sintaxe parecida com jquery, o bind serve para o 'quereryseletor' ainda seja um metodo 
        //do dom
        let $ = document.querySelector.bind(document);

        this._inputData = $('#data');
        this._inputQuantidade = $('#quantidade');
        this._inputValor = $('#valor');


        this._listaNegociacoes = new ListaNegociacoes();
        this._negociacoesView = new NegociacoesView($('#negociacoesView'));

        this._negociacoesView.Update(this._listaNegociacoes);


        this._mensagem = new Mensagem();
        this._mensagemView = new MensagemView($('#mensagemView'));

        this._mensagemView.Update(this._mensagem);
        
    }

    //Chamado no front no btn do formulario
    ToAdd(event)
    {  
        event.preventDefault();

        //Adcionando na lista 
        this._listaNegociacoes.ToAddNegociacaoList(this._CreatNegociacao());
        
        //Mensagem
        this._mensagem.texto = 'Negociação adcionada com sucesso';


        //Atualiza o html
        this._negociacoesView.Update(this._listaNegociacoes);

        //Atualiza no html
        this._mensagemView.Update(this._mensagem)



        //Limpa 
        this._CleanForm();
    }


    //Criando a negociacao
    _CreatNegociacao()
    {
        let date = DateHelper.TextToDate(this._inputData.value);

        return new Negociacao(date,this._inputQuantidade.value,this._inputValor.value);
    }

    //Limpa o formulario
    _CleanForm()
    {
        this._inputData.value = '';
        this._inputQuantidade.value = 1;
        this._inputValor.value = 0;

        this._inputData.focus();
    }   
}