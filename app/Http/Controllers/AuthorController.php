<?php

namespace App\Http\Controllers;

use App\People;
use App\Http\Resources\PeopleResource;
use App\Http\Resources\PeoplesResource;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return new PeoplesResource(People::with(['articles'])->paginate());
    }

    public function show(People $author)
    {
        PeopleResource::withoutWrapping();

        return new PeopleResource($author);
    }
}
