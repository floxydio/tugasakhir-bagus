<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Users extends Controller {
   public function index() {
      $user = DB::table("tbl_user")->get();
      return view("users/users",compact("user"));
   }
   public function createAccount() {
      $data = [
         "nama" => $_POST["nama"],
         "id_card" => $_POST["id_card"],
         "alamat" => $_POST["alamat"],
         "divisi" => $_POST["divisi"]
      ];
      $createUser = DB::table("tbl_user")->insert($data);
     if($createUser) {
      return redirect("/user");
     } else {
      return redirect("/user");

     }
   }

   public function updateAccountById($id) {
      $data = [
         "nama" => $_POST["nama"],
         "id_card" => $_POST["id_card"],
         "alamat" => $_POST["alamat"],
         "divisi" => $_POST["divisi"]
      ];
      $updateuser = DB::table("tbl_user")->where("id", $id)->update($data);
      if($updateuser) {
       return redirect("/user");
      } else {
       return redirect("/user");

      }
   }
}
