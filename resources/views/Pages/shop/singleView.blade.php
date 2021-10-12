@extends('layouts.mainLayout')
@section('content_body')


<div class="card">
<div class="card-header">
   <h1 class="text-center">Shop Name:- {{ $shop->shop_name }}</h1>
</div>
<div class="card-body">
   <div class="row text-center">
      <div class="col-md-6">
         <h3>Shop Address:- {{ $shop->shop_adress }}</h3>
      </div>
      <div class="col-md-6">
         <h3>Mobile Numbers:- {{ $shop->mobile_number }}</h3>
      </div>
   </div>
   <div class="row text-center">
      <div class="col-md-12">
          <h3>বাকি টাকা:- <span class="text-primary"> টাকা</span></h3>
      </div>
   </div>
   <hr>
   <!-- Shop Invoice -->
   <div class="row text-center">
      <div class="col-md-6">
         <div class="table-responsive py-4 ">
            <table class="table table-flush">
               <thead class="thead-light">
                  <tr>
                     <th>Invoice No.</th>
                     <th>Shop Name</th>
                     <th>Date</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                 
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>
                        <a  title="Approved" href="" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                        </a>
                     </td>
                  </tr>
                 
               </tbody>
            </table>
           
         </div>
      </div>
      <div class="col-md-6">
         <!-- Table -->
         <div class="row">
            <div class="col">
               <div class="card">
                  <!-- Card header -->
                  <div class="table-responsive py-4 ">
                     <table class="table table-flush">
                        <thead class="thead-light">
                           <tr>
                              <th>তারিখ</th>
                              <th>দোকানের নাম</th>
                              <th>টাকা</th>
                              <th>Discount</th>
                           </tr>
                        </thead>
                        <tbody>
                          
                           <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                           </tr>
                         
                        </tbody>
                     </table>
                    
                  </div>
               </div>
            </div>
            <!--- Data table End ---->  
         </div>
      </div>
      <!-- Invoice End -->
   </div>
</div>

@endsection
