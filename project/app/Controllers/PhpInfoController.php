<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PhpInfoController extends Controller
{
    public function index()
    {
        phpinfo();
    }
}
