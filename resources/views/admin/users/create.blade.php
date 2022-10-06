@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User add</h1>
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
                    <div class="col-4">
                        <form action="{{ route('admin.user.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <p class="text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </p>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <p class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </p>

                            <select class="form-control" name="role_id">
                                <lable>Select a role</lable>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ $id == old('role_id') ? ' selected' : '' }}
                                    >{{ $role }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">
                                @error('role_id')
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
