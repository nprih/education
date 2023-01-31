<?php

namespace education\classes;

class BookProduct extends ShopProduct
{
    public function __construct(string $title, string $firstName,
                                string $mainName, float $price,
                                private int $numPages)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPages;
    }

    public function getNumberOfPages(): int
    {
        return  $this->numPages;
    }

    public function getSummaryLine(): string
    {
        return parent::getSummaryLine() . ": - {$this->numPages} стр.";
    }

    public function getPrice(): int|float
    {
        return $this->price;
    }
}