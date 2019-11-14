@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">

	<div class="page-content">

	    <h3 class="page-title uppercase bold"> <i class="fa fa-list"></i> ADD/SUBSTRACT LOGS
	        <span class=" pull-right">
				<a class="btn btn-primary" data-toggle="modal" data-target="#srsModal" href="javascript:;">
					<i class="fa fa-search"></i>  &nbsp; SEARCH BY TRANSACTION ID 
				</a>
			</span>
	    </h3>
	    <hr>
	    <div class="row">

	        <div class="col-md-12">

	            <div class="portlet box green">
	                <div class="portlet-title">
	                    <div class="caption">
	                        <i class="fa fa-list"></i>  Transactions
	                    </div>
	                    <div class="actions">
	                        Search Result For TRX # $search
	                    </div>
	                </div>

	                <div class="portlet-body">
		                <div class="table-scrollable">
		                    <table class="table table-bordered table-hover">
		                        <thead>
		                            <tr>
		                                <th> # </th>
		                                <th> USER </th>
		                                <th> AMOUNT </th>
		                                <th> TIME </th>
		                                <th> TRX # </th>
		                                <th> DETAILS </th>
		                                <th> MESSAGE </th>
		                                <th> ADMIN USERNAME </th>
		                            </tr>
		                        </thead>

		                        <tbody>
		                        </tbody>
		                    </table>

	                        <!-- print pagination -->

	                        <div class="row">
	                            <div class="text-center">
	                                <ul class="pagination">

	                                </ul>
	                            </div>
	                        </div><!-- row -->
	                        <!-- END print pagination -->
	                    </div>
	                </div>
	            </div>
	        </div><!-- ROW-->

	        <!-- modal for srs -->

	        <div class="modal fade" id="srsModal" tabindex="-1" role="dialog">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

	                    <h4 class="modal-title uppercase bold">Search By TRANSACTION ID</h4>
	                </div>

	                <form action="" method="post">
	                    <div class="modal-body">
	                        <div class="row">
	                            <div class="form-group">
	                                <div class="col-md-12">

	                                    <input type="text" class="form-control input-lg" name="trx" placeholder="TRANSACTION ID" required="">

	                                </div>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="modal-footer">
	                        <div class="row">
	                            <div class="col-md-6">
	                                <button type="button" class="btn btn-block dark btn-outline" data-dismiss="modal">Close</button>
	                            </div>
	                            <div class="col-md-6">
	                                <button type="submit" class="btn btn-block green"> <i class="fa fa-search"></i> Search</button>
	                            </div>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	        <!-- /.modal -->
	    </div>
	</div>
</div>
@endsection