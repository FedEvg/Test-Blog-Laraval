@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit {{ $user->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">

                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
                            </div>
                            <p class="text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </p>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                            </div>
                            <p class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </p>
                            <div class="form-group">
                                <input type="hidden" value="{{ $user->id }}" name="user_id">
                            </div>

                            <select class="form-control" name="role_id">
                                <lable>Select a role</lable>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ $id == $user->role_id ? ' selected' : '' }}
                                    >{{ $role }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">
                                @error('role_id')
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
