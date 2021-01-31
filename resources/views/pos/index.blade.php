@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <form role="form" method="post" action="{{ url('po/add') }}">
                  @csrf 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Scan Barcode</label>
                      <input type="text" autocomplete="off" class="form-control" id="exampleInputEmail1" name="barcode">
                    </div>
                  </div>

                  <!-- /.box-body -->

                </form>
                </div>
              </div>

              <div class="col-md-6">
                   <table class="table table-stripped">
                       <tbody>
                           <tr>
                             <th>Document No</th>
                             <td>:</td>
                             <td></td>

                             <th>Supplier</th>
                             <td>:</td>
                             <td></td>
                           </tr>

                           <tr>
                             <th>Created At</th>
                             <td>:</td>
                             <td></td>
                           </tr>

                       </tbody>
                   </table>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <form method="post" action="">
                      @csrf
                      {{ method_field('PUT') }}
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>Nama Barang</th>
                          <th>Qty</th>
                          <th>Harga Jual</th>
                          <th>Grand Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                            <button class="btn btn-sm btn-flat btn-danger btn-delete"><i class="fa fa-trash"></i> </button>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>

                          <th>
                            <br><br><br><br>
                            <b><i>Jumlah</i></b>
                          </th>
                        </tr>
                      </tfoot>
                    </table>
                    <div>
                      <button type="submit" class="btn btn-block btn-primary">Submit Data Penjualan</button>
                    </div>
                    </form>


            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){

      $("input[name='barcode']").keypress(function(e){
        e.preventDefault();
        if(e.which == 13){
          e.preventDefault();
          var kode = $(this).val();
          var url = "{{ url('barang/ajax') }}"+'/'+kode;
          var _this = $(this);

          $.ajax({
            type:'get'
            dataType:'json'
            url:url,
            success:function(data){
              console.log(data);
              _this.val('');
            }
          })
        }
      })
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection