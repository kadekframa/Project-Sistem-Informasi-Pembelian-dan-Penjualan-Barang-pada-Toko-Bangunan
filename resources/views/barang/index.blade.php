@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('barang/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data Barang</a>
                </p>
            </div>
            <div class="box-body">
               <div class="table-responsive">
                   <table class="table table-hover myTable">
                       <thead>
                           <th>No</th>
                           <th>Kode</th>
                           <th>Nama Barang</th>
                           <th>Jenis Barang</th>
                           <th>Satuan</th>
                           <th>Supplier</th>
                           <th>Stok</th>
                           <th>Minimal Stok</th>
                           <th>Harga Beli</th>
                           <th>Harga Jual</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                           @foreach($data as $e=>$dt)
                           <tr>
                               <td>{{ $e+1 }}</td>
                               <td>{{ $dt->kode }}</td>
                               <td>{{ $dt->namabarang }}</td>
                               <td>{{ $dt->jenis_id_r->jenis_barang }}</td>
                               <td>{{ $dt->satuan_id_r->satuan }}</td>
                               <td>{{ $dt->supplier_id_r->supplier }}</td>
                               <td>{{ $dt->stok }}</td>
                               <td>{{ $dt->minimal_stok }}</td>
                               <td><p align="right">Rp.{{ number_format($dt->buy,2,",",".") }}</p></td>
                               <td><p align="right">Rp.{{ number_format($dt->hargajual,2,",",".") }}</p></td>
                               <td>
                                <div style="width:80px">
                                    <a href="{{ url('barang/detail/'.$dt->id) }}" class="btn btn-primary btn-xs btn-edit" id="edit"><i class="fa fa-eye"></i></a>

                                    <a href="{{ url('barang/'.$dt->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>

                                    <button href="{{ url('barang/'.$dt->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                </div>
                                </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>

               </div>


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