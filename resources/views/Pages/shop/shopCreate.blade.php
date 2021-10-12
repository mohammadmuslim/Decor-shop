@extends('layouts.mainLayout')
@section('content_body')


<div class="card">
    <div class="card-header">
        Shop Create
    </div>
    <a href="/shop" class="btn btn-success">View All Shop List</a>

    <div class="card-body">
        <form action="/shop" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="name">Shop Nmae</label>
                <input type="text" class="form-control" id="name" name="shop_name" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="shop_adress">Shop Address</label>
                <input type="text" class="form-control" id="shop_adress" name="shop_adress" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="mobile_number">mobile number</label>
                <input type="number" class="form-control" id="mobile_number" name="mobile_number" required>
            </div>


            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>

          </form>
    </div>

@endsection
