@extends('layouts.main')

@section('content')

<main class="blog-post">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 mx-auto">

				<h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
				<!--<p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Written by Richard Searls• February 1, 2019• 6:31 pm• Featured • 4 Comments</p>-->
				<p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Written by Richard Searls • {{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }} • {{ $date->format('H:i') }} • Featured • {{ $post->comments->count() }} Comments</p>
				<section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
					<img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
				</section>
				<section class="post-content">
					<div class="row">
						<div class="col-lg-9 mx-auto">
							{!! $post->content !!}
						</div>
					</div>
				</section>

				<section>
					@auth()
					<form action="{{ route('post.like.store', $post->id) }}" method="post">
						@csrf
						<button type="submit" class="border-0 bg-transparent ">
							<span>{{ $post->liked_users_count }}</span>
							<!--fas закрашеный -->
							<!--far незакрашеный-->
							<i class="fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
						</button>
					</form>
					@endauth
					@guest()
					<div>
						<span>{{ $post->liked_users_count }}</span>
						<i class="fa{{ $post->liked_users_count > 0 ? 's' : 'r' }} fa-heart"></i>
					</div>
					@endguest
				</section>


				@if($relatedPosts->count() > 0)
				<section class="related-posts">
					<h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
					<div class="row">
						@foreach($relatedPosts as $relPost)
						<div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
							<img src="{{ asset('storage/' . $relPost->main_image) }}" alt="related post" class="post-thumbnail">
							<!--в модели 'Post' метод 'category()'(связь с моделью 'Category')-->
							<p class="post-category">{{ $relPost->category->title }}</p>
							<!--делаем ссылку-->
							<a href="{{ route('post.show', $relPost->id) }}">
								<h5 class="post-title">{{ $relPost->title }}</h5>
							</a>
						</div>
						@endforeach
					</div>
				</section>
				@endif


				<section class="comment-list mb-5">
					<h2>Комментарии ({{ $post->comments->count() }})</h2>
					@foreach($post->comments as $comment)
					<div class="comment-text mb-3">
						<span class="username">
							{{--@dd($comment->DateAsCarbon);--}}
							<div>{{ $comment->user->name }}</div>
							<span class="text-muted float-right">{{ $comment->DateAsCarbon->diffForHumans() }}</span>
						</span><!-- /.username -->
						{{ $comment->message }}
					</div>
					@endforeach
				</section>

				@auth()
				<section class="comment-section">
					<h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
					<form action="{{ route('post.comment.store', $post->id) }}" method="post">
						@csrf
						<div class="row">
							<div class="form-group col-12" data-aos="fade-up">
								<label for="comment" class="sr-only">Comment</label>
								<textarea name="message" id="comment" class="form-control" placeholder="Напишите комметарий" rows="10"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-12" data-aos="fade-up">
								<input type="submit" value="Добавить" class="btn btn-warning">
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