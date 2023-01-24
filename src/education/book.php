<?php


class ShopProduct implements Chargeble
{
    use PriceUtilities;
    const AVAILABLE = 0;
    const OUT_OF_STOCK = 1;
    protected int $discount = 0;

    private int $id = 0;
    private int $taxrate = 20;

    public function __construct(private string $title,
                                private string $producerFirstName,
                                private string $producerMainName,
                                protected float  $price)
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

    public function getPrice(): float
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

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public static function getInstance(int $id, PDO $pdo): ShopProduct
    {
        $stmt = $pdo->prepare('SELECT * FROM `products` where `id`=?');
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();

        if (empty($row)){
            return null;
        }

        if ($row['type'] == 'book'){
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float) $row['price'],
                (int) $row['numpages']
            );
        }
        elseif ($row['type']){
            $product = new CDProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float) $row['price'],
                (int) $row['playlength']
            );
        }
        else{
            $firstname = (is_null($row['firstname'])) ? '' : $row['firstname'];
            $product = new ShopProduct(
                $row['title'],
                $firstname,
                $row['mainname'],
                (float) $row['price']
            );
        }

        $product->setId((int) $row['id']);
        $product->setDiscount((int) $row['discount']);
        return $product;

    }

}

trait PriceUtilities
{
    private $taxrate = 20;
    public function calculateTax(float $price): float
    {
        return (($this->taxrate / 100) * $price);
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

abstract class ShopProductWriter
{
    protected array $products = [];

    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }

    abstract public function write(): void;

}

class XmlProductWriter extends ShopProductWriter
{
    public function write():void
    {
        $writer = new \XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement('Товары');
        foreach ($this->products as $shopProduct){
            $writer->startElement('Товар');
            $writer->writeAttribute('Наименование', $shopProduct->getTitle());
            $writer->startElement('Резюме');
            $writer->text($shopProduct->getSummaryLine());
            $writer->endElement();
            $writer->endElement();
        }
        $writer->endElement();
        $writer->endDocument();
        print $writer->flush();
    }
}

class TextProductWriter extends ShopProductWriter
{
    public function write():void
    {
        $str = "ТОВАРЫ:\n";
        foreach ($this->products as $shopProduct){
            $str .= $shopProduct->getSummaryLine() . "\n";
        }
        print $str;
    }
}

//$xml = new XmlProductWriter();
//$xml->write();
//$text = new TextProductWriter();
//$text->write();


//$bookObj = new BookProduct('Собачье сердце', 'Михаил', 'Булгаков', 5.99, 100);
//$cdObj = new CDProduct('Классическая музыка', 'Антонио', 'Вивальди', 10.99, 60.33);
//
//debug($bookObj);
//debug($cdObj);

class connectDB
{
    private static PDO|null $connection = null;
    private array $db;

    public function __construct()
    {
        $this->db = getDb('education');
    }

    public function getConnection(): PDO
    {
        if ( is_null(self::$connection) ){
            self::$connection =  new PDO($this->db['dsn'], $this->db['db_user'], $this->db['db_pass'], $this->db['options']);
        }

        return self::$connection;
    }

}

//debug(ShopProduct::AVAILABLE);

//$pdo = new connectDB();
//$pdo = $pdo->getConnection();
//
//$obj = ShopProduct::getInstance(1,$pdo);
//
//debug($obj);

//$sql = 'CREATE TABLE `products` (
//  `id` int unsigned NOT NULL AUTO_INCREMENT,
//  `type` text,
//  `firstname` text,
//  `mainname` text,
//  `title` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
//  `price` float DEFAULT NULL,
//  `numpages` int DEFAULT NULL,
//  `playlength` int DEFAULT NULL,
//  `discount` int DEFAULT NULL,
//  PRIMARY KEY (`id`)
//) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3';
//
//$res = $pdo->prepare($sql);
//$res->execute();

//$res = $res->fetchAll(PDO::FETCH_ASSOC);

interface Chargeble
{
    public function getPrice(): float;
}





debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 133',1);