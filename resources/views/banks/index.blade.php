@extends('layouts.app')

@section('main')

<form method="GET" action="{{ url('/banks') }}" class="navbar-form navbar-left" role="search">
  <div class="input-group custom-search-form">
      <input type="text" class="form-control" name="code" placeholder="Search..." value="{{request()->input('code')}}">
      <input type="text" class="form-control" name="name" placeholder="Search..." value="{{request()->input('name')}}">
      <span class="input-group-btn">
          <button class="btn btn-default-sm" type="submit">
              Actualizar
          </button>
      </span>
  </div>
  <select class="custom-select" name="sort">
    <option value="code" {{request()->input('sort')=='short_name'?'selected':''}}>Código</option>
    <option value="short_name" {{request()->input('sort')=='short_name'?'selected':''}}>Nombre Corto</option>
    <option value="name" {{request()->input('sort')=='name'?'selected':''}}>Nombre</option>
  </select>
  <select class="custom-select" name="order">
    <option value="asc" {{request()->input('order')=='asc'?'selected':''}}>ASC</option>
    <option value="desc" {{request()->input('order')=='desc'?'selected':''}}>DESC</option>
  </select>
</form>

<div class="row">
  <div class="col-sm-12">
    <h1 class="display-3">Bancos</h1>    
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Código</td>
            <td>Nombre Corto</td>
            <td>Nombre</td>
            <td>Creado</td>
            <td>Modificado</td>
            <td colspan = 2>Actions</td>
          </tr>
      </thead>
      <tbody>
          @foreach($banks as $bank)
          <tr>
              <td>{{$bank->id}}</td>
              <td>{{$bank->code}}</td>
              <td>{{$bank->short_name}}</td>
              <td>{{$bank->name}}</td>
              <td>{{$bank->created_at}}</td>
              <td>{{$bank->updated_at}}</td>            
              <td>
                  
                  <a href="{{ url("/banks/{$bank->id}") }}" class="btn btn-primary">Ver</a>
                  <a href="{{ url("/banks/{$bank->id}/edit") }}" class="btn btn-primary">Editar</a>
              </td>
              <!--
                  <form action="{{-- route('contacts.destroy', $contact->id) --}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              -->
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>
</div>
{{ $banks->appends(request()->except('page'))->links() }}
@endsection