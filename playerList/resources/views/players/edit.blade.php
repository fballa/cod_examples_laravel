<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edicion Jugador </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/player.css')}}">
    

  </head>
  <body>
    <div class="container">
    <img  alt="FLOSSPA" srcset="{{ URL::to('/images/logo_1.png') }}">
    <h3>Edicion de Jugadores </h3>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif

    <form method="post" action="{{action('App\Http\Controllers\PlayerController@update', $id)}}" id="formRegistry">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name"> Nombre:</label>
            <input type="text" class="form-control" name="name"  value="{{$registry->name}}" >
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Apellido:</label>
            <input type="text" class="form-control" name="surename" value="{{$registry->surename}}">
          </div>
        </div>

        

        <div class="row">
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Email:</label>
            <input type="text" class="form-control" name="email"  value="{{$registry->email}}">
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Edad:</label>
            <input type="text" class="form-control" name="age" value="{{$registry->age}}">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Télefono Residencial:</label>
            <input type="text" class="form-control" name="phone" value="{{$registry->phone}}"> 
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Celular:</label>
            <input type="text" class="form-control" name="cell_phone" value="{{$registry->cell_phone}}">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Equipo:</label>
            <input type="text" class="form-control" name="team" value="{{$registry->team}}"> 
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Posicion:</label>
            <input type="text" class="form-control" name="position" value="{{$registry->position}}">
          </div>
        </div>


        <div class="row">
        
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
          <label for="name">Activo:</label>
          <div class="checkbox">
          
            <label> <input type="checkbox" name="activo" @if(old('activo') !== NULL ){{ 'checked' }}@endif> Activo</label>
          </div>
         
         
          </div>
          
        </div>
        
        <div class="row">
          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="name">Comentarios:</label>
            <textarea class="form-control" rows="5" name="coments" >{{$registry->coments}}</textarea>
          </div>
        </div>

        <div class="row">
          
          <div class="form-group col-xs-6 col-sm-6 col-md-6">
            <button type="submit" class="btn btn-success">Guardar</button>
            
          </div>
          <div class="form-group col-xs-6 col-sm-6 col-md-6">
           
            <a href="{{action('App\Http\Controllers\PlayerController@index')}}" class="btn btn-info">Ver Listado</a>
          </div>
        </div>
      </form>
    </div>
    <div id="toast-container" class="toast-top-right">
    </div
  </body>
</html>