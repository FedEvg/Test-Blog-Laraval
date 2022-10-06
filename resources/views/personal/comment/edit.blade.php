@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comments</h1>
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

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-4">
                        <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <textarea name="message" class="form-control">{{ $comment->message }}</textarea>
                            </div>
                            <p class="text-danger">
                                @error('message')
                                {{ $message }}
                                @enderror
                            </p>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>

            </div>
        </section>

    </div>

@endsection
