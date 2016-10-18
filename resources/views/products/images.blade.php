@extends('app')

@section('content')
    <div class="container">
        <h1>Images of {{ $product->name }}</h1>

        <br>

        <a href="#  " class="btn btn-primary">New Image</a>
        <br>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Extension</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product->images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td>
                        <img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="80">
                    </td>
                    <td>{{ $image->extension }}</td>
                    <td>

                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td colspan="4" class="text-center">

                </td>
            </tfoot>
        </table>

        <a href="{{ route('products.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection