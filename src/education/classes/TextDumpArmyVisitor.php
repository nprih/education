<?php

namespace education\classes;

class TextDumpArmyVisitor extends ArmyVisitor
{
    private  string $text = '';
    public function visit(Unit $node): void
    {
        $txt = '';
        $pad = 4 * $node->getDepth();
        $txt .= sprintf("%{$pad}s", '');
        $txt .= get_class($node) . ': ';
        $txt .= 'Огневая мощь: ' . $node->bombardStrenght() . '<br><br>';
        $this->text .= $txt;
    }

    public function getText(): string
    {
        return $this->text;
    }
}