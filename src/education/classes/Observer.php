<?php

namespace education\classes;

interface Observer
{
    public function update(Observable $observable):void;
}