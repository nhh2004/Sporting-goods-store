@extends('admin.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Dashboard</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container-fluid">
      <style type="text/css">
        p.title_thongke {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <p class="title_thongke">Sales order statistics</p>
      <div class="row-md">
        <form autocomplete="off">
            @csrf
            <div class="col-md-2">
                <p>Since: <input type="text" id="datepicker" class="form-control"></p>     
            </div>
            <div class="col-md-2">
              <p>To date: <input type="text" id="datepicker2" class="form-control"></p>
              <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-md" value="Statistical">
            </div>
            <div class="col-md-12">
              <div class="float-right mr-3 mb-4">
                <a href="/admin/print-revenue-report" target="_blank" id="print-revenue-report" class="btn btn-info btn-border btn-round btn-md">
                  <i class="fas fa-print"></i>
                  Print statistics
                </a>
              </div>
            </div>
          </form>
        </div>
      <div class="row-md">
        <div class="col-md-12">
            <div id="myfirstchart" style="height: 250px;"></div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-4 col-xs-12">
          <p class="title_thongke">Statistics of total products and orders</p>
            <div id="donut"></div>
        </div>
        
        <div class="col-md-4 col-xs-12">
          <h4>Most bought products</h4>
          <ol class="list_views">
            @foreach($cthd as $key => $pro)
            <li>
                <a target="_blank" href="admin/products/edit/{{ $pro->product_id }}"> 
                    {{ optional($pro->product)->name }}
                    <span style="color:black">({{ $pro->sum }})</span>
                </a> 
            </li>
        @endforeach
        
        @foreach($customer_spend as $key => $cus_spend)
            <li>
                <a target="_blank" href="admin/customers/view/{{ $cus_spend->id }}"> 
                    {{ optional($cus_spend)->name }}
                    <span style="color:black">({{ $cus_spend->spend }})</span>
                </a> 
            </li>
        @endforeach
        
          </ol>
        </div>
        
        <div class="col-md-4 col-xs-12">
          <h4>Customers buy the most</h4>
          <ol class="list_views">
            @foreach($customer_spend as $key => $cus_spend)
            <li>
                <a target="_blank" href="admin/customers/view/{{ $cus_spend->id }}"> 
                  {{ $cus_spend->name }}
                  <span style="color:black">({{ $cus_spend->spend }})</span>
                </a> 
            </li>
            @endforeach
          </ol>
        </div>


      </div>
    </div>
    <!-- /.content -->
@endsection
</html>
