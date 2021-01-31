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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" action="{{ url('barang/add') }}" method="post">
                    @csrf
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputPassword1">Kode</label>
                      <input type="text" name="kode" value="{{ $kode }}" class="form-control" id="exampleInputPassword1" placeholder="Kode Produk">

                      <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                      <input type="text" name="namabarang" class="form-control" id="exampleInputEmail1" placeholder="Nama barang">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang</label>
                      <select class="form-control select2" name="jenis_id">
                        <option selected="" disabled="">Pilih Jenis Barang</option>
                        @foreach($jenisbarang as $jb)
                        <option value="{{ $jb->id }}">{{ $jb->jenis_barang }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Satuan</label>
                      <select class="form-control select2" name="satuan_id">
                        <option selected="" disabled="">Pilih Satuan</option>
                        @foreach($satuan as $stn)
                        <option value="{{ $stn->id }}">{{ $stn->satuan }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Supplier</label>
                      <select class="form-control select2" name="supplier_id">
                        <option selected="" disabled="">Pilih Supllier</option>
                        @foreach($supplier as $spl)
                        <option value="{{ $spl->id }}">{{ $spl->supplier }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Minimal Stok</label>
                      <input type="number" name="minimal_stok" class="form-control" id="exampleInputEmail1" placeholder="Minimal Stok barang">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga Beli</label>
                      <input type="number" name="buy" class="form-control" id="exampleInputEmail1" placeholder="Harga beli barang">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga Jual</label>
                      <input type="number" name="hargajual" class="form-control" id="exampleInputEmail1" placeholder="Harga jual barang">
                    </div>
                    
                  </div>
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection