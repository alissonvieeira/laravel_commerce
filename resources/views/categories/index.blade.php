@extends('app')

@section('content')
    <div class="container">
        <h1>Categories</h1>

        <br>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">New Category</a>
        <br>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ str_limit($category->description, $limit = 100, $end = '...') }}</td>
                        <td>
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}">Edit</a> |
                            <a href="{{ route('categories.destroy', ['id' => $category->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-center">
                        {!! $categories->render() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection