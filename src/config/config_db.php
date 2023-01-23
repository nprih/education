<?php

function getDb($db): array
{
    switch (true){
        case $db === 'education':
            return [
                'dsn' => 'mysql:host=mysql; dbname=education',
                'db_user' => 'root',
                'db_pass' => 'root',
                'options' => array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            ];
        default:
            return [];

    }
}

