class Mensagem
{
    //Adcionando valor padrao ao parametro
    constructor(texto = '')
    {
        this._texto = texto;
    }
    
    //Acessor
    get texto(){return this._texto}
    set texto(texto){this._texto = texto}
}