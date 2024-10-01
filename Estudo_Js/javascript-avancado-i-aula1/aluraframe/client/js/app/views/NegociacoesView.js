class NegociacoesView extends View
{
    constructor(element)
    {
        //Referenciando a superclasse, ou seja a classe pai
        //Passando para o construtor da super
        super(element);
    }
    _template(model)
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
                    ${model.negociacao.map((n) =>{
                        
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
                                        model.negociacao.forEach(element => total += element.GetVolume())
                                            return total;                                                                     
                                    })()

                            }
                     </td>
                </tfoot>
            </table>
        `;
    }
}