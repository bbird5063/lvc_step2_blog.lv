@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Редактирование тэга '{{ $tag->title }}'</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">Тэги</a></li>
						<li class="breadcrumb-item active">Редактирование тэга</li>
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

					<form action="{{ route('admin.tag.update', $tag->id) }}" method="POST" class="w-25">
						@csrf
						@method('PATCH') {{-- НЕ ЗАБЫВАТЬ ПРИ Route::patch! --}}

						<div class="form-group">
							<input type="text" class="form-control" name="title" placeholder="Название тэга" value="{{ $tag->title }}">
							@error('title')
							<div class="text-danger">
								Это поле необходимо заполнить
								{{-- 
								или {{ $message }} 
								Можно использовать $message(будет 'The title field is required', это можно перенастроить на русский), но это тема др.урока
								--}}
							</div>
							@enderror
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