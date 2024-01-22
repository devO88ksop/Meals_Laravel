<?php
namespace App\Interfaces\Api;

interface ApiProductInterface{
 public function all();
 public function getProductById($id);

}