<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <img src="logo_1.png" alt="Jugador" srcset="{{ URL::to('/images/logo_1.png') }}">
    <a href="{{action('App\Http\Controllers\PlayerController@create')}}" class="btn btn-success">Nuevo</a>
    <h3>Listado de Jugadores </h3>
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th >Email</th>
        <th >Teléfono</th>
        <th >Celular</th>
        <th colspan="2">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($registries as $registry)
      <tr>
        <td>{{$registry['id']}}</td>
        <td>{{$registry['name']}}</td>
        <td>{{$registry['surename']}}</td>
        <td>{{$registry['email']}}</td>
        <td>{{$registry['phone']}}</td>
        <td>{{$registry['cell_phone']}}</td>
        <td><a href="{{action('App\Http\Controllers\PlayerController@editPlayer', $registry['id'])}}" class="btn btn-primary">Editar</a></td>
        <td>
          <form  onsubmit="return confirm('Desea eliminar el registro?');" action="{{action('App\Http\Controllers\PlayerController@destroy', $registry['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html