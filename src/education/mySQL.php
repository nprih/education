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
        '1' => 'CREATE TABLE `author`(
                    `author_id` INT PRIMARY KEY AUTO_INCREMENT,
                    `name_author` VARCHAR(50)
                )',

        '2' => 'INSERT INTO `author` (`name_author`)
                VALUES (\'Булгаков М.А.\'), (\'Достоевский Ф.М.\'), (\'Есенин С.А.\'), (\'Пастернак Б.Л.\')',

        '3' => 'CREATE TABLE `book` (
                        `book_id` INT PRIMARY KEY AUTO_INCREMENT, 
                        `title` VARCHAR(50), 
                        `author_id` INT NOT NULL, 
                        `genre_id` INT /*NOT NULL*/,
                        `price` DECIMAL(8,2), 
                        `amount` INT, 
                        FOREIGN KEY (`author_id`)  REFERENCES author (`author_id`),
                        FOREIGN KEY (`genre_id`)  REFERENCES genre (`genre_id`)
                    )',

        '4' => 'CREATE TABLE `book` (
                    `book_id` INT PRIMARY KEY AUTO_INCREMENT, 
                    `title` VARCHAR(50), 
                    `author_id` INT NOT NULL, 
                    `genre_id` INT,
                    `price` DECIMAL(8,2), 
                    `amount` INT, 
                    FOREIGN KEY (`author_id`)  REFERENCES author (`author_id`) ON DELETE CASCADE,
                    FOREIGN KEY (`genre_id`)  REFERENCES genre (`genre_id`) ON DELETE SET NULL
                )',

        '5' => 'INSERT INTO `book` (`title`, `author_id`, `genre_id`, `price`, `amount`)
                VALUES (\'Стихотворения и поэмы\', 3, 2, 650.00, 15),
                        (\'Черный человек\', 3, 2, 570.20, 6),
                        (\'Лирика\', 4, 2, 518.99, 2)'
    ];

    /** Решения задач из урока 2.2 */

    $sql['2.2'] = [
        '1' => 'SELECT `book`.`title`, `genre`.`name_genre`, `book`.`price` FROM `book`
                INNER JOIN `genre` ON `genre`.`genre_id` = `book`.`genre_id`
                INNER JOIN `author` ON `author`.`author_id` = `book`.`author_id`
                WHERE `book`.`amount` > 8
                ORDER BY `book`.`price` DESC',

        '2' => 'SELECT `genre`.`name_genre` FROM `genre` LEFT JOIN `book`
                        ON `genre`.`genre_id` = `book`.`genre_id`
                WHERE `book`.`genre_id` IS NULL',

        '3' => 'SELECT `name_city`, `name_author`, 
                        DATE_ADD(\'2020-01-01\', INTERVAL FLOOR(RAND() * 365) DAY) AS `Дата` 
                FROM `city` CROSS JOIN `author` ORDER BY `name_city`, `Дата` DESC',

        '4' => 'SELECT `name_genre`, `title`, `name_author` FROM `genre` 
                INNER JOIN `book` ON `genre`.`genre_id` = `book.genre_id`
                INNER JOIN `author` ON `book`.`author_id` = `author`.`author_id`
                WHERE `name_genre` LIKE \'%роман%\' ORDER BY title',

        '5' => 'SELECT `author`.`name_author`, SUM(`book`.`amount`) AS `Количество` 
                FROM `author` LEFT JOIN `book` ON `author`.`author_id` = `book`.`author_id` 
                GROUP BY `author`.`name_author`
                HAVING `Количество` < 10 OR `Количество` IS NULL
                ORDER BY `Количество`',

        '6' => 'SELECT `name_author` FROM `author` INNER JOIN `book` ON `author`.`author_id` = `book`.`author_id`
                WHERE `book`.`author_id` IN(SELECT `author_id` FROM `book` GROUP BY `author_id`
                                            HAVING AVG(`genre_id`) = 1 OR COUNT(`genre_id`) = 1)
                GROUP BY `name_author` ORDER BY `name_author`',

        '7.1' => 'SELECT `title`, `name_author`, `name_genre`, `price`, `amount` 
                FROM `book` INNER JOIN `author` ON `book`.`author_id` = `author`.`author_id`
                INNER JOIN `genre` ON `book`.`genre_id` = `genre`.`genre_id`
                WHERE `book`.`genre_id` IN(
                SELECT `summs`.`genre_id` FROM (SELECT `genre_id`, SUM(`amount`) AS `sum_amount` 
                                                FROM `book` GROUP BY `genre_id`) `summs`
                WHERE `summs`.`sum_amount` = (SELECT MAX(`sum_amount`) AS `max_qty` 
                FROM (SELECT `genre_id`, SUM(`amount`) AS `sum_amount` FROM `book` GROUP BY `genre_id`) `summs`))
                ORDER BY `title`',

        '7.2' => 'WITH `summs` AS (SELECT `genre_id`, SUM(`amount`) AS `sum_amount` FROM `book` GROUP BY `genre_id`)
                SELECT `title`, `name_author`, `name_genre`, `price`, `amount` 
                FROM `book` INNER JOIN `author` ON `book`. `author_id` = `author`.`author_id`
                INNER JOIN `genre` ON `book`.`genre_id` = `genre.genre_id`
                WHERE `book`.`genre_id` IN(SELECT `summs`.`genre_id` FROM `summs`
                                       WHERE `summs`.`sum_amount` = (SELECT MAX(`sum_amount`) FROM `summs`) 
                ) ORDER BY `title`',

        '8' => 'SELECT `title` `Название`, `author` `Автор`, `book`.`amount` + `supply`.`amount` `Количество` 
                FROM `book` JOIN `supply` USING(`title`, `price`)',

        '9' => 'SELECT `title`, `name_author`, `name_genre`, `price`, `name_city`, 
                        DATE_ADD(\'2020-01-01\', INTERVAL FLOOR(RAND() * 365) DAY) AS `Дата`
                FROM `book` 
                JOIN `author` USING(author_id)
                JOIN `genre` USING(genre_id)
                JOIN (SELECT title FROM `book` ORDER BY `amount` DESC LIMIT 3) `max_count` USING(`title`)
                CROSS JOIN `city`
                ORDER BY `name_author`, `name_city`',
    ];

    /** Решения задач из урока 2.3 */

    $sql['2.3'] = [
        '1' => 'UPDATE `book`
                INNER JOIN `author` USING(`author_id`)
                INNER JOIN `supply` ON `book`.`title` = `supply`.`title` AND `author`.`name_author` = `supply`.`author`
                SET `book`.`amount` = `book`.`amount` + `supply`.`amount`,
                    `book`.`price` = (`book`.`price` * `book`.`amount` + `supply`.`price` * `supply`.`amount`) / (`book`.`amount` + `supply`.`amount`),
                    `supply`.`amount` = 0
                WHERE `book`.`price` <> `supply`.`price`',

        '2' => 'INSERT INTO `author` (`author`.`name_author`)
                SELECT `author` FROM `author` RIGHT JOIN `supply` ON `author`.`name_author` = `supply`.`author`
                WHERE `name_author` IS NULL',

        '3' => 'INSERT INTO `book` (`title`, `author_id`, `price`, `amount`) 
                SELECT `title`, `author_id`, `price`, `amount` FROM  `author` 
                INNER JOIN `supply` ON `author`.`name_author` = `supply`.`author`
                WHERE `amount` <> 0;
                
                SELECT * FROM `book`;',

        '4' => 'UPDATE `book`
                SET `genre_id` = (SELECT `genre_id` FROM `genre` WHERE `name_genre` = \'Поэзия\')
                WHERE `book_id` = 10;
                
                UPDATE `book`
                SET `genre_id` = (SELECT `genre_id` FROM `genre` WHERE `name_genre` = \'Приключения\')
                WHERE `book_id` = 11;',

        '5' => 'DELETE FROM `author` WHERE `author_id` IN (SELECT `author_id` FROM `book` 
                                                              GROUP BY `author_id` HAVING SUM(`amount`) < 20);',

        '6' => 'DELETE FROM `genre`
                WHERE `genre_id` IN (SELECT `genre_id` FROM `book` GROUP BY `genre_id` HAVING COUNT(`title`) < 4)',

        '7' => 'DELETE FROM `author`
                USING `book`
                INNER JOIN `author` USING(`author_id`)
                INNER JOIN `genre` USING(`genre_id`)
                WHERE `name_genre` = \'Поэзия\'',

        '8' => 'DELETE FROM `author`
                USING `book`
                INNER JOIN `author` USING(`author_id`)
                INNER JOIN `genre` USING(`genre_id`)
                WHERE `name_genre` = \'Роман\''
    ];

    /** Решения задач из урока 2.4 */

    $sql['2.4'] = [
        '1' => 'SELECT `buy`.`buy_id`, `book`.`title`, `book`.`price`, `buy_book`.`amount`
                FROM 
                    `client` 
                    INNER JOIN `buy` ON `client`.`client_id` = `buy`.`client_id`
                    INNER JOIN `buy_book` ON `buy_book`.`buy_id` = `buy`.`buy_id`
                    INNER JOIN `book` ON `buy_book`.`book_id` = `book`.`book_id`
                WHERE `name_client` =\'Баранов Павел\' ORDER BY `buy`.`buy_id`, `book`.`title`',

        '2' => 'SELECT `name_author`, `title`, COUNT(`buy_book`.`amount`) `Количество` FROM `book`
                INNER JOIN `author` USING(`author_id`)
                LEFT JOIN `buy_book` USING(`book_id`)
                GROUP BY `title`, `name_author`
                ORDER BY `name_author`, `title`',

        '3' => 'SELECT `name_city`, COUNT(*) AS `Количество` FROM `city`
                INNER JOIN `client` USING(`city_id`)
                INNER JOIN `buy` ON `client`.`client_id` = `buy`.`client_id`
                GROUP BY `name_city` ORDER BY `Количество` DESC, `name_city`',

        '4' => 'SELECT `buy_id`, `date_step_end` FROM `step`
                INNER JOIN `buy_step` USING(`step_id`)
                WHERE `step_id` = 1 AND `date_step_end` IS NOT NULL',

        '5' => 'SELECT `buy`.`buy_id`, `name_client`, SUM(`book`.`price` * `buy_book`.`amount`) `Стоимость` FROM `book`
                INNER JOIN `buy_book` ON `book`.`book_id` = `buy_book`.`book_id` 
                INNER JOIN `buy` ON `buy`.`buy_id` = `buy_book`.`buy_id`
                INNER JOIN `client` ON `client`.`client_id` = `buy`.`client_id`
                GROUP BY `buy`.`buy_id` ORDER BY `buy`.`buy_id`',

        '6' => 'SELECT `buy_id`, `name_step` FROM `step`
                JOIN `buy_step` USING(step_id)
                WHERE `date_step_beg` IS NOT NULL AND `date_step_end` IS NULL ORDER BY `buy_id`',

        '7' => 'SELECT `buy`.`buy_id`, 
                        DATEDIFF(`buy_step`.`date_step_end`, `buy_step`.`date_step_beg`) `Количество_дней`, 
                        IF((DATEDIFF(`buy_step`.`date_step_end`, `buy_step`.`date_step_beg`) - `city`.`days_delivery`) > 0, 
                            (DATEDIFF(`buy_step`.`date_step_end`, `buy_step`.`date_step_beg`) - `city`.`days_delivery`), 0) `Опоздание` 
                FROM `city`
                JOIN `client` ON `city`.`city_id` = `client`.`city_id`
                JOIN `buy` ON `client`.`client_id` = `buy`.`client_id`
                JOIN `buy_step` ON `buy`.`buy_id` = `buy_step`.`buy_id`
                JOIN `step` ON `step`.`step_id` = `buy_step`.`step_id`
                WHERE `buy_step`.`step_id` = 3 AND `buy_step`.`date_step_end` IS NOT NULL',

        '8' => 'SELECT `client`.`name_client` FROM `author`
                JOIN `book` ON `author`.`author_id` = `book`.`author_id`
                JOIN `buy_book` ON `book`.`book_id` = `buy_book`.`book_id`
                JOIN `buy` ON `buy`.`buy_id` = `buy_book`.`buy_id`
                JOIN `client` ON `client`.`client_id` = `buy`.`client_id`
                WHERE `name_author` LIKE \'Достоевский%\'
                GROUP BY `name_author`, `client`.`client_id` ORDER BY `client`.`name_client`',

        '9' => 'WITH `summ` AS (SELECT SUM(`buy_book`.`amount`) `summ` FROM `genre`
                JOIN `book` USING(`genre_id`)
                JOIN `buy_book` USING(`book_id`)
                GROUP BY `name_genre`)

                SELECT `name_genre`, SUM(`buy_book`.`amount`) AS `Количество` FROM `genre`
                JOIN `book` USING(`genre_id`)
                JOIN `buy_book` USING(`book_id`)
                GROUP BY `name_genre`
                HAVING `Количество` = (SELECT MAX(`summ`) FROM `summ`)',

        '10' => 'SELECT YEAR(`date_payment`) `Год`, MONTHNAME(`date_payment`) `Месяц`, SUM(`price` * `amount`) `Сумма` 
                    FROM `buy_archive`
                    GROUP BY YEAR(`date_payment`), MONTHNAME(`date_payment`)
                    UNION ALL
                    SELECT YEAR(`date_step_end`) `Год`, MONTHNAME(`date_step_end`) `Месяц`, 
                                SUM(`price` * `buy_book.amount`) `Сумма`
                    FROM `book`
                    JOIN `buy_book` USING(`book_id`)
                    JOIN `buy_step` USING(`buy_id`)
                    WHERE `step_id` = 1 AND `date_step_end` IS NOT NULL
                    GROUP BY YEAR(`date_step_end`), MONTHNAME(`date_step_end`)
                    ORDER BY `Месяц`, `Год`',

        '11' => 'SELECT `title`, SUM(`Количество`) `Количество`, SUM(`Сумма`) `Сумма` 
                    FROM (
                    SELECT `title`, SUM(`buy_archive`.`amount`) `Количество`, 
                           SUM(`buy_archive`.`amount` * `buy_archive`.`price`) `Сумма` 
                    FROM `buy_archive`
                    JOIN `book` USING(`book_id`)
                    GROUP BY `title`
                    UNION ALL
                    SELECT `title`, SUM(`buy_book`.`amount`) `Количество`, 
                           SUM(`buy_book`.`amount` * `book`.`price`) `Сумма` 
                    FROM `book`
                    JOIN `buy_book` USING(`book_id`)
                    JOIN `buy_step` USING(`buy_id`)
                    WHERE `step_id` = 1 AND `date_step_end` IS NOT NULL
                    GROUP BY `title`
                    ) `summ`
                    GROUP BY `title` ORDER BY `Сумма` DESC',

        '12' => 'SELECT `title`, SUM(`Количество`) `Количество`, SUM(`Сумма`) `Сумма` 
                    FROM (
                    SELECT `title`, SUM(`buy_archive`.`amount`) `Количество`, 
                           SUM(`buy_archive`.`amount` * `buy_archive`.`price`) `Сумма` 
                    FROM `buy_archive`
                    JOIN `book` USING(`book_id`)
                    GROUP BY `title`
                    UNION ALL
                    SELECT `title`, SUM(`buy_book`.`amount`) `Количество`, 
                           SUM(`buy_book`.`amount` * `book`.`price`) `Сумма` 
                    FROM `book`
                    JOIN `buy_book` USING(`book_id`)
                    JOIN `buy_step` USING(`buy_id`)
                    WHERE `step_id` = 1 AND `date_step_end` IS NOT NULL
                    GROUP BY `title`
                    ) `summ`
                    GROUP BY `title` ORDER BY `Сумма`',
    ];

    /** Решения задач из урока 2.5 */

    $sql['2.5'] = [
        '1' => 'INSERT INTO `client` (`name_client`, `city_id`, `email`)
                SELECT \'Попов Илья\', `city_id`, \'popov@test\'
                FROM `city`
                WHERE `name_city` = \'Москва\'',

        '2' => 'INSERT INTO `buy` (`buy_description`, `client_id`)
                SELECT \'Связаться со мной по вопросу доставки\', `client_id` FROM `client`
                WHERE `name_client` = \'Попов Илья\'',

        '3' => 'INSERT INTO `buy_book` (`buy_id`, `book_id`, `amount`)
                SELECT 5, `book_id`, 2 FROM `book`
                JOIN `author` USING(`author_id`)
                WHERE (`title` = \'Лирика\' AND `name_author` = \'Пастернак Б.Л.\')
                UNION ALL
                SELECT 5, `book_id`, 1 FROM `book`
                JOIN `author` USING(`author_id`)
                WHERE (`title` = \'Белая гвардия\' AND `name_author` = \'Булгаков М.А.\')',

        '4' => 'UPDATE `book`
                JOIN `buy_book` USING(`book_id`)
                SET `book`.`amount` = `book`.`amount` - `buy_book`.`amount`
                WHERE `buy_id` = 5',

        '5' => 'CREATE TABLE `buy_pay`(
                SELECT `title`, `name_author`, `price`, `buy_book`.`amount` amount, 
                        (`price` * `buy_book`.`amount`) `Стоимость`
                FROM `author`
                JOIN `book` USING(`author_id`)
                JOIN `buy_book` USING(`book_id`)
                WHERE `buy_id` = 5 ORDER BY `title`
                )',

        '6' => 'CREATE TABLE `buy_pay` (
                SELECT `buy_id`, SUM(`buy_book`.`amount`) `Количество`, SUM(`buy_book`.`amount` * `price`) `Итого`
                FROM `book`
                JOIN `buy_book` USING(`book_id`)
                WHERE `buy_id` = 5
                GROUP BY `buy_id`
                )',

        '7' => 'INSERT INTO `buy_step` (`buy_id`, `step_id`, `date_step_beg`, `date_step_end`)
                SELECT 5 `buy_id`, `step_id`, NULL `date_step_beg`, NULL `date_step_end` FROM `step`',

        '8' => 'UPDATE `buy_step`
                SET `date_step_beg` = \'2020-04-12\'
                WHERE `step_id` = (SELECT `step_id` FROM `step` WHERE `name_step` = \'Оплата\') AND `buy_id` = 5',

        '9' => 'UPDATE `buy_step`
                JOIN `step` USING(`step_id`)
                SET `date_step_end` = \'2020-04-13\'
                WHERE `date_step_beg` IS NOT NULL AND `name_step` = \'Оплата\' AND `buy_id` = 5;
                
                UPDATE `buy_step`
                SET `date_step_beg` = \'2020-04-13\'
                WHERE `date_step_beg` IS NULL AND `step_id` = (SELECT `step_id` + 1 FROM `step` WHERE `name_step` = \'Оплата\') 
                AND `buy_id` = 5;',

        '10' => 'UPDATE `buy_step`
                JOIN `step` USING(`step_id`)
                SET `date_step_end` = \'2020-04-14\'
                WHERE `date_step_beg` IS NOT NULL AND `name_step` = \'Оплата\' AND `buy_id` = 5;
                
                UPDATE `buy_step`
                SET `date_step_beg` = \'2020-04-14\'
                WHERE `date_step_beg` IS NULL AND `step_id` = (SELECT `step_id` + 1 FROM `step` WHERE `name_step` = \'Оплата\') 
                AND `buy_id` = 5;'
    ];

    /** Решения задач из урока 3.1 */

    $sql['3.1'] = [
        '1' => '',
        '2' => '',
        '3' => '',
        '4' => '',
        '5' => '',
        '6' => '',
        '7' => '',
        '8' => '',
        '9' => '',
        '10' => '',
    ];

    return $sql;
}