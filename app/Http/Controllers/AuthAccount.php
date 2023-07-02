<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class AuthAccount extends Controller {
   public function index() {
      if(Cookie::get("name") == null) {
       return view("auth/login");
      } else {
         return redirect("/");
      }
   }

   public function loginIndex(Request $request) {
      $inputValue = $request->input("option_value");


      if($inputValue == "1") {
         $loginCheck = DB::table("tbl_admin")->where("username", $request->input("nama"))->where("password", $request->input("password"))->first();
         if($loginCheck) {
            Cookie::queue("name", $loginCheck->username);
            Cookie::queue("role", "admin");
            Cookie::queue("id", $loginCheck->id);
            return redirect("/");
         } else {
            Session::flash("Gagal","Email Atau Password Salah");
            return redirect("/sign-in");
         }
      } else if($inputValue == "2") {
         $loginCheck = DB::table("tbl_user")->where("nama", $request->input("nama"))->where("id_card", $request->input("password"))->first();
         if($loginCheck) {
            Cookie::queue("id_card", $loginCheck->id_card);
            Cookie::queue("name", $loginCheck->nama);
            Cookie::queue("role", "user");
            Cookie::queue("id", $loginCheck->id);

           return  redirect("/");
         } else {
            Session::flash("Gagal","Email Atau Password Salah");

          return redirect("/sign-in");
         }
      } else {
         Session::flash("Gagal","Silihkan pilih login tipe");
         return redirect("/sign-in");

      }

   }

   public function logoutSession() {
      Cookie::queue(Cookie::forget("id_card"));
     Cookie::queue( Cookie::forget("name"));
       Cookie::queue( Cookie::forget("role"));
         Cookie::queue( Cookie::forget("id"));
      return redirect("/sign-in");

   }


}
