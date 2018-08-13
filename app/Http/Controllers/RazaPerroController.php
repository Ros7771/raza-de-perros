<?php

namespace App\Http\Controllers;

use App\RazaPerro;
use App\Tamano;
use App\Temperamento;
use Auth;
use Gate;
use Illuminate\Http\Request;


class RazaPerroController extends Controller
{

    public function getIndex(){
      $razaPerros = RazaPerro::orderBy('nombre', 'desc')->get();
      return view('razaPerros.index',['razaPerros'=>$razaPerros]);
    }


    public function getRazaPerro($id=null){
      $razaPerros= RazaPerro::where('id', $id)->with('temperamentos')->first();
      return view('razaPerros.detalle',['rp'=>$razaPerros]);
    }

    public function getRazaxTempemperamento($id=null){
      $temperamentosRZ=null;
      $lista=Temperamento::orderBy('nombre', 'desc')->with('razaperros')->get();
      if(isset($id) && !empty($id)){
        $temperamentosRZ=Temperamento::where('id', $id)->with('razaperros')->first();
      }

        return view('razaPerros.temperamento', ['temperamentos'=>$lista,'tempRz'=>$temperamentosRZ]);
    }

    public function getCantidadRazaxTamano(){
      $tamanos=tamano::all();
      return view('razaPerros.tamanos', ['tamanos'=>$tamanos]);
    }

    public function getAdminIndex(){
      $razaPerros= RazaPerro::orderBy('created_at', 'desc')->get();
      return view('admin.index',['razaPerros'=>$razaPerros]);
    }

    public function getAdminEdit($rp){
      $razaPerros= RazaPerro::find($rp);
      $tamano=Tamano::all();
      $temperamento=Temperamento::all();
      return view('admin.edit',['rp'=>$razaPerros,
      'tamano'=>$tamano, 'temperamento'=>$temperamento]);
    }


    public function getAdminCreate(){
      $tamano=Tamano::all();
      $temperamento=Temperamento::all();
      return view('admin.create', ['tamano'=>$tamano, 'temperamento'=>$temperamento]);
    }

    public function rpAdminUpdate(Request $request)
    {
        $this->validate($request, [
          'nombre' => 'required|min:3',
          'descripcion' => 'required|min:5',
          'tamano' => 'required',
          'alturaInicial' => 'numeric',
          'alturaFinal' => 'numeric',
          'temperamentos' => 'required',
      ]);

       $razaPerro = RazaPerro::find($request->input('id'));
       $razaPerro->nombre=$request->input('nombre');
       $razaPerro->descripcion=$request->input('descripcion');
       $razaPerro->tamano_id=$request->get('tamano');
       $razaPerro->alturaInicial=$request->input('alturaInicial');
       $razaPerro->alturaFinal=$request->input('alturaFinal');
       $tamano= Tamano::find($request->input('tamano'));
       $razaPerro->tamanos()->associate($tamano);
       $razaPerro->save();
       $razaPerro->temperamentos()->sync(
       $request->input('temperamentos')===null ? []:
       $request->input('temperamentos'));
       return redirect()
       ->route('admin.index')
       ->with('info', 'Raza de perro: ' . $request->input('nombre').' editada');
    }

    public function rpAdminCreate(Request $request)
    {
        $this->validate($request, [
          'nombre' => 'required|min:3',
          'descripcion' => 'required|min:5',
          'tamano' => 'required',
          'alturaInicial' => 'numeric',
          'alturaFinal' => 'numeric',
          'temperamentos' => 'required'
      ]);
       $razaPerro = new RazaPerro([
          'nombre'=>$request->input('nombre'),
          'descripcion'=>$request->input('descripcion'),
          'alturaInicial'=>$request->input('alturaInicial'),
          'alturaFinal'=>$request->input('alturaFinal'),
        ]);
        $user=Auth::user();
        $vj->user()->associate($user);
        $tamano= Tamano::find($request->input('tamano'));
        $razaPerro->tamanos()->associate($tamano);
        //  $razaPerro->tamano_id=$request->input('tamano');
        $razaPerro->save();
        $razaPerro->temperamentos()->
        attach($request->input('temperamentos')===null ? []:
         $request->input('temperamentos'));
        return redirect()
        ->route('admin.index')
        ->with('info', 'Raza de perro: ' . $request->input('nombre').' creada');
    }



}
