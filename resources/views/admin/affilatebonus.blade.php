@extends('layouts.admin')

@section('content')
<?php $i=1; ?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title  uppercase bold"> Affilate Bonus Management</h3>
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
                                <i class="fa fa-edit"></i> ADD NEW LEVEL DEPTH
                            </button> 
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
	                            <tr>
	                                <th> # </th>
	                                <th> LEVEL </th>
                                    <th> BONUS PERCENTAGE </th>
                                    <th> ACTION </th>
	                            </tr>
                            </thead>
                            <tbody>
                                @foreach($daffilatebonus as $affilatebonus)
                                    <tr id="{{$affilatebonus->id}}">
                                        <th> {{$i++}} </th>
										<th> {{$affilatebonus->level}} </th>
										<th> {{$affilatebonus->percentage}} %</th>
                                        <th> 
                                            <button type="button" class="btn purple btn-sm edit_button" 
                                                data-toggle="modal" data-target="#editModal"
                                                data-act="Edit"
                                                data-level="{{$affilatebonus->level}}"
                                                data-bonus="{{$affilatebonus->percentage}}"
                                                data-id="{{$affilatebonus->id}}">
                                                <i class="fa fa-edit"></i> EDIT
                                            </button> 


                                            <button type="button" class="btn btn-danger btn-sm delete_button" 
                                            data-toggle="modal" data-target="#DelModal"
                                            data-id="{{$affilatebonus->id}}">
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
            <h4 class="modal-title" id="myModalLabel"> <b class="abir_act"></b> Affilate Bonus Management</h4>
        </div>
        <form method="post" action="{{url('/Admins/AffilateBonus')}}">
            {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="type" value="add">
                

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">LEVEL</strong></label>
                        <div class="col-md-12">
                            <input class="form-control input-lg abir_from" name="level" placeholder="0" type="text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Bonus Percentage</strong></label>
                        <div class="col-md-12">
                            <input class="form-control input-lg abir_bonus" name="bonus" placeholder="0" type="text">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Bous Level</button>
            </div>
        </form>
    </div>
</div>


<!-- Modal for Edit button -->
<div class="modal container fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> <b class="abir_act"></b> Affilate Bonus Management</h4>
        </div>
        <form method="post" action="{{url('/Admins/AffilateBonus')}}">
            {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="type" value="edit">
                <input class="form-control abir_id" type="hidden" name="id">

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">LEVEL</strong></label>
                        <div class="col-md-12">
                            <input class="form-control input-lg abir_level" name="level" placeholder="" type="text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Bonus Percentage</strong></label>
                        <div class="col-md-12">
                            <input class="form-control input-lg abir_bonus" name="bonus" placeholder="0" type="text">
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

            var level = $(this).data('level');
            var id = $(this).data('id');
            var bonus = $(this).data('bonus');

            $(".abir_id").val(id);
            $(".abir_level").val(level);
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
                "{{url('/Admins/AffilateBonus')}}",
                {
                    _token: "{{ csrf_token() }}",
                    delete: pid,
                    frm: "affilatebonus"
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