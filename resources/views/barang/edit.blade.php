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
                <form role="form" accept="{{ url('barang/'.$dt->id) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputPassword1">Kode</label>
                      <input type="text" name="kode" value="{{ $dt->kode }}" class="form-control" id="exampleInputPassword1" placeholder="Kode barang">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                      <input type="text" name="namabarang" class="form-control" id="exampleInputEmail1" placeholder="Nama barang" value="{{ $dt->namabarang }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Barang</label>
                      <select class="form-control select2" name="jenis_id">
                        @foreach($jenisbarang as $jb)
                        <option value="{{ $jb->id }}" {{ ($dt->jenis_id == $jb->id)? 'selected' : '' }}>{{ $jb->jenis_barang }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Satuan</label>
                      <select class="form-control select2" name="satuan_id">
                        @foreach($satuan as $stn)
                        <option value="{{ $stn->id }}" {{ ($dt->satuan_id == $stn->id)? 'selected' : '' }}>{{ $stn->satuan }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Supplier</label>
                      <select class="form-control select2" name="supplier_id">
                        @foreach($supplier as $spl)
                        <option value="{{ $spl->id }}" {{ ($dt->supplier_id == $spl->id)? 'selected' : '' }}>{{ $spl->supplier }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Minimal Stok</label>
                      <input type="number" name="minimal_stok" class="form-control" id="exampleInputEmail1" placeholder="Minimal Stok" value="{{ $dt->minimal_stok }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga Beli</label>
                      <input type="number" name="buy" class="form-control" id="exampleInputEmail1" placeholder="Harga beli" value="{{ $dt->buy }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga Jual</label>
                      <input type="number" name="hargajual" class="form-control" id="exampleInputEmail1" placeholder="Harga jual" value="{{ $dt->hargajual }}">
                    </div>
                    
                  </div>
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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