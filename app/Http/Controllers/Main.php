<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

class Main extends Controller {
   public function index() {
      if(Cookie::get("name") == null) {
         return redirect("/sign-in");
        } else {
           return view("dashboard/main");
        }
   }
}
