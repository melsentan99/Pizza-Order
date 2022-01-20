@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-8">

            @if(count($errors)>0)
            <div class="card mt-5">
                <div class="card-body">
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p> {{ $error }} <p>
                        @endforeach
                        </div>
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Edit Pizza') }}</div>
            <form action="{{ route('pizza.update', $pizza->id) }}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')    
                <div class="card-body">
                	<div class="form-group">
                		<label for="name">Name of pizzza</label>
                		<input type="text" class="form-control" name="name" placeholder="name of pizza" value="{{ $pizza->name }}">
                	</div>
                	<div class="form-group">
                		<label for="description">Description of pizzza</label>
                		<textarea class="form-control" name="description" value="">{{ $pizza->description }}</textarea>
                	</div>
                	<div class="form-inline">
                		<label>Pizza Price($)</label>
                		<input type="text" class="form-control" placeholder="small pizza price" name="small_pizza_price" value="{{ $pizza->small_pizza_price }}">
                		<input type="text" class="form-control" placeholder="medium pizza price" name="medium_pizza_price" value="{{ $pizza->medium_pizza_price }}">
                		<input type="number" class="form-control" placeholder="large pizza price" name="large_pizza_price" value="{{ $pizza->large_pizza_price }}">
                	</div>
                	<div class="form-group">
                		<label for="description">Category</label>
                		<select class="form-control" name="category">
                			<option value="vegetarian">Vegetarian Pizza</option>
                			<option value="nonvegetarian">Non Vegetarian Pizza</option>
                			<option value="traditional">Traditional Pizza</option>
                		</select>
                	</div>
                	<div class="form-group">
                		<label>Image</label>
                		<input type="file" class="form-control" name="image">
                        <img src="{{ Storage::url($pizza->image) }}" width="80">
                	</div>
                	<div class="form-group text-center">
                		<button class="btn btn-primary" type="submit">Save</button>
                	</div>

                </div>
            </form>
            </div>
        </div>


    </div>
</div>
@endsection
