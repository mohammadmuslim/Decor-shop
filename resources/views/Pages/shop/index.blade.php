@extends('layouts.mainLayout')
@section('content_body')


<div class="card">
<!-- Table -->
 <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h2 class="mb-0">LIST</h2>
          <a href="/addshop" class="btn btn-success">Create New Shop</a>
        </div>
        <div class="table-responsive py-4 ">
          <table class="table table-flush">
            <thead class="thead-light">
              <tr>
                <th>Shop_No</th>
                <th>Shop Name</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
                
               
                @foreach ($shop_list as $shop)
                 <tr>
                    <td>{{$shop->id}}</td>
                    <td>{{$shop->shop_name}}</td>
                    <td>
                        <a class="btn btn-success" href="/shop/{{$shop->id}}">More</a>
                    </td>
                </tr>
                @endforeach
                    


                
              

            </tbody>
          </table>


      </div>
    </div>
  </div>

</div>

@endsection
