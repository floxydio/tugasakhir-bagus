<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Users extends Controller {
   public function index() {
      $user = DB::table("tbl_user")->get();
      return view("users/users",compact("user"));
   }
   public function createAccount(Request $request) {
      $data = [
         "nama" => $request->input("nama"),
         "id_card" => $request->input("id_card"),
         "alamat" => $request->input("alamat"),
         "divisi" => $request->input("divisi")
      ];
      Log::channel('single')->info('Dataaaa -> ' + $data);



      $createUser = DB::table("tbl_user")->insert($data);
     if($createUser) {
      return redirect("/user");
     } else {
      return redirect("/user");

     }
   }
}
