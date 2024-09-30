class NegociacoesView
{
    constructor(element)
    {
        this._element = element; 
    }

    _template(modelo)
    {
        return `
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>DATA</th>
                        <th>QUANTIDADE</th>
                        <th>VALOR</th>
                        <th>VOLUME</th>
                    </tr>
                </thead>
                
                <tbody>
                </tbody>
                    ${modelo.negociacao.map((n) =>{
                        
                        //O join, faz a juncao de todos os elementos do meu arry (uma string)
                        return `

                            <tr>

                                <td>${DateHelper.DateToText(n.date)}</td>
                                <td>${n.quantidade}</td>
                                <td>${n.valor}</td>
                                <td>${n.GetVolume()}</td>
                            </tr>
                        
                        `

                     }).join('')}

                <tfoot>
                     <td colspan="3">Volume</td>
                     <td> ${
                                //Posso utilizar no arry o 'reduce' que faz a operacao em cada elemento e retorna um valor
                                (function()
                                    {
                                        let total = 0;
                                        modelo.negociacao.forEach(element => total += element.GetVolume())
                                            return total;                                                                     
                                    })()

                            }
                     </td>
                </tfoot>
            </table>
        `;
    }

    Update(modelo)
    {
        //Esse innerHTML, faz com que a string, caso estiver com a formatacao certa, vire elemento do dom
        this._element.innerHTML = this._template(modelo);
    }
}