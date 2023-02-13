<?php

namespace education\classes;

abstract class Unit
{
    protected int $depth = 0;
    public function getComposite(): ? CompositeUnit
    {
        return null;
    }
    abstract public function bombardStrenght(): int;

    public function textDump($num = 0): string
    {
        $txtout = '';
        $pad = 4 * $num;
        $txtout .= sprintf("%{$pad}", '');
        $txtout .= get_class($this) . ': ';
        $txtout .= 'Огневая мощь:' . $this->bombardStrenght() . '<br>';
        return $txtout;
    }

    public function accept(ArmyVisitor $visitor)
    {
        $refthis = new \ReflectionClass(get_class($this));
        $method = 'visit' . $refthis->getShortName();
        $visitor->$method($this);
    }
    protected function setDepth($depth): void
    {
        $this->depth = $depth;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }
}