@extends('ecomm.admin.layouts.adminstyle')
@section('content')

<h3>All Products</h3>

<a href="{{route('admin.products.create')}}" class="btn btn-primary">Add New Products</a>

<div class="container">
	<div class="row">
	
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Title</th>
						<th>Image</th>
						<th>Cate-Id</th>
						<th>Description</th>
						<th>Price</th>
						<th>Available</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				@foreach($products as $product)
					<tr>
						<td>{{$product->id}}</td>
						<td>{{$product->title}}</td>
						<td>
							<img src="{{asset($product->image)}}" width="50" height="50">
						</td>
						<td>{{$product->category_id}}</td>
						<td>{{$product->description}}</td>
						<td>{{$product->price}}</td>
						<td>{{$product->availability}}</td>

						<td>
							<a class="btn btn-info" href="{{route('admin.products.edit', $product->id)}}">Edit</a>

						</td>
						<td>
							<form method="POST" action="{{route('admin.products.destroy', $product->id)}}" accept-charset="UTF-8">
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
@stop
