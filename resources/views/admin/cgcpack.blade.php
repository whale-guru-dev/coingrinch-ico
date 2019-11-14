@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">

    <div class="page-content">

        <h3 class="page-title uppercase bold"> View Bonus Settings</h3>

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

                                <th> Name </th>

                                <th> Price </th>

                                <th> Bonus </th>

                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div><!-- ROW -->
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
@endsection