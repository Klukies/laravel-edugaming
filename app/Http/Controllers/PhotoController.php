<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PhotoController extends Controller
{
    public function image($fileName) {
      return Response::download($path);
    }
}
