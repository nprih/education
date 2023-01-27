<?php
class ShopProduct
{
    protected int $discount = 0;

    private int $id = 0;

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

$pdo = new connectDB();
$pdo = $pdo->getConnection();

$obj = ShopProduct::getInstance(1,$pdo);

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

abstract class DomainObject
{
    private string $group;
    public function __construct()
    {
        $this->group = static::getGroup();
    }
    public static function create(): DomainObject
    {
        return new static();
    }

    public static function getGroup()
    {
        return 'default';
    }
}

class User extends DomainObject
{
}

class Document extends DomainObject
{
    public static function getGroup(): string
    {
        return 'document';
    }
}

class SpreadSheet extends Document
{

}

//class Checkout
//{
//    final public function totalize(): void
//    {
//
//    }
//}
//
//class IllegalCheckout extends Checkout
//{
//    public function totalize(): void
//    {
//
//    }
//}

class Person
{
    public function output(PersonWriter $writer): void
    {
        $writer->write($this);
    }

    public function getName(): string
    {
        return 'Иван';
    }

    public function getAge(): int
    {
        return 44;
    }
}

interface PersonWriter
{
    public function write(Person $person): void;
}

class Address
{
    private string $number;
    private string $street;

    public function __construct(string $maybenumber, string $maybestreet = null)
    {
        if (is_null($maybestreet)){
            $this->streetaddress = $maybenumber;
        } else {
            $this->number = $maybenumber;
            $this->street = $maybestreet;
        }
    }

    public function __set(string $property, mixed $value): void
    {
        if ($property === 'streetaddress'){
            if (preg_match('/^(\d+.*?)[\s,]+(.+)$/', $value, $matches)){
                $this->number = $matches['1'];
                $this->street = $matches['2'];
            } else {
                throw new \Exception("Ошибка анализа адреса:'{$value}'");
            }
        }
    }

    public function __get(string $property): mixed
    {
        if ($property === 'streetaddress'){
            return $this->number . ' ' . $this->street;
        }
    }

}

class Account
{
    public function __construct(public float $balance)
    {

    }
}

//$person = new Person('Иван', 44, new Account(200));
//$person->setId(343);
//$person2 = clone $person;
//$person->account->balance += 10;
//
//debug($person);
//debug($person2);

class Product
{
    public function __construct(public string $name, public float $price)
    {

    }
}

class ProcessSale
{
    private array $callbacks;


    public function registerCallback(callable $callback): void
    {
        $this->callbacks[] = $callback;
    }

    public function sale(Product $product): void
    {
        print "{$product->name}: обрабатывается \n";

        foreach ($this->callbacks as $callback){

            call_user_func($callback, $product);

        }
    }
}

class Mailer
{
    public function doMail(Product $product): void
    {
        print "</br>Отправляется ({$product->name})</br>";
    }
}

//$logger = fn($product) => print "</br>Запись ({$product->name})</br>";
//
//$processor = new ProcessSale();
//
////$processor->registerCallback($logger);
//$processor->registerCallback([new Mailer(), 'doMail']);
//
//$processor->sale(new Product('Туфли', 6));
//print "</br>";
//$processor->sale(new Product('Кофе', 6));


$person = new Person();
$person->output(
    new class(ERRORS) implements PersonWriter
    {
        private $path;

        public function __construct(string $path)
        {
            $this->path = $path;
        }

        public function write(Person $person): void
        {
            file_put_contents($this->path, $person->getName() . ' ' . $person->getAge() . '</br>');
        }

    }
);

debug(str_replace( $_SERVER['HOME'] . '/', '', __FILE__ ) . ' стр.: 162',1);