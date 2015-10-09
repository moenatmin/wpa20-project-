@extends('ecomm.admin.layouts.adminstyle')
@section('content')

<h3>All Categories</h3>

<a href="{{route('admin.categories.create')}}" class="btn btn-primary">Add New Category</a>

<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)

					<tr>
						<td>{{$category->id}}</td>
						<td>{{$category->name}}</td>
						<td>
							<a class="btn btn-info" href="{{route('admin.categories.edit', $category->id)}}">Edit</a>
						</td>
						<td>
							<form method="POST" action="{{route('admin.categories.destroy', $category->id)}}" accept-charset="UTF-8">
								<input name="_method" type="hidden" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input class="btn btn-danger" type="submit" value="Delete">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>

			</table>
		</div>

	</div>
</div>
