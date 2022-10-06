@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-1">
                                <h1 class="m-0">{{ $category->title }}</h1>
                            </div>
                            <div class="col-1">
                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                   class="nav-link text-primary">
                                    <i class="nav-icon fa fa-solid fa-pen"></i>
                                </a>
                            </div>
                            <div class="col-1">
                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="nav-icon fa fa-solid fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>

        <hr>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <th scope="row">ID</th>
                                <td>{{ $category->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Title</th>
                                <td>{{ $category->title }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created</th>
                                <td>{{ $category->created_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Updated</th>
                                <td>{{ $category->updated_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Deleted</th>
                                <td>{{ $category->deleted_at }}</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
