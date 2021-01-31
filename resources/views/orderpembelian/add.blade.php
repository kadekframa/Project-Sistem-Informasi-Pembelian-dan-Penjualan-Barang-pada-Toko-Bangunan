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
            <form role="form" method="post" action="{{ url('po/add') }}">
              @csrf 
            <div class="box-body">

                
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Document No</label>
                      <input type="text" name="document_no" class="form-control" id="exampleInputEmail1" placeholder="Document No" value="{{ $doc_no }}">
                    </div>

                    @if(isset($supplier))
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier</label>
                        <select class="form-control select2" name="supplier">
                          <option selected="" disabled="">Pilih Supplier</option>
                          @foreach($suppliers as $sp)
                          <option value="{{ $sp->id }}" {{ ($supplier == $sp->id)? 'selected' : '' }}>{{ $sp->supplier }}</option>
                          @endforeach
                        </select>
                    </div>
                    @else
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier</label>
                        <select class="form-control select2" name="supplier">
                          <option selected="" disabled="">Pilih Supllier</option>
                          @foreach($suppliers as $sp)
                          <option value="{{ $sp->id }}">{{ $sp->supplier }}</option>
                          @endforeach
                        </select>
                    </div>
                    @endif
                  </div>


                  <!-- /.box-body -->

                @if(isset($barang))
                <div class="row">
                  <div class="col-md-12">
                    <table class="table myTable">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Harga Beli</th>
                          <th>Qty</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($barang as $e=>$br)
                      <tr>
                        <td>{{ $e+1 }}</td>
                        <td>{{ $br->namabarang }}</td>
                        <td><p>Rp.{{ number_format($br->buy, 2,",",".") }}</p></td>
                        <td>
                          <input type="hidden" name="barang[]" value="{{ $br->id }}">
                          <input type="number" value="0" class="form-control" name="qty[]">
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
                @endif


            </div>

     
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                  </div>
                </form>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){

      $("select[name='supplier']").change(function(e){
        var id_supplier = $(this).val();
        var url = "{{ url('po/barang') }}"+'/'+id_supplier;

        window.location.href = url;
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