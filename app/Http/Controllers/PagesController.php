<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Carga de la página de inicio.<
     */
    public function index()
    {
        return view('public.pages.index');
    }

    public function contact()
    {
      return view('public.pages.contact');
    }

    public function about()
    {
      return view('public.pages.about');
    }

    public function profile()
    {
      return view('public.profile.index');
    }

    public function tabAxios(){
      return false;
    }

    public function obtenerVista($tab){
      $vista = "";
      switch ($tab) {
        case 'profile-pill':
          $vista = view('public.profile.data');
          break;
        case 'books-pill':
          $vista = view('public.profile.myBooks');
          break;
        case 'friends-pill':
          $vista = view('public.profile.friends');
          break;
        default:
          break;
      }
    }
}
