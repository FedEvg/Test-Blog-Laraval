@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tag add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
                {{--            <div class="row">--}}
                {{--                <div class="col-12">--}}
                {{--                    <a href="" class="btn btn-primary">Add tag</a>--}}
                {{--                </div>--}}
                {{--            </div>--}}
            </div>
        </div>

        <hr>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                        <form action="{{ route('admin.tag.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Title tag">
                            </div>
                            <p class="text-danger">
                                @error('title')
                                {{ $message }}
                                @enderror
                            </p>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
