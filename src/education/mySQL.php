<?php
/** Решение задач из урока 1.1 */

function getSql(): array
{
    /** Решения задач из урока 1.1 */

    $sql['1.1'] = [
        '1' => 'CREATE TABLE `book`(
                        book_id INT PRIMARY KEY AUTO_INCREMENT, 
                        title VARCHAR(50),
                        author VARCHAR(30),
                        price DECIMAL(8, 2),
                        amount INT
                    )',

        '2' => 'INSERT INTO `book` (`title`, `author`, `price`, `amount`) 
                        VALUES (\'Мастер и Маргарита\', \'Булгаков М.А.\', 670.99, 3)',

        '3-1' => 'INSERT INTO `book` (`title`, `author`, `price`, `amount`) 
                        VALUES (\'Белая гвардия\', \'Булгаков М.А.\', 540.50, 5)',

        '3-2' => 'INSERT INTO `book` (`title`, `author`, `price`, `amount`) 
                        VALUES (\'Идиот\', \'Достоевский Ф.М.\', 460.00, 10)',

        '3-3' => 'INSERT INTO `book` (`title`, `author`, `price`, `amount`) 
                        VALUES (\'Братья Карамазовы\', \'Достоевский Ф.М.\', 799.01, 2)'
    ];

    /** Решения задач из урока 1.2 */

    $sql['1.2'] = [
        '1' => 'SELECT * FROM `book`',

        '2' => 'SELECT `author`, `title`, `price` FROM `book`',

        '3' => 'SELECT `title` AS `Название`, `author` AS `Автор` FROM `book`',

        '4' => 'SELECT `title`, `amount`, `amount` * 1.65 AS `pack` FROM `book`',

        '5' => 'SELECT `title`, `author`, `amount`, ROUND(`price` - (`price` * 0.3), 2) AS `new_price` FROM `book`',

        '6' => 'SELECT `author`, `title`, 
                    ROUND(IF(`author` = \'Булгаков М.А.\', price*1.1, 
                        IF(author = \'Есенин С.А.\', price*1.05, price)),2) AS new_price FROM book',

        '7' => 'SELECT `author`, `title`, `price` FROM `book` WHERE `amount` < 10',

        '8' => 'SELECT `title`, `author`, `price`, `amount` FROM `book` WHERE (`price` < 500 OR `price` > 600) AND `price` * `amount` >= 5000',

        '9' => 'SELECT `title`, `author` FROM `book` WHERE (`price` BETWEEN 540.50 AND 800) AND `amount` IN (2, 3, 5, 7)',

        '10' => 'SELECT `author`, `title` FROM `book` WHERE `amount` BETWEEN 2 AND 14 ORDER BY `author` DESC, `title` ASC',

        '11' => 'SELECT `title`, `author` FROM `book` WHERE (`title` LIKE \'%_ _%\') AND (`author` LIKE \'%С.%\') ORDER BY `title` ASC',

        '12' => 'SELECT `title`, `author`, `price`, ROUND( IF( `amount` >= 10, `price` * 0.7, `price` * 1.1), 2 ) AS `new_price` FROM `book` WHERE `title` LIKE \'%_ _%\' ORDER BY `new_price`'
    ];

    /** Решения задач из урока 1.3 */

    $sql['1.3'] = [];

    return $sql;
}