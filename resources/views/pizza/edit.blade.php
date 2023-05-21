@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                @if (count($errors) > 0)
                <div class="card mt-5">
                    <div class="card-body">
                       
                        <div class="alert alert-danger"> 
                            @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">Edit Pizza</div>
                   
                    <form action=" {{ route('pizza.update', $pizza->id) }} " method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name of pizza</label>
                                <input type="text" class="form-control" name="name" placeholder="name of pizza" value=" {{$pizza->name}} ">
                            </div>

                            <div class="form-group">
                                <label for="description">Description of pizza</label>
                                <textarea class="form-control" name="description">{{$pizza->description}} "</textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label>Pizza price($)</label>
                                <input class="col-2" type="text" name="small_pizza_price" class="form-control"
                                    placeholder="small pizza price" value=" {{$pizza->small_pizza_price}} ">
                                <input class="col-2" type="text" name="medium_pizza_price" class="form-control"
                                    placeholder="medium pizza price" value=" {{$pizza->medium_pizza_price}} ">
                                <input class="col-2" type="text" name="large_pizza_price" class="form-control"
                                    placeholder="large pizza price" value=" {{$pizza->large_pizza_price}} ">
                            </div>

                            <div class="form-group">
                                <label for="description">Category</label>
                                <select class="form-control" name="category">
                                    <option value="">Select Option</option>
                                    <option value="vegetarian">Vegetarian Pizza</option>
                                    <option value="nonvegetarian">Non Vegetarian Pizza</option>
                                    <option value="traditional">Traditional Pizza</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                                <img src=" {{Storage::url($pizza->image)}} " width="80" alt="" srcset="">
                            </div>

                            <div class="form-group text-center mt-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
