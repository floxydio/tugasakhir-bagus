<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class Absen extends Controller {
   public function index() {
      $absen = DB::table("tbl_absen")->get();
      return view("absen/absen", compact("absen"));
   }

   public function fetchAbsenFromData() {

   }
}

