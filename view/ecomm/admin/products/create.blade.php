@extends('ecomm.admin.layouts.adminstyle')
@section('content')

<h3>Add New Category</h3>
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
	<form action="{{route('admin.products.store')}}" enctype="multipart/form-data"
	class="form-horizontal" method="POST">
	<?php echo csrf_field(); ?>
	<label for="category_id">Category</label>
	<select id="category_id" name="category_id">
		@foreach($categories as $category)
		<option value=" {{$category->id}} ">
			{{$category->name}}
		</option>
		@endforeach
	</select>
	

	<hr>
	<label for="image">Choose an Image</label>
	<input name="image" type="file" id="image">
	<hr>
	<label for="title">Product Title</label>
	<input type="text" name="title" id="product_title" class="form-control">
	<label for="description">Product Description</label>
	<textarea name="description" id="product_description" rows="5" class="form-control"></textarea>
	<hr>
	<label for="price">Price</label>
	<input type="integer" name="price" id="product_price" class="form-price">
	<hr>
	<button type="submit" class="btn btn-primary">Submit</button>

	

</form>
</div>

@stop
