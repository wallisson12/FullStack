<?php

namespace Alura\Pdo\Domain\Model;

class Phone
{
    private ?int $id;
    private string $number;
    private string $area_code;
    public function __construct(?int $id,string $number,string $areaCode)
    {
        $this->id = $id;
        $this->number = $number;
        $this->area_code = $areaCode;
    }

    public function formattedPhone(): string
    {
        return "($this->area_code) $this->number)";
    }


}