@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> <i class="fa fa-money"></i> Invested Currencies</h3>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">

                            <i class="fa fa-list"></i>  Invested

                        </div>

                        <div class="actions">

                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> Coin </th>

                                    <th> Payed </th>
                                </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- ROW-->
    </div>
</div>

@endsection