<?php

namespace App\Controllers;

class ImpresionesController extends BaseController
{
    public function ImpresionesDocumentos()
    {
      //  return view('1_BasePrincipal/saludo.php');
      $session=session();
      $data = [
        'foto'    => $session->get('foto'),
        'nombre'    => $session->get('nombre'),
        'apellido'    => $session->get('apellido'),
        'genero'    => $session->get('genero'),
        'correo'    => $session->get('correo'),
        'direccion'    => $session->get('direccion'),
        'telefono'  => $session->get('telefono'),
        'rol'    => $session->get('rol'),
    ];

      return 
      view('2_Cuerpo/1_Esquema/1_begin_page_view.php') .
      view('2_Cuerpo/1_Esquema/2_head_page_view.php') .
      view('2_Cuerpo/1_Esquema/3_theme_page_view.php') .
      view('2_Cuerpo/1_Esquema/4_header_page_view.php',$data) .
      view('2_Cuerpo/1_Esquema/5_sidebar_page_view.php') .
      view('5_ImpresionesDocumentos/1_Impresiones_page_view.php') .
      view('2_Cuerpo/1_Esquema/7_footer_page_view.php') .
      view('2_Cuerpo/1_Esquema/8_modals_page_view.php') .
      view('2_Cuerpo/1_Esquema/9_script_page_view.php') .
      view('2_Cuerpo/1_Esquema/10_end_page_view.php')
      ;
    }
}

