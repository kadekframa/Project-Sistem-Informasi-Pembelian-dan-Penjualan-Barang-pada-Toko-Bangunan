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
               <div class="table-responsive">
                   <table class="table table-stripped">
                       <thead>
                           <th>Detail</th>
                           <th>No</th>
                           <th>Document No</th>
                           <th>Total Item</th>
                           <th>Total Nilai</th>
                           <th>Status</th>
                           <th>Created at</th>
                           
                       </thead>
                       <tbody>
                           @foreach($data as $e=>$dt)
                           <tr>
                               <td>
                                <div style="width:10px">
                                    <a href="{{ url('gr/'.$dt->id) }}" class="btn btn-primary btn-xs btn-edit" id="edit"><i class="fa fa-eye"></i></a>
                                </div>
                                </td>
                               <td>{{ $e+1 }}</td>
                               <td>{{ $dt->document_no }}</td>
                               <td>{{ $dt->total_item() }}</td>
                               <td><p>Rp. {{ number_format($dt->orderpembelian_id_r->grandtotal_r(), 2,",",".") }}</p></td>
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