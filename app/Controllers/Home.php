<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo "Welcome to Home Page";
    }

    public function about()
    {
        echo "This is About Page";
    }

    public function contact()
    {
        echo "This is Contact Page";
    }
}
