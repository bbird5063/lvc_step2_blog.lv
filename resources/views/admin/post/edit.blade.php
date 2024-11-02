@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Редактирование поста '{{ $post->title }}'</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
						<li class="breadcrumb-item active">{{$post->title}}</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-12">

					<!--Обязательно enctype="multipart/form-data"-->
					<form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
						<!--убрали class="w-25"-->
						@csrf
						@method('PATCH') <!-- НЕ ЗАБЫВАТЬ @method('PATCH')! -->
						<div class="form-group">
							<input type="text" class="form-control w-25" name="title" placeholder="Название поста" value="{{ $post->title }}">
							@error('title')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
						<!--добавили контент-->
						<div class="form-group">
							<!-- Вставили и изменили name="editordata" -->
							<textarea id="summernote" name="content">{{ $post->content }}</textarea>
							@error('content')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group w-50">
							<label for="exampleInputFile">Добавить превью</label>
							<div class="w-25">
								<img src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image" class="w-50">
							</div>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="preview_image">
									<label class="custom-file-label">Выберите изображение</label>
								</div>
								<div class="input-group-append">
									<span class="input-group-text">Загрузка</span>
								</div>
							</div>
							@error('preview_image')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group w-50">
							<label for="exampleInputFile">Добавить главное изображение</label>
							<div class="w-50">
								<img src="{{ url('storage/' . $post->main_image) }}" alt="main_image" class="w-50">
							</div>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="main_image">
									<label class="custom-file-label">Выберите изображение</label>
								</div>
								<div class="input-group-append">
									<span class="input-group-text">Загрузка</span>
								</div>
							</div>
							@error('main_image')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="form-group">
							<label>Выберите категорию</label>
							<!--<select class="form-control" name="category_id" value="{{ old('category_id') }}"> ТАК "old('category_id')" НЕ РАБОТАЕТ-->
							<select class="form-control" name="category_id">

								@foreach($categories as $category)
								<option
									{{ $category->id == $post->category_id ? ' selected' : '' }} value="{{ $category->id }}">
									{{ $category->title }}
								</option>
								@endforeach
							</select>
							@error('category_id')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="form-group">
							<label>Тэги</label>
							<select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
								@foreach($tags as $tag)
								<!--изменяем old('tag_ids') на $post->tags, но нам нужны только 'id', поэтому добавляем еще '->pluck'. (tags это модель)
								В итоге: $post->tags->pluck('id').
								LV:pluck('id') соответствует PHP:array_column(array, 'id')/
								Эти функции соберут в новый массив только 'id'.
								Еще нужен '->toArray()'
								В итоге: $post->tags->pluck('id')->toArray().
								-->
								<option
									{{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
								<!--<option value="{{ $tag->id }}">{{ $tag->title }}</option>-->
								@endforeach
							</select>
							<!--'...name="tag_ids[]..."' ->'tag_ids' без '[]'-->
							@error('tag_ids')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-primary mt-3" value="Обновить">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection