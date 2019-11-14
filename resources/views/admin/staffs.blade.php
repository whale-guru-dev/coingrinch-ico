@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> Manage Staffs
            <a class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#AddModal" href="javascript:;">
                <i class="fa fa-plus"></i>   ADD NEW
            </a>
        </h3>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">

                        </div>

                        <div class="tools"> </div>
                    </div>

                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
	                            <tr>
	                                <th> ID# </th>
	                                <th> Username </th>
	                                <th> Full Name </th>
	                                <th> Email </th>
	                                <th> Phone </th>
	                                <th> Role </th>
	                                <th> Action </th>
	                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- ROW-->
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
            <strong>Are you sure you want to Delete ?</strong>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            <button type="button" class="delete_product btn btn-danger" data-did="0" data-dismiss="modal">DELETE</button>
        </div>
    </div>
</div>

<!-- Modal for DEL SUCCESS -->

<div class="modal fade" id="DelDone" tabindex="-1" role="dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete!</h4>
        </div>

        <div class="modal-body">

            <b class="msg"></b>

        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>

        </div>
    </div>
</div>

<!-- Modal forADD -->

<div class="modal fade" id="AddModal" tabindex="-1" role="dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-plus'></i> ADD NEW STAFF</h4>
        </div>

        <form method="post" action="">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Username</strong></label>
                        <div class="col-md-12">

                            <input class="form-control input-lg" name="name" placeholder="Unique - Required for Login" type="text" required="">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Full Name</strong></label>
                        <div class="col-md-12">

                            <input class="form-control input-lg" name="fnm" placeholder="Full name" type="text" required="">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Email</strong></label>
                        <div class="col-md-12">

                            <input class="form-control input-lg" name="email" placeholder="Valid Email - Required for Password Reset" type="email" required="">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">mobile</strong></label>
                        <div class="col-md-12">

                            <input class="form-control input-lg" name="mobile" placeholder="Mobile Number" type="text" required="">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Password</strong></label>
                        <div class="col-md-12">

                            <input class="form-control input-lg" name="pass" placeholder="Make it strong" type="password" required="">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">Role</strong></label>
                        <div class="col-md-12">
                            <select class="form-control input-lg" name="powr">

                                <option value="0">STAFF</option>

                                <option value="100">ADMIN</option>
                               
                                <option value="200">SUPER-ADMIN</option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<!-- modal -->

<!-- Modal for PASS -->

<div class="modal fade" id="PasswordModal" tabindex="-1" role="dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-edit'></i> CHANGE PASSWORD</h4>
        </div>

        <form method="post" action="">
            <div class="modal-body">
                <input type="hidden" name="id" class="abirid">
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12"><strong style="text-transform: uppercase;">NEW Password</strong></label>
                        <div class="col-md-12">

                            <input class="form-control input-lg" name="newpass" placeholder="Make it strong" type="password" required="">

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<!-- modal -->


@endsection

@section('additional_js')
<script>
    $(document).ready(function(){

        $(document).on( "click", '.delete_button',function(e) {

            var id = $(this).data('id');

            $('.delete_product').data('did', id);

        });

        $(document).on( "click", '.pass_button',function(e) {

            var id = $(this).data('id');

            $(".abirid").val(id);

        });

        $('.delete_product').click(function(e){

            e.preventDefault();

            var pid = $(this).data('did');

            $.post(

                "delete.php",

                {

                    delete: pid,

                    frm: "admin"

                },

                function(data) {

                    $("#"+pid).fadeOut("slow");

                    $(".msg").text(data);

                    $("#DelDone").modal('show');

                }

            );

        });

    });
</script>
@endsection