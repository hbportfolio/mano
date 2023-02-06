<?php

declare(strict_types=1);

class ViewNotFoundException extends \Exception
{
    protected $message = "View not found";
}