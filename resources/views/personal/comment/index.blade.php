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
				<div class="card-body table-responsive p-0">
					<table class="table table-hover text-nowrap">
						<thead>
							<tr>
								<th>ID</th>
								<th>Название</th>
								<th colspan="2" class="text-center">Действия</th> <!-- colspan="3", class="text-center" -->
							</tr>
						</thead>
						<tbody>
							@foreach($comments as $comment)
							<tr>
								<td>{{ $comment->id }}</td>
								<td>{{ $comment->message }}</td>
								<td><a href="{{ route('personal.comment.edit', $comment->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>

								{{-- ССЫЛКА ВСЕГДА НА 'Route::get...', а нам нужно 'Route::delete...'. Поэтому форма --}}
								<td>
									<form action="{{ route('personal.comment.destroy', $comment->id) }}" method="POST">
										{{-- Если 'personal.liked.destroy', то удалится из лайк-постов, поэтому нужно 'personal.comment.destroy' --}}
										@csrf
										@method('DELETE')
										<!--класс bg-transparent и если его задать для nav то элемент будет прозрачным-->
										<button type="submit" class="border-0 bg-transparent">
											<i class="fas fa-trash text-danger" role="button"></i>
										</button>
									</form>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>


			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection