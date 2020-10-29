<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro de jugadores </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/players.css')}}">
    

  </head>
  <body>
    <div class="container">
    <img alt="Players" srcset="{{ URL::to('/images/logo_1.png') }}">
    <h3>Nuevo Jugador </h3>
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

    <form method="post" action="{{url('players')}}" id="formRegistry">
    {{csrf_field()}}
        <div class="row">
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name"  value={{old('name')}}>
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Apellido:</label>
            <input type="text" class="form-control" name="surename" value={{old('surename')}}>
          </div>
        </div>

        

        <div class="row">
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Email:</label>
            <input type="text" class="form-control" name="email"  value={{old('email')}}>
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Edad:</label>
            <input type="text" class="form-control" name="age" value={{old('age')}}>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Télefono Residencial:</label>
            <input type="text" class="form-control" name="phone" value={{old('phone')}}> 
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Celular:</label>
            <input type="text" class="form-control" name="cell_phone" value={{old('cell_phone')}}>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Equipo:</label>
            <input type="text" class="form-control" name="team" value={{old('team')}}> 
          </div>
          <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="name">Posicion:</label>
            <input type="text" class="form-control" name="position" value={{old('position')}}>
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
            <textarea class="form-control" rows="5" name="coments" >{{old('coments')}}</textarea>
          </div>
        </div>

        <div class="row">
          
          <div class="form-group col-xs-6 col-sm-6 col-md-6">
            <button type="submit" class="btn btn-success">Guardar</button>
          </div>
          <div class="form-group col-xs-6 col-sm-6 col-md-6">
           
            <a href="{{action('App\Http\Controllers\PlayerController@index')}}" class="btn btn-info">Cancelar</a>
          </div>
        </div>
      </form>
    </div>
    <div id="toast-container" class="toast-top-right">
    </div
  </body>
</html>