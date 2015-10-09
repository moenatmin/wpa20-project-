@extends('ecomm.admin.layouts.adminstyle')
@section('content')

<h3>Edit Category</h3>
<hr>
 @if($errors->has())
<div class="alert alert-warning" role="alert" align="center">
	<ul>
		@foreach ($errors->all() as $error)
		<li> {{ $error }}	</li>
		@endforeach
	</ul>
</div>
@endif
<div class="col-md-8">
	<form action="{{route('admin.products.update', $products->id)}}" enctype="multipart/form-data"
	class="form-horizontal" method="POST">
	<input name="_method" type="hidden" value="PUT">
	<?php echo csrf_field(); ?>
	<label for="category_id">Category</label>
	<select id="category_id" name="category_id">
		@foreach($categories as $category)
		<option value="{{$category->id}} ">
			{{$category->name}}
		</option>
		@endforeach
	</select>
	

	<hr>
	<label for="image">Choose an Image</label>
	<input name="image" type="file" id="image" value="">
	<hr>

	<label for="title">Product Title</label>
	<input type="text" name="title" id="product_title" class="form-control" value="{!!$products['title']!!}">
	<label for="description">Product Description</label>
	<textarea name="description" id="product_description" rows="5" class="form-control">{!!$products['description']!!}</textarea>
	<hr>
	<label for="price">Price</label>
	<input type="integer" name="price" id="product_price" class="form-price" value="{!!$products['price']!!}">
	
	<hr>
	<button type="submit" class="btn btn-primary">Update</button>

	

</form>
</div>

@stop
