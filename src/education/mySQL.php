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

        '3.1' => 'INSERT INTO `book` (`title`, `author`, `price`, `amount`) 
                        VALUES (\'Белая гвардия\', \'Булгаков М.А.\', 540.50, 5)',

        '3.2' => 'INSERT INTO `book` (`title`, `author`, `price`, `amount`) 
                        VALUES (\'Идиот\', \'Достоевский Ф.М.\', 460.00, 10)',

        '3.3' => 'INSERT INTO `book` (`title`, `author`, `price`, `amount`) 
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

        '8' => 'SELECT `title`, `author`, `price`, `amount` FROM `book` WHERE (`price` < 500 OR `price` > 600) 
                                                          AND `price` * `amount` >= 5000',

        '9' => 'SELECT `title`, `author` FROM `book` WHERE (`price` BETWEEN 540.50 AND 800) 
                                       AND `amount` IN (2, 3, 5, 7)',

        '10' => 'SELECT `author`, `title` FROM `book` 
                         WHERE `amount` BETWEEN 2 AND 14 ORDER BY `author` DESC, `title` ASC',

        '11' => 'SELECT `title`, `author` FROM `book` WHERE (`title` LIKE \'%_ _%\') 
                                       AND (`author` LIKE \'%С.%\') ORDER BY `title` ASC',

        '12' => 'SELECT `title`, `author`, `price`, 
                        ROUND( IF( `amount` >= 10, `price` * 0.7, `price` * 1.1), 2 ) AS `new_price` 
                        FROM `book` WHERE `title` LIKE \'%_ _%\' ORDER BY `new_price`'
    ];

    /** Решения задач из урока 1.3 */

    $sql['1.3'] = [
        '1.1' => 'SELECT `amount` FROM `book` GROUP BY `amount`',

        '1.2' => 'SELECT DISTINCT `amount` FROM `book`',

        '2' => 'SELECT `author` AS `Автор`, COUNT(*) AS `Различных_книг`, 
                        SUM(`amount`) AS `Количество_экземпляров` FROM `book` GROUP BY `author`',

        '3' => 'SELECT `author`, MIN(`price`) AS `Минимальная_цена`, MAX(`price`) AS `Максимальная_цена`, 
                        AVG(`price`) AS `Средняя_цена` FROM `book` GROUP BY `author`',

        '4' => 'SELECT `author`, SUM(`price` * `amount`) AS `Стоимость`, 
                        ROUND((SUM(`price` * `amount`) * 18 / 100) / (1 + 18 / 100), 2) AS `НДС`, 
                        ROUND(SUM(`price` * `amount`) / (1 + 18 / 100), 2) AS `Стоимость_без_НДС` 
                FROM `book` GROUP BY `author`',

        '5' => 'SELECT MIN(`price`) AS `Минимальная_цена`, MAX(`price`) AS `Максимальная_цена`, 
                        ROUND( SUM(`price`) / COUNT(*), 2) AS `Средняя_цена` FROM `book`',

        '6' => 'SELECT ROUND(AVG(`price`), 2) AS `Средняя_цена`, SUM(`price` * `amount`) AS `Стоимость` 
                FROM `book` WHERE `amount` BETWEEN 5 AND 14',

        '7' => 'SELECT `author`,
                        SUM(`price` * `amount`) AS `Стоимость`
                    FROM `book`
                    WHERE `title` NOT IN (\'Идиот\', \'Белая гвардия\') GROUP BY `author`
                    HAVING SUM(`price` * `amount`) > 5000
                    ORDER BY `Стоимость` DESC',

        '8' => 'SELECT `author`,
                        SUM(`price` * `amount`) AS `Стоимость`
                    FROM `book`
                    WHERE `author` IN (\'Булгаков М.А.\', \'Достоевский Ф.М.\')
                    GROUP BY `author`
                    HAVING SUM(`price` * `amount`) > 3000
                    ORDER BY `Стоимость` DESC'
    ];

    /** Решения задач из урока 1.4 */

    $sql['1.4'] = [
        '1' => 'SELECT `author`, `title`, `price` FROM `book` 
                                  WHERE `price` <= (SELECT ROUND(AVG(`price`), 2) FROM `book`) ORDER BY `price` DESC',

        '2' => 'SELECT `author`, `title`, `price` FROM `book` 
                                  WHERE `price` - (SELECT MIN(`price`) FROM `book`) <= 150 ORDER BY `price` ASC',

        '3' => 'SELECT `author`, `title`, `amount` 
                FROM book 
                WHERE amount IN (SELECT amount 
                                    FROM book 
                                    GROUP BY amount 
                                    HAVING COUNT(amount)=1)',

        '4' => 'SELECT `author`, `title`, `price` FROM `book` 
                                  WHERE `price` < ANY (SELECT MIN(`price`) FROM `book` GROUP BY `author`)',

        '5' => 'SELECT `title`, `author`, `amount`, 
                        (SELECT MAX(`amount`) FROM `book`) - `amount` AS `Заказ` 
                FROM `book` 
                WHERE `amount` <> (SELECT MAX(`amount`) FROM `book`)',

        '6' => 'SELECT `title`, `author`, `amount`, 
                        (SELECT MAX(`price`) FROM `book`) - `price` AS `Разница_цены` 
                FROM `book` 
                WHERE `price` <> (SELECT MAX(`price`) FROM `book`)'
    ];

    /** Решения задач из урока 1.5 */

    $sql['1.5'] = [
        '1' => 'CREATE TABLE `supply` (
                        `supply_id` INT PRIMARY KEY AUTO_INCREMENT,
                        `title` VARCHAR(50),
                        `author` VARCHAR(30),
                        `price` DECIMAL(8, 2),
                        `amount` INT)',

        '2' => 'INSERT INTO `supply` (`title`, `author`, `price`, `amount`)
                VALUES (\'Лирика\', \'Пастернак Б.Л.\', 518.99, 2),
                        (\'Черный человек\', \'Есенин С.А.\', 570.20, 6),
                        (\'Белая гвардия\', \'Булгаков М.А.\', 540.50, 7),
                        (\'Идиот\', \'Достоевский Ф.М.\', 360.80, 3)',

        '3' => 'INSERT INTO `book` (`title`, `author`, `price`, `amount`)
                SELECT `title`, `author`, `price`, `amount` FROM `supply` 
                WHERE `author` NOT IN (\'Булгаков М.А.\', \'Достоевский Ф.М.\')',

        '4' => 'INSERT INTO `book` (`title`, `author`, `price`, `amount`)
                SELECT `title`, `author`, `price`, `amount` FROM `supply`
                WHERE `author` NOT IN (SELECT `author` FROM `book`)',

        '5' => 'UPDATE `book` SET `price` = 0.9 * `price` WHERE `amount` BETWEEN 5 AND 10',

        '6' => 'UPDATE `book`
                SET `buy` = IF(`buy` <= `amount`, `buy`, `amount`),
                    `price` = IF(`buy` = 0, 0.9 * `price`, `price`)',

        '7' => 'UPDATE `book`, `supply` 
                SET `book`.`amount` = `book`.`amount` + `supply`.`amount`,
                    `book`.`price` = (`book`.`price` + `supply`.`price`)/2
                WHERE `book`.`title` = `supply`.`title`',

        '8' => 'DELETE FROM `supply`
                WHERE `author` IN (SELECT `author` FROM `book` GROUP BY `author` HAVING SUM(`amount`) > 10)',

        '9' => 'CREATE TABLE `ordering` AS
                SELECT `author`, `title`, (SELECT ROUND(AVG(`amount`),2) FROM `book`) AS `amount` 
                FROM `book` WHERE `amount` < (SELECT ROUND(AVG(`amount`),2) FROM `book`)',

        '10' => 'CREATE TABLE `ordering` AS
                 SELECT `author`, `title`, (SELECT ROUND(AVG(`amount`),2)+2 FROM `book`) AS `amount` 
                 FROM `book` WHERE `amount` < (SELECT ROUND(AVG(`amount`),2) FROM `book`)'
    ];

    /** Решения задач из урока 1.6 */

    $sql['1.6'] = [
        '1' => 'SELECT `name`, `city`, `per_diem`, `date_first`, `date_last` FROM `trip` 
                 WHERE `name` LIKE \'%а %\' ORDER BY `date_last` DESC',

        '2' => 'SELECT `name` FROM `trip` WHERE `city` = \'Москва\' GROUP BY `name` ORDER BY `name`',

        '3' => 'SELECT `city`, count(`city`) AS `Количество` FROM `trip` GROUP BY `city` ORDER BY `city`',

        '4' => 'SELECT `city`, count(`city`) AS `Количество` FROM `trip` GROUP BY `city` 
                 ORDER BY count(`city`) DESC LIMIT 2',

        '5' => 'SELECT `name`, `city`, DATEDIFF(`date_last`, `date_first`) + 1 AS `Длительность` 
                FROM `trip` WHERE `city` NOT IN (\'Москва\', \'Санкт-Петербург\') ORDER BY `Длительность` DESC',

        '6' => 'SELECT `name`, `city`, `date_first`, `date_last` FROM `trip` 
                WHERE DATEDIFF(`date_last`, `date_first`) = (SELECT MIN(DATEDIFF(`date_last`, `date_first`)) AS `Dlit` 
                                                             FROM `trip`)',

        '7' => 'SELECT `name`, `city`, `date_first`, `date_last` FROM `trip` 
                 WHERE MONTH(`date_first`) = MONTH(`date_last`) ORDER BY `city`, `name`',

        '8' => 'SELECT MONTHNAME(`date_first`) AS `Месяц`, count(MONTHNAME(`date_first`)) AS `Количество` 
                FROM `trip` GROUP BY `Месяц` ORDER BY `Количество` DESC, `Месяц`',

        '9' => 'SELECT `name`, `city`, `date_first`, (DATEDIFF(`date_last`, `date_first`) + 1) * `per_diem` AS `Сумма` 
                FROM `trip` 
                WHERE YEAR(`date_first`) = \'2020\' AND MONTH(`date_first`) IN(2,3) ORDER BY `name`, `Сумма` DESC',

        '10' => 'SELECT `name`, SUM((DATEDIFF(`date_last`, `date_first`) + 1) * `per_diem`) AS `Сумма` FROM `trip` 
                 GROUP BY `name`
                 HAVING `name` IN( SELECT `name` FROM `trip` GROUP BY `name` 
                                                             HAVING COUNT(`name`) > 3) ORDER BY `Сумма` DESC',
    ];

    /** Решения задач из урока 1.7 */

    $sql['1.7'] = [
        '1' => 'CREATE TABLE `fine`(
                    `fine_id` INT PRIMARY KEY AUTO_INCREMENT,
                    `name` VARCHAR(30),
                    `number_plate` VARCHAR(6),
                    `violation` VARCHAR(50),
                    `sum_fine` DECIMAL(8, 2),
                    `date_violation` DATE,
                    `date_payment` DATE
                )',

        '2' => 'INSERT INTO `fine` (`name`, `number_plate`, `violation`, `sum_fine`, `date_violation`, `date_payment`)
                VALUES (\'Баранов П.Е.\', \'Р523ВТ\', \'Превышение скорости(от 40 до 60)\', NULL, \'2020-02-14\', NULL), 
                        (\'Абрамова К.А.\', \'О111АВ\', \'Проезд на запрещающий сигнал\', NULL, \'2020-02-23\', NULL), 
                        (\'Яковлев Г.Р.\', \'Т330ТТ\', \'Проезд на запрещающий сигнал\', NULL, \'2020-03-03\', NULL)',

        '3' => 'UPDATE `fine` AS `f`, `traffic_violation` AS `tv`
                SET `f`.`sum_fine` = `tv`.`sum_fine`
                WHERE `f`.`violation` = `tv`.`violation` AND `f`.`sum_fine` IS NULL',

        '4' => 'SELECT `name`, `number_plate`, `violation` FROM `fine` GROUP BY `name`, `number_plate`, `violation` 
                HAVING COUNT(*) >= 2 ORDER BY `name`, `number_plate`, `violation`',

        '5' => 'UPDATE `fine`, (SELECT `name`, `number_plate`, `violation` FROM `fine` 
                                GROUP BY `name`, `number_plate`, `violation` HAVING COUNT(*) >= 2
                                ORDER BY `name`, `number_plate`, `violation`) AS `query_in`
                SET `fine`.`sum_fine` = `fine`.`sum_fine` * 2
                WHERE `fine`.`date_payment` IS NULL
                AND `fine`.`name` = `query_in`.`name` 
                AND `fine`.`number_plate` = `query_in`.`number_plate` 
                AND `fine`.`violation` = `query_in`.`violation`',

        '6' => 'UPDATE `fine`, `payment`
                SET `fine`.`date_payment` = `payment`.`date_payment`,
                    `fine`.`sum_fine` = IF(DATEDIFF(`payment`.`date_payment`, `payment`.`date_violation`) <= 20, 
                                            `fine`.`sum_fine` / 2, `fine`.`sum_fine`)
                WHERE `fine`.`date_payment`IS NULL 
                AND `fine`.`name` = `payment`.`name`
                AND `fine`.`number_plate` = `payment`.`number_plate` 
                AND `fine`.`violation` = `payment`.`violation` 
                AND `fine`.`date_violation` = `payment`.`date_violation`;',

        '7' => 'CREATE TABLE `back_payment` (SELECT `name`, `number_plate`, `violation`, `sum_fine`, `date_violation` 
                                            FROM `fine` WHERE `date_payment` IS NULL)',

        '8' => 'DELETE FROM `fine` WHERE DATEDIFF(`date_violation`, \'2020-02-01\') < 0',
    ];

    /** Решения задач из урока 2.1 */

    $sql['2.1'] = [
        '1' => '',
        '2' => '',
        '3' => '',
        '4' => '',
        '5' => '',
    ];

    return $sql;
}