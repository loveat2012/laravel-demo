<?php

namespace app\Observers\Demo;

class Observe
{
    public function created($observe)
    {
        echo 'do something Observe created.'.PHP_EOL;
        exit;
    }

    public function updated($observe)
    {
        echo 'do something Observe updated.'.PHP_EOL;
        exit;
    }
}
