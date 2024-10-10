<?php

class Series extends Titulo
{
    private int $_temporadas;
    private int $_minutosPorEpisodio;
    private int $_episodiosPorTemporada;

    public function __construct(string $nome,Genero $genero,int $anoLancamento,int $temporadas, int $minutosPorEpisodio, int $episodiosPorTemporada)
    {
        parent::__construct($nome,$genero,$anoLancamento);
        $this->_temporadas = $temporadas;
        $this->_minutosPorEpisodio = $minutosPorEpisodio;
        $this->_episodiosPorTemporada = $episodiosPorTemporada;
    }

    public  function  DuracaoEmMinutos():int
    {
        return $this->_minutosPorEpisodio * $this->_episodiosPorTemporada * $this->_temporadas;
    }
}