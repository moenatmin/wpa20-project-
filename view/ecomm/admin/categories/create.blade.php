@extends('ecomm.admin.layouts.adminstyle')
@section('content')

<h3>Add New Category</h3>
<hr>

<div class="col-md-3">
	<form action="{{route('admin.categories.store')}}" method="POST" class="form-horizontal" >
	<?php echo csrf_field(); ?>
		<div class="form-group">
			<label for="name" class="label-control">Name:</label>
			<input type="text" id="cat_name" name="name" class="form-control"
			placeholder="Enter Category Name">
			{{$errors->first('name')}}
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@stop
