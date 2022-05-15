<?php


class FormStateResponse
{
    private string $text;
    private string $color;

    public function __construct(string $text, string $color)
    {
        $this->text = $text;
        $this->color = $color;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }




}
