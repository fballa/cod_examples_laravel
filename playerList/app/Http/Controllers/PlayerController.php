<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

use Illuminate\Support\Facades\Input;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registries = Player::all()->toArray();
        return view('players.index', compact('registries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('players.createPlayer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $registry = $this->validate(request(), [
            'name' => 'required',
            'surename' => 'required',
            'email' => 'required|email',
            'age' => 'integer|min:0'
          ]);

          $active = Input::get('activo') == 'on' ? true :false;

          Player::create([
            'name'=> Input::get('name'),
            'surename'=> Input::get('surename'),
            'email'=> Input::get('email'),
            'cell_phone' => Input::get('cell_phone'),
            'phone'=> Input::get('phone'),
            'coments'=> Input::get('coments'),
            'age'=> Input::get('age'),
            'activo'=> $active,
            'team'=>  Input::get('team'),
            'position'=>  Input::get('position'),
          ]);

          return back()->with('success', 'Información almacenada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPlayer($id)
    {
        //
        $registry = Player::find($id);
        return view('players.edit',compact('registry','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $registry = Player::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'surename' => 'required',
            'email' => 'required|email',
            'age' => 'integer|min:0'
          ]);
        
          $registry->name = Input::get('name');
          $registry->surename = Input::get('surename');
          $registry->email = Input::get('email');
          $registry->cell_phone =  Input::get('cell_phone');
          $registry->phone = Input::get('phone');
          $registry->coments = Input::get('coments');
          $registry->age = Input::get('age');
          $registry->activo = Input::get('activo') == 'on' ? true :false;
          $registry->team = Input::get('team');
          $registry->position = Input::get('position');
          $registry->save();
          
  
          return back()->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $registry = Player::find($id);
        $registry->delete();
        return redirect('players')->with('success','Registro eliminado');
    }
}
