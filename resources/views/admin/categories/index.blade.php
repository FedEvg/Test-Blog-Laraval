@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-success">Add category</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Show</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.show', $category->id) }}" class="nav-link text-warning">
                                            <i class="nav-icon fa fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', $category->id) }}" class="nav-link text-primary">
                                            <i class="nav-icon fa fa-solid fa-pen"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="nav-icon fa fa-solid fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
