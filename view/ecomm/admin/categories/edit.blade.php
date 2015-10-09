@extends('ecomm.admin.layouts.adminstyle')
@section('content')

<div class="col-md-3">
	<form action="{{route('admin.categories.update', $categories->id)}}" method="POST" class="form-horizontal">
	<input name="_method" type="hidden" value="PATCH">
	<?php echo csrf_field(); ?>
		<div class="form-group">
			<label for="name" class="label-control">Name:</label>
			<input type="text" id="cat_name" name="name" class="form-control"
			placeholder="Enter Category Name" value=" {{old('name')}} ">
			{{$errors->first('name')}}
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>
