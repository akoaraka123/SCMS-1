<?php

namespace App\Controllers;

class Errors extends BaseController
{
    public function show404()
    {
        return view('errors/html/error_404');
    }

    public function showException($exception)
    {
        return view('errors/html/error_exception', ['message' => $exception->getMessage()]);
    }
}
