@extends('app')

@section('content')
    <div class="container">
        <h1>Create Products</h1>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['route' => 'products.store']) !!}

        <div class="form-group">
            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
        </div>

        <div class="'form-group">
            {!! Form::label('featured', 'Featured:') !!}<br>
            {!! Form::radio('featured', '1') !!}Sim
            {!! Form::radio('featured', '0') !!}Não
        </div>

        <div class="form-group">
            {!! Form::label('recommend', 'Recommend:') !!}<br>
            {!! Form::radio('recommend', '1') !!}Sim
            {!! Form::radio('recommend', '0') !!}Não
        </div>

        <div class="form-group">

            {!! Form::submit('Add Product', ['class' => 'btn btn-primary']) !!}

        </div>

        {!! Form::close() !!}
    </div>
@endsection