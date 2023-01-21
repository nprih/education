<?php

class ShopProduct
{
    public string $title;
    public string $producerMainName;
    public string $producerFirstName;
    protected float $price;
    public int $discount = 0;

    public function __construct(string $title, string $firstName, string $mainName, float $price)
    {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    public function getProducer(): string
    {
        return $this->producerFirstName . ' ' . $this->producerMainName;
    }

    public function getSummaryLine(): string
    {
        return "{$this->title} ({$this->producerMainName}, {$this->producerFirstName})";
    }

    public function setDiscount(int $num): void
    {
        $this->discount = $num;
    }

    public function getPrice(): int|float
    {
        return ($this->price - $this->discount);
    }

}

class BookProduct extends ShopProduct
{
    public int $numPages;

    public function __construct(string $title, string $firstName, string $mainName, float $price, int $numPages)
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
        return "{$this->title} ( $this->producerMainName, $this->producerFirstName ): {$this->numPages} стр.";
    }

    public function getPrice(): int|float
    {
        return $this->price;
    }

}

class CDProduct extends ShopProduct
{
    public float $playLength;
    public function __construct(string $title, string $firstName, string $mainName, float $price, float $playLength)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

    public function getPlayLength(): string
    {
        return $this->playLength;
    }

    public function getSummaryLine(): string
    {
        return "{$this->title} ( $this->producerMainName, $this->producerFirstName ): Время звучания {$this->playLength}";
    }

}

$bookObj = new BookProduct('Собачье сердце', 'Михаил', 'Булгаков', 5.99, 100);
$cdObj = new CDProduct('Классическая музыка', 'Антонио', 'Вивальди', 10.99, 60.33);

debug($bookObj);
debug($cdObj);

debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 94',1);