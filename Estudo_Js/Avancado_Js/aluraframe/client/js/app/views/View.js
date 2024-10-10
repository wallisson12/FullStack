class View
{
    constructor (element){this._element = element}


    _template(model){throw new Error('O metodo template deve ser implementado');}

    //Esse innerHTML, faz com que a string, caso estiver com a formatacao certa, vire elemento do dom
    Update(model){this._element.innerHTML = this._template(model)}
}
