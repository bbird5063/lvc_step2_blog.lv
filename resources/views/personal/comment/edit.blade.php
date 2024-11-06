@extends('personal.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Комментарии</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Главная</a></li>
						<li class="breadcrumb-item active">Комментарии</li>
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

					<form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="w-50">
						@csrf
						@method('PATCH') {{-- НЕ ЗАБЫВАТЬ ПРИ Route::patch! --}}

						<div class="form-group">
							<textarea class="form-control" cols="30" rows="10" name="message" placeholder="Комментарий">{{ $comment->message }}</textarea>
							@error('message')
							<div class="text-danger">
								Это поле необходимо заполнить
								{{--
								или {{ $message }}
								Можно использовать $message(будет 'The message field is required', это можно перенастроить на русский), но это тема др.урока
								--}}
							</div>
							@enderror
							<input type="submit" class="btn btn-primary mt-3" value="Обновить">
						</div>
					</form>
				</div>


			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection