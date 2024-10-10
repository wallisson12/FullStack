class DateHelper
{
    constructor()
    {
        //Lancando uma exececao
        throw new Error('DateHelper nao pode ser instanciada');
    }

    static TextToDate(text)
    {

        //Expressao regular(/\d{4}-\d{2}-\d{2}/)
        //O ^ e $, impede que coloque mais numeros que o permitido
        if(!/\d{4}-\d{2}-\d{2}/.test(text)) {throw new Error('Formato da data errada, deve estar yyyy-mm-dd');} 

        //Conversao da data
        //Na hora que coloco o split, ele vira um arry com 3 elementos
        //Os tres pontos, faz com que cada elemento do arry seja um elemento do date
        return new Date(...text.split('-').map((item,i) => { return item - (i % 2)}));
    }

    static DateToText(date)
    {
        
        //Faz a soma de mais 1, pois em js, a data eh armazenada de 0 a 11 no arry
        //O getFullYEar pega o ano todo
        return (`${date.getDate()}/${(date.getMonth() + 1)}/${date.getFullYear()}`);
    }

}