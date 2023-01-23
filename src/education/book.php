<?php
class ShopProduct
{
    protected int $discount = 0;

    public function __construct(private string $title,
                                private string $producerFirstName,
                                private string $producerMainName,
                                protected int | float   $price)
    {
    }

    public function getProducerFirstName(): string
    {
        return $this->producerFirstName;
    }

    public function getProducerMainName(): string
    {
        return $this->producerMainName;
    }

    public function setDiscount(int|float $num): void
    {
        $this->discount = $num;
    }

    public function getDiscount(): int
    {
        return $this->discount;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): int|float
    {
        return ($this->price - $this->discount);
    }

    public function getProducer(): string
    {
        return $this->getProducerFirstName() . ' ' . $this->getProducerMainName();
    }
    public function getSummaryLine(): string
    {
        return "{$this->title} ({$this->producerMainName}, {$this->producerFirstName})";
    }

}

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

class CDProduct extends ShopProduct
{
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


class ShopProductWriter
{
    private array $products = [];

    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }

    public function write(): void
    {
        $str = '';
        foreach ($this->products as $shopProduct) {
            $str .= "{$shopProduct->title}";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->getPrice()})\n";
        }
        print $str;
    }
}

//$bookObj = new BookProduct('Собачье сердце', 'Михаил', 'Булгаков', 5.99, 100);
//$cdObj = new CDProduct('Классическая музыка', 'Антонио', 'Вивальди', 10.99, 60.33);
//
//debug($bookObj);
//debug($cdObj);

class connectDB
{
    private PDO $connection;
    private array $db;
    public function __construct()
    {
        $this->db = getDb('education');
    }

    public function getInstance(): PDO
    {
        if ( empty($this->connection) ){
            $this->connection =  new PDO($this->db['dsn'], $this->db['db_user'], $this->db['db_pass'], $this->db['options']);
        }

        return $this->connection;
    }

}

$pdo = new connectDB();
//$pdo2 = new connectDB();

debug($pdo->getInstance());
//debug($pdo2->getInstance());
//var_dump($pdo->getInstance());

debug('stop',1);



debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 106',1);