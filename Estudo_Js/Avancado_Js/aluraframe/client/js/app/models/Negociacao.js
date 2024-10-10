class Negociacao
{
    constructor (data,quantidade,valor)
    {
        this._data = new Date(data.getTime());
        this._quantidade = quantidade;
        this._valor = valor;

        //Deixar o objeto como readonly
        //Ele consegue parar os atributos que nao sao objetos
        Object.freeze(this);
    }

    //Acessores, colocar a palavra reservada 'get'
    get date() {return new Date(this._data.getTime());}
    get quantidade() {return this._quantidade;}
    get valor(){return this._valor};


    //Metodo
    GetVolume() {return this._quantidade * this._valor;}
}