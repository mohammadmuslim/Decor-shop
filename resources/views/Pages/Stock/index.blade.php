@extends('layouts.mainLayout')
@section('content_body')


<div class="card">
    <div class="card-header">
       Add Product Stock
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-control-label" for="customer_id">Product Name</label>
                <select required data-toggle="select" class="form-control"  id="product_id" name="product_id">
                <option></option>   
                @foreach($data as $row)
                <option value="{{ $row->id }}">{{ $row->product_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="shop_adress">Product Quantity</label>
                <input type="number" class="form-control" id="shop_adress" name="product_quantity" required>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add Quentity">
            </div>

          </form>
    </div>
</div>

<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Action buttons</h3>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
              <tr>
                <th>Product Name</th>
                <th>Quantity</th>
              </tr>
            </thead>
            <tbody>
                @foreach($stocks as $row)
              <tr>
                <td>{{ $row->product->product_name }}</td>
                <td>{{ $row->quantity }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

@endsection
