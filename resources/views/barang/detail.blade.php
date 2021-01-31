@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('barang') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">
               <div class="table-responsive">
                   <table class="table table-stripped">
                       <tbody>
                           <tr>
                             <th>Barcode</th>
                             <td>:</td>
                             <td>
                               <img src="">
                             </td>

                             <th>Nama</th>
                             <td>:</td>
                             <td>{{ $dt->namabarang }}</td>
                           </tr>

                           <tr>
                             <th>Supplier</th>
                             <td>:</td>
                             <td>{{ $dt->supplier_id_r->supplier }}</td>

                             <th>Kode</th>
                             <td>:</td>
                             <td>{{ $dt->kode }}</td>
                           </tr>

                           <tr>
                             <th>Stok</th>
                             <td>:</td>
                             <td>{{ $dt->stok }}</td>

                             <th>Minimal Stok</th>
                             <td>:</td>
                             <td>{{ $dt->minimal_stok }}</td>
                           </tr>

                           <tr>
                             <th>Created At</th>
                             <td>:</td>
                             <td>{{ $dt->created_at }}</td>

                             <th>Updated At</th>
                             <td>:</td>
                             <td>{{ $dt->updated_at }}</td>
                           </tr>

                           <tr>
                            <th>Harga Beli</th>
                             <td>:</td>
                             <td>Rp.{{ number_format($dt->buy,2,",",".") }}</td>

                             <th>Harga Jual</th>
                             <td>:</td>
                             <td>Rp.{{ number_format($dt->hargajual,2,",",".") }}</td>
                           </tr>
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