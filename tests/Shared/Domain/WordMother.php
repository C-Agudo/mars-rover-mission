<?php

namespace Tests\Shared\Domain;

final class WordMother
{
    public static function create(): string
    {
        return MotherCreator::random()->word;
    }
}
