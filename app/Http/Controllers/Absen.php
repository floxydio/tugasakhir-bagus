<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class Absen extends Controller {
   public function index() {
      if(Cookie::get("role") == "admin") {
         $absen = DB::table("tbl_absen")->get();
         return view("absen/absen", compact("absen"));
      } else{
      $absen = DB::table("tbl_absen")->where("nama", Cookie::get("name"))->get();
      return view("absen/absen", compact("absen"));
      }
   }

   public function createAbsen() {
      $data = [
         "nama" => Cookie::get("name"),
         "id_card" => Cookie::get("id_card"),
         "date" => date("d-m-Y")
      ];
      $checkAbsenToday = DB::select("SELECT * FROM tbl_absen WHERE date = ?", [date("d-m-Y")]);
      if($checkAbsenToday == null || $checkAbsenToday == []) {
         $createAbsen = DB::table("tbl_absen")->insert($data);
         if($createAbsen) {
            Session::flash("Success","Berhasil Simpan Absen");
            return redirect("/absen");

         } else {
            Session::flash("Gagal","Gagal Simpan Absen");
            return redirect("/absen");
         }
      } else {
         Session::flash("Gagal","Hari ini sudah absen");
         return redirect("/absen");

      }


   }
}

