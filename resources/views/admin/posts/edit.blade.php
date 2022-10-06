@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit {{ $post->title }}</h1>
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
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Title post"
                                       value="{{$post->title}}">
                            </div>
                            <p class="text-danger">
                                @error('title')
                                {{ $message }}
                                @enderror
                            </p>

                            <div class="form-group">
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                            </div>
                            <p class="text-danger">
                                @error('content')
                                {{ $message }}
                                @enderror
                            </p>

                            <div class="form-group w-75">
                                <label>Preview image</label>
                                <div class="w-25">
                                    <img src="{{ url('storage/' .$post->preview_image) }}" alt="preview_image"
                                         class="w-50">
                                </div>
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
                                <div class="w-25">
                                    <img src="{{ url('storage/' .$post->main_image) }}" alt="main_image" class="w-50">
                                </div>
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
                                        <option {{ $category->id === $post->category->id ? ' selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->title }}</option>
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
                                        <option value="{{ $tag->id }}"
                                            {{ is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}
                                        >{{ $tag->title }}</option>
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
