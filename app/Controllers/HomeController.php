<?php

declare(strict_types=1);

class Home
{
    public function index(): View
    {
        return View::make('Home/index', ['foo' => 'bar']);
    }
}