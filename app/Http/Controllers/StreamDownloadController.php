<?php
namespace App\Http\Controllers;
use Illuminate\Http\Response;

use GuzzleHttp\Client;

class StreamDownloadController extends Controller
{
   public function download(){

    try {
      $client= new Client();
      $response=$client->get('file:///C:/Users/charlie/Desktop/test.json');                         

      if($response->getStatusCode() !== Response::HTTP_OK){
        echo 'We have error';
      }

      $file=$response->getBody()->getContents();

      $fileName='charlie.json';

      $header=[
        "Content-Type" => "application/json",
        "Content-Disposition" => "attachment; filename=" . $fileName . ';',  

      ];
      return response()->streamDownload(function () use ($file){
        echo $file;
      }, $fileName,$header);
    }catch(\Exception $e){
      echo $e;
    }
   }
}