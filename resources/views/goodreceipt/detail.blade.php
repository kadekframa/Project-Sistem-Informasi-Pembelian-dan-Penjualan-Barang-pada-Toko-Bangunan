@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('gr') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                    <a class="btn btn-sm btn-flat btn-success btn-approved"><i class="fa fa-check"></i> Approve</a>
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

                             <th>Doc. Order Pembelian</th>
                             <td>:</td>
                             <td>{{ $dt->orderpembelian_id_r->document_no }}</td>
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
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dt->orderpembelian_id_r->daftar_order_pembelian_r as $df)
                        <tr>
                          <td>{{ $df->barang_id_r->namabarang }}</td>
                          <td>{{ $df->qty }}</td>
                          <td><p>{{ $df->buy }}</p></td>
                          <td><p>Rp. {{ number_format($df->grand_total,2,",",".") }}</p></td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>
                            <b>Total</b>
                          </th>
                          <th>
                             <i><b><p>Rp. {{ number_format($df->sum_buy(), 2,",",".") }}</p></b></i>
                          </th>
                          <th>
                             <i><b><p>Rp. {{ number_format($df->sum_grand_total(), 2,",",".") }}</p></b></i>
                          </th>
                        </tr>
                      </tfoot>
                    </table>

                    </form>
                  </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal approved -->
 <div class="modal fade" id="modal-approved" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
 
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
 
          <div class="modal-body">
 
            <div class="py-3 text-center">
              <i class="ni ni-bell-55 ni-3x"></i>
              <h4 class="heading mt-4">Apakah Kamu Yakin Ingin Mengapprove Data Ini?</h4>
            </div>
 
          </div>
 
          <div class="modal-footer">
            <form action="{{ url('gr/approved/'.$dt->id) }}" method="post">
              {{ csrf_field() }}
              <p>
              <button type="submit" class="btn btn-success btn-flat btn-sm menu-sidebar">Ok, Approve</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Keluar</button>
              </p>
            </form>
          </div>
 
        </div>
      </div>
    </div>

@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){

      $('.btn-approved').click(function(){
        $('#modal-approved').modal();
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