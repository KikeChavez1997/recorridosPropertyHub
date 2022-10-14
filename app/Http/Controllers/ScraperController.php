<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Goutte\Client;

class ScraperController extends Controller
{
    private $result = array();

    public function scraper(){

        $client = new Client();
        $url = 'https://www.easybroker.com/mx/listing/rodrigoa_3/departamento-en-santa-fe-santa-fe-pena-blanca';
        $page = $client->request('GET', $url);


        $data = $page->filter('.property-title')->text();
        $price = $page->filter('.price')->text();
        
        
        
        return view('admin.index', compact('data', 'price'));
    }
}
