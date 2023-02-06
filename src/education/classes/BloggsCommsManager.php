<?php

namespace education\classes;

class BloggsCommsManager extends CommsManager
{
    public function getHeaderText(): string
    {
        return 'BloggsCal header<br>';
    }

    public function make(int $flag_int): Encoder
    {
        switch ($flag_int){
            case self::APPT:
                return new BloggsApptEncoder();
            case self::CONTACT:
                return new BloggsContactEncoder();
            case self::TTD:
                return new BloggsTtdEncoder();
        }
    }

    public function getFooterText(): string
    {
        return 'BloggsCall footer<br>';
    }

}