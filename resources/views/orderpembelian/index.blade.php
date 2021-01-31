@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('po/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Order Pembelian</a>
                </p>
            </div>
            <div class="box-body">
               <div class="table-responsive">
                   <table class="table table-hover myTable">
                       <thead>
                           <th>No</th>
                           <th>Action</th>
                           <th>Approve?</th>
                           <th>Document No</th>
                           <th>Supplier</th>
                           <th>Total Item</th>
                           <th>Total Nilai</th>
                           <th>Status</th>
                           <th>Created at</th>
                           
                       </thead>
                       <tbody>
                           @foreach($data as $e=>$dt)
                           <tr>
                               <td>{{ $e+1 }}</td>
                               <td>
                                <div style="width:10px">
                                    <a href="{{ url('po/detail/'.$dt->id) }}" class="btn btn-primary btn-xs btn-edit" id="edit"><i class="fa fa-eye">Detail</i></a>
                                </div>
                                </td>
                                
                               <td>
                                 <div style="padding-left: 28px">
                                   <a href="{{ url('po/approved/'.$dt->id) }}"><i class="fa fa-paint-brush"></i></a>
                                 </div>
                               </td>
                               <td>{{ $dt->document_no }}</td>
                               <td>{{ $dt->supplier_id_r->supplier }}</td>
                               <td>{{ $dt->daftar_order_pembelian_r_count }}</td>
                               <td><p>Rp. {{ number_format($dt->grandtotal_r(),2,",",".") }}</p></td>
                               @if($dt->status == 1)
                               <td>
                                   <label class="label label-warning">{{ $dt->status_id_r->nama }}</label>
                              </td>
                              @else
                              <td>
                                   <label class="label label-success">{{ $dt->status_id_r->nama }}</label>
                              </td>
                              @endif

                               <td>{{ date('d M Y', strtotime($dt->created_at)) }}</td>
                               
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