<?php

namespace App\Interfaces;

interface ApiNewsInterface
{
    public function getNews(string $lang): array;
}