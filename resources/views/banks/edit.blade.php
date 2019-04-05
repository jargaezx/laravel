@extends('layouts.app') 
@section('main')
{{--dd($bank)--}}
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a bank</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('banks.update', $bank->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="code">Código:</label>
                <input type="text" class="form-control" name="code" value={{ $bank->code }} />
            </div>

            <div class="form-group">
                <label for="short_name">Nombre Corto:</label>
                <input type="text" class="form-control" name="short_name" value={{ $bank->short_name }} />
            </div>

            <div class="form-group">
                <label for="name">Nombre Largo:</label>
                <input type="text" class="form-control" name="name" value="{{ $bank->name }}" />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection