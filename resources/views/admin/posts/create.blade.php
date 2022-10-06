@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post add</h1>
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
                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group w-50">
                                <input type="text" class="form-control" name="title" placeholder="Title post"
                                       value="{{ old('title') }}">
                            </div>
                            <p class="text-danger">
                                @error('title')
                                {{ $message }}
                                @enderror
                            </p>

                            <div class="form-group">
                                <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                            </div>
                            <p class="text-danger">
                                @error('content')
                                {{ $message }}
                                @enderror
                            </p>

                            <div class="form-group w-75">
                                <label>Preview image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger">
                                @error('preview_image')
                                {{ $message }}
                                @enderror
                            </p>

                            <div class="form-group w-75">
                                <label>Main image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger">
                                @error('main_image')
                                {{ $message }}
                                @enderror
                            </p>

                            <div class="form-group">
                                <label>Select</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}
                                        {{ $category->id == old($category->id) ? 'selected ' : '' }}
                                        ">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="text-danger">
                                @error('category_id')
                                {{ $message }}
                                @enderror
                            </p>

                            <div class="form-group">
                                <label>Tags</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple"
                                        data-placeholder="Select a tag"
                                        style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
