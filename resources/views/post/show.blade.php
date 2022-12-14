@extends('layouts.main')
@section('content')

    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200">{{ $date->format('F') }} {{ $date->day }}, {{ $date->year }}
                • {{ $date->format('H:i') }} • {{ $post->comments->count() }} Comments</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/'. $post->preview_image) }}" alt="featured image" class="w-100 border">
            </section>

            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>

            <section>
                <div class="py-3">
                    <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="border-0 bg-transparent">
                            @auth()
                                @if(auth()->user()->likedPosts->contains($post->id))
                                    <i class="nav-item fa fa-solid fa-heart"></i>
                                @else
                                    <i class="nav-item far fa-solid fa-heart"></i>
                                @endif
                            @endauth
                        </button>
                    </form>
                </div>
            </section>

            <div class="row">
                <div class="col-lg-9 mx-auto">

                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{ asset('storage/'. $relatedPost->preview_image) }}" alt="related post"
                                         class="post-thumbnail border">
                                    <p class="post-category">{{ $relatedPost->category->title }}</p>
                                    <a href="{{ route('post.show', $relatedPost->id) }}" class="post-permalink media">
                                        <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <section class="comment-list">
                        <h2 class="section-title mt-2" data-aos="fade-up">Comments ({{ $post->comments->count() }})</h2>
                        @foreach($post->comments as $comment)
                            <div class="card-footer card-comments border">
                                <div class="card-comment">
                                    <div class="comment-text">
                                        <span class="username"><strong>{{ $comment->user->name }}</strong></span>
                                        <span
                                            class="text-muted float-right">{{ $comment->gatDateAsCarbonAttribute()->diffForHumans() }}</span>
                                        <p>{{ $comment->message }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>

                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mt-2" data-aos="fade-up">Leave a Reply</h2>
                            <form action="{{ route('post.comment.store', $post->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Comment</label>
                                        <textarea name="message" class="form-control" placeholder="Comment" rows="10"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-12" data-aos="fade-up">
                                            <input type="submit" value="Send comment" class="btn btn-warning">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>

@endsection
