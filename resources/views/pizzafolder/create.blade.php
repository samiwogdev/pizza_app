@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">{{ __('Menu') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">View</li>
                            <li class="list-group-item">Create</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Pizza') }}</div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $errors)
                               <p> {{ $errors }} </p>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('pizza.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="name">Name of pizzza</label>
                                <input type="text" class="form-control" name="name" placeholder="name of pizza">
                            </div>
                            <div class="form-group">
                                <label for="description">Description of pizzza</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="form-inline">
                                <label>Pizza price($)</label>
                                <input type="number" name="small_pizza_price" class="form-control"
                                    placeholder="small pizza price">
                                <input type="number" name="medium_pizza_price" class="form-control"
                                    placeholder="medium pizza price">
                                <input type="number" name="large_pizza_price" class="form-control"
                                    placeholder="large pizza price">

                            </div>
                            <div class="form-group">
                                <label for="description">Category</label>
                                <select class="form-control" name="category">
                                    <option value=""></option>
                                    <option value="vegetarian">Vegetarian Pizza</option>
                                    <option value="nonvegetarian">Non vegetarian Pizza</option>
                                    <option value="traditional">Traditional Pizza</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" name="image">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
