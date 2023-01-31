<?php

namespace education\classes;

class CDProduct extends ShopProduct
{
    public string $coverUrl = 'coverUrl';
    public function __construct(string $title, string $firstName,
                                string $mainName, float $price,
                                private float $playLength)
    {
        parent::__construct($title, $firstName, $mainName, $price);
    }

    public function getPlayLength(): int
    {
        return $this->playLength;
    }

    public function getSummaryLine(): string
    {
        return parent::getSummaryLine() . ": Время звучания {$this->playLength}";
    }

}