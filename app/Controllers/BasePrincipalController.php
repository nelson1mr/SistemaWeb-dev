<?php

namespace App\Controllers;

class BasePrincipalController extends BaseController
{
    public function indexDashbord()
    {
      //  return view('1_BasePrincipal/saludo.php');
      return 
      view('2_Cuerpo/1_Esquema/1_begin_page_view.php') .
      view('2_Cuerpo/1_Esquema/2_head_page_view.php') .
      view('2_Cuerpo/1_Esquema/3_theme_page_view.php') .
      view('2_Cuerpo/1_Esquema/4_header_page_view.php') .
      view('2_Cuerpo/1_Esquema/5_sidebar_page_view.php') .
      view('2_Cuerpo/1_Esquema/6_content_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
      ;
    }
}

