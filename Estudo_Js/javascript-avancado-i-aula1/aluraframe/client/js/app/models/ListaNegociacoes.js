class ListaNegociacoes
{
    constructor()
    {
        this._negociacoes = [];
    }

    //Acessor
    //O concat faz coom que o conteuno na minha lista, va para essa outra, ou seja, cria uma copia
    get negociacao(){ return [].concat(this._negociacoes)}


    ToAddNegociacaoList(negociacao)
    {
        //O push no arry permite adcionar elementos no arry na ultima posicao
        this._negociacoes.push(negociacao);
    }


}
