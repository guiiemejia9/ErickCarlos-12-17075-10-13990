<?php

namespace App\Http\Controllers;
use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{

///lista de contacto
     public function  list(){
         $data['contactos']= Contacto::paginate(3);
         return view('contactos.list',$data);
     }

    // fin
    //// vista formulario de registro contacto
    public function  contactoform(){
        return view('contactos.contactosform');
    }
    // guardar
    public function save(Request $request){
        $validator = $this->validate($request,[
            'nombre'=> 'required|string|max:75',
            'email'=> 'required|string|max:45|email|unique:contactos',
            'tel'=> 'required|string|max:12',
            'tema'=> 'required|string|max:100',
            'mensaje'=> 'required|string|max:500'
        ]);
        $contactodata= request()->except('_token');
        Contacto::insert($contactodata);
        return back()->with('guardado', 'contacto guardado');
    }
    // eliminar
    public  function delete($id){
         Contacto::destroy($id);

          return back()->with('eliminado','contacto eliminado');
    }


    // vista formulario para editar contacto
    public  function editform($id){
         $contacto = Contacto::findOrFail($id);
         return  view('contactos.editform',compact('contacto'));

    }

    public function edit(Request $request, $id){
        $validator = $this->validate($request,[
            'nombre'=> 'required|string|max:75',
            'email'=> 'required|string|max:45',
            'tel'=> 'required|string|max:12',
            'tema'=> 'required|string|max:100',
            'mensaje'=> 'required|string|max:500'
        ]);
        $contactodata= request()->except('_token', '_method');

        Contacto::where('id','=',$id)->update($contactodata);
        return back()->with('modificado', 'contacto modificado');
    }



}
