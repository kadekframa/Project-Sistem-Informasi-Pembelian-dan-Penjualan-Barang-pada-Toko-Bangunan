@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('po') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">
               <div class="row">
                <div class="col-md-6">
                   <table class="table table-stripped">
                       <tbody>
                           <tr>
                             <th>Document No</th>
                             <td>:</td>
                             <td>{{ $dt->document_no }}</td>

                             <th>Supplier</th>
                             <td>:</td>
                             <td>{{ $dt->supplier_id_r->supplier }}</td>
                           </tr>

                           <tr>
                             <th>Status</th>
                             <td>:</td>
                             @if($dt->status == 2)
                             <td>
                               <label class="label label-success">{{ $dt->status_id_r->nama }}</label>
                             </td>
                             @else
                             <td>
                               <label class="label label-warning">{{ $dt->status_id_r->nama }}</label>
                             </td>
                             @endif


                             <th>Created At</th>
                             <td>:</td>
                             <td>{{ date('d M Y', strtotime($dt->created_at)) }}</td>
                           </tr>

                       </tbody>
                   </table>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <form method="post" action="{{ url('po/'.$dt->id) }}">
                      @csrf
                      {{ method_field('PUT') }}
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Nama Barang</th>
                          <th>Qty</th>
                          <th>Harga Beli</th>
                          <th>Grand Total</th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $total_qty = 0;
                            $total_buy = 0;
                            $total = 0;
                        ?>
                        @foreach($dt->daftar_order_pembelian_r as $df)
                        <?php
                            $total_qty += $df->qty;
                            $total_buy += $df->buy;
                            $total += $df->grand_total;
                        ?>

                        <tr>
                          <td>{{ $df->barang_id_r->namabarang }}</td>
                          @if($dt->status != 2)
                          <td>
                            <input type="number" name="qty[]" class="form-control" value="{{ $df->qty }}">
                            <input type="hidden" name="id_line[]" value="{{ $df->id }}">
                            <input type="hidden" name="barang[]" value="{{ $df->barang }}">
                            @else
                            <td>{{ $df->qty }}</td>
                            @endif
                          </td>

                            @if($dt->status != 2)
                          <td>
                            <input type="number" name="buy[]" class="form-control" value="{{ $df->buy }}">
                            @else
                            <td><p>{{ $df->buy }}</p></td>
                            @endif
                          </td>
                          <td>Rp.{{ number_format($df->grand_total,2,",",".") }}</td>
                          <td>
                            <button href="{{ url('po/line/'.$df->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>
                            <b><i>Jumlah</i></b>
                          </th>
                          <th>
                            <b><i>{{ $total_qty }}</i></b>
                          </th>
                          <th>
                            <b><i>Rp.{{ number_format($total_buy, 2,",",".") }}</i></b>
                          </th>
                          <th>
                            <b><i>Rp.{{ number_format($total, 2,",",".") }}</i></b>
                          </th>
                        </tr>
                      </tfoot>
                    </table>
                    @if($dt->status != 2)
                    <div>
                      <button type="submit" class="btn btn-block btn-primary">Simpan Order Pembelian</button>
                    </div>
                    @else
                    <div>
                      <center>
                        <h2><i><b>---Order Pembelian Complete---</b></i></h2>
                      </center>
                    </div>
                    @endif
                    </form>
                  </div>
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