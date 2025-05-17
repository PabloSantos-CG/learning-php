<?php

namespace Pablo\Biblioteca;

class Book
{
    private bool $available = true;

    function __construct(
        private readonly string $title,
        private readonly string $author,
    ) {}

    public function getAvailableStatus(): bool
    {
        return $this->available;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->title;
    }

    public function markAsBorrowed(): void
    {
        $this->available = false;
    }

    public function markAsAvailable(): void
    {
        $this->available = true;
    }

    public function getDetailsBook(): string
    {
        $firstString = 'Título: ' . $this->title . '; Autor: ' . $this->author;
        $lastString = 'Disponível: ' . ($this->available ? 'Sim.' : 'Não.');

        return "$firstString; $lastString";
    }
}
