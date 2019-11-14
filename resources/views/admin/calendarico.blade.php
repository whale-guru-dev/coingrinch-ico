@extends('layouts.admin')

@section('content')
<?php $i=1; ?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title  uppercase bold"> ICO Calendar Management</h3>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <!-- <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">AAA</span> -->
                            <button type="button" class="btn purple btn-sm edit_button" data-toggle="modal" data-target="#addModal">
                                <i class="fa fa-edit"></i> ADD NEW BATCH
                            </button> 
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
	                            <tr>
	                                <th> Order </th>
	                                <th> Date From </th>
                                    <th> Date To </th>
	                                <th> Price </th>
	                                
	                                <th> Status </th>
	                                <th> Bonus </th>
                                    <th> Action </th>
	                            </tr>
                            </thead>
                            <tbody>
                                @foreach($dbatch as $batch)
                                
                                    <tr id="{{$batch->id}}">
                                        <th> {{$i++}} </th>
                                        <th> {{$batch->date_from}} </th>
                                        <th> {{$batch->date_to}} </th>
                                        <th> {{$batch->price}} USD</th>
                                        
                                        @if($batch->status == 1)
                                            <th> Waiting </th>
                                        @elseif($batch->status == 2)
                                            <th> On Going </th>
                                        @elseif($batch->status == 3)
                                            <th> Sold </th>
                                        @endif
                                        <th> {{$batch->bonus}} %</th>
                                        <th> 
                                            <button type="button" class="btn purple btn-sm edit_button" 
                                                data-toggle="modal" data-target="#editModal"
                                                data-act="Edit"
                                                data-status="{{$batch->status}}"
                                                data-price="{{$batch->price}}"
                                                data-bonus="{{$batch->bonus}}"
                                                data-to="{{$batch->date_to}}"
                                                data-from="{{$batch->date_from}}"
                                                
                                                data-id="{{$batch->id}}">
                                                <i class="fa fa-edit"></i> EDIT
                                            </button> 


                                            <button type="button" class="btn btn-danger btn-sm delete_button" 
                                            data-toggle="modal" data-target="#DelModal"
                                            data-id="{{$batch->id}}">
                                            <i class="fa fa-times"></i>  DELETE
                                            </button> 
                                        </th>
                                    </tr>
                                
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div><!-- ROW-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->


<!-- Modal for Add button -->
<div class="modal container fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> <b class="abir_act"></b> Batch Management</h4>
        </div>
        <form method="post" action="/Admins/SetCalendarIco">
            {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="type" value="add">
                

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Batch Start Date</strong></label>
                        <div class="col-md-12">
                            <input class="form-control input-lg abir_from" name="date_from" placeholder="" type="date">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Batch End Date</strong></label>
                        <div class="col-md-12">
                            <input class="form-control input-lg abir_to" name="date_to" placeholder="" type="date">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Price</strong></label>
                        <div class="col-md-12">
                            <input class="form-control input-lg abir_price" name="price" placeholder="" type="text">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Status</strong></label>
                        <div class="col-md-12">
                            <select class="abir_status form-control" name="status">
                                <option value="1">Waiting</option>
                                <option value="2">On-Going</option>
                                <option value="3">Sold</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Bonus</strong></label>
                        <div class="col-md-12">
                            <input class="form-control input-lg abir_bonus" name="bonus" placeholder="" type="text">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Batch</button>
            </div>
        </form>
    </div>
</div>


<!-- Modal for Edit button -->
<div class="modal container fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> <b class="abir_act"></b> Batch Management</h4>
        </div>
        <form method="post" action="/Admins/SetCalendarIco">
            {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="type" value="edit">
                <input class="form-control abir_id" type="hidden" name="id">

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Batch Start Date</strong></label>
                        <div class="col-md-12">
                            <input class="form-control input-lg abir_from" name="date_from" placeholder="" type="date">
                        </div>
                    </div>
                </div>

                <div class="row">
	                <div class="form-group">
	                    <label class="col-md-12"><strong style="text-transform: uppercase;">Batch End Date</strong></label>
	                    <div class="col-md-12">
	                        <input class="form-control input-lg abir_to" name="date_to" placeholder="" type="date">
	                    </div>
	                </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Price</strong></label>
                        <div class="col-md-12">
                            <input class="form-control input-lg abir_price" name="price" placeholder="" type="text">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Status</strong></label>
                        <div class="col-md-12">
                            <select class="abir_status form-control" name="status">
                                <option value="1">Waiting</option>
                                <option value="2">On-Going</option>
                                <option value="3">Sold</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Bonus</strong></label>
                        <div class="col-md-12">
                            <input class="form-control input-lg abir_bonus" name="bonus" placeholder="" type="text">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>



<!-- Modal for DELETE -->
<div class="modal fade" id="DelModal" tabindex="-1" role="dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
        </div>
        <div class="modal-body">
            <strong>Are you sure, You want to  Delete ?</strong>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
            <button type="button" class="delete_product btn btn-danger" data-did="0" data-dismiss="modal">DELETE</button>
        </div>
    </div>
</div>
@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif
@endsection

@section('additional_js')
<script>
    $(document).ready(function(){

        $(document).on( "click", '.edit_button',function(e) {

            var from = $(this).data('from');
            var id = $(this).data('id');
            var to = $(this).data('to');
            var price = $(this).data('price');
            var status = $(this).data('status');
            var bonus = $(this).data('bonus');

            $(".abir_id").val(id);
            $(".abir_from").val(from);
            $(".abir_to").val(to);
            $(".abir_price").val(price);
            $(".abir_status").val(status);
            $(".abir_bonus").val(bonus);
        });


        $(document).on( "click", '.delete_button',function(e) {
            var id = $(this).data('id');
            $('.delete_product').data('did', id);
        });


        $('.delete_product').click(function(e){
            e.preventDefault();
            var pid = $(this).data('did');

            $.post(
                "{{url('/Admins/SetCalendarIco')}}",
                {
                    _token: "{{ csrf_token() }}",
                    delete: pid,
                    frm: "batch"
                },
                function(data) {

                    $("#"+pid).fadeOut("slow");
                    $(".msg").text(data);

                    swal({
                        title: data,
                        text: "",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: 'btn-primary',
                        confirmButtonText: 'Okay'
                    });
                }
            );
        });
    });

</script>
@endsection