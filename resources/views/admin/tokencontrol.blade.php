@extends('layouts.admin')

@section('additional_css')
<style type="text/css">
    .glyphicon-refresh-animate {
        -animation: spin .7s infinite linear;
        -webkit-animation: spin2 .7s infinite linear;
    }

    @-webkit-keyframes spin2 {
        from { -webkit-transform: rotate(0deg);}
        to { -webkit-transform: rotate(360deg);}
    }

    @keyframes spin {
        from { transform: scale(1) rotate(0deg);}
        to { transform: scale(1) rotate(360deg);}
    }
</style>
@endsection

@section('content')

<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> <i class="fa fa-gg-circle"></i> Token Control</h3>
        <hr>

        <div class="row">
            <div class="col-md-12">

                <div class="portlet box green">

                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-gg-circle"></i>  Token Control
                        </div>
                    </div>

                    <div class="portlet-body">
                        <button class="btn btn-sm btn-warning" id="loading-spiner"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button>
                        <div class="alert" role="alert" id="alert">
                          <strong id="status"></strong> <span id="trxText"></span>
                        </div>
                        <div class="row" style="text-align: center;display: none;" id="tokenInfo"><h1> Token Information</h1>
                            <h4 class="com-md-6">Token Name : <span id="tokenName"></span></h4>
                            <h4 class="com-md-6">Token Symbol : <span id="tokenSymbol"></span></h4>
                            <h4 class="com-md-6">Token Total Supply : <span id="tokenTotalSupply"></span></h4>
                            <h4 class="com-md-6">Token Decimals : <span id="tokenDecimals"></span></h4>
                        </div>
						<hr>
                        <div class="row" style="text-align: center">
                            <h1>Token Mint For Users</h1>
                            <div class="col-md-9">
                                @if(count($duser)==0)
                                    <h1 class='text-center'> NO RESULT FOUND !</h1>
                                @endif
                                <!-- <div class="table-scrollable"> -->
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> NAME </th>
                                                <th> EMAIL </th>
                                                <th> Ether Wallet Address </th>
                                                <th> Virtual Token </th>
                                                <th> Real Token </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            @foreach($duser as $user)
                                                <tr>
                                                    <th>{{$i++}}</th>
                                                    <th>{{$user->uname}}</th>
                                                    <th>{{$user->email}}</th>
                                                    <th>{{$user->ether_addr}}</th>
                                                    <th>{{$user->acgc}}</th>
                                                    <th>{{$user->GRT}}</th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                <!-- </div> -->

                                <!-- print pagination -->
                                <div class="row">
                                    <div class="text-center">
                                         {{$duser->render()}}
                                    </div>
                                </div><!-- row -->
                                <!-- END print pagination -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <!-- <label for="userNum">User Number to send at a once</label> -->
                                    <!-- <input type="text" name="userNum" id="userNum" class="form-control col-md-6"> -->
                                    <!-- <br><br><br> -->
                                    <input type="button" name="tokenMint-btn" id="tokenMint-btn" class="form-control btn btn-primary" value="Start Mint">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row" style="text-align: center;">
                            <div class="col-md-6">
                                <h1>Token Mint For Other Reward, Bonus, Dev Team</h1>
                                <div class="form-group">
                                    <label>Holder Ether Wallet Address</label>
                                    <input type="text" name="eth-addr" id="eth-addr" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Holder Ether Amount</label>
                                    <input type="text" name="eth-amount" id="eth-amount" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Details</label>
                                    <input type="text" name="eth-details" id="eth-details" class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="button" name="token-mint-other-btn" id="token-mint-other-btn" value="Token Mint" class="form-control btn btn-primary">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h1>User Account Freeze</h1>
                                <div class="form-group">
                                    <label>User Ether Wallet Address</label>
                                    <input type="text" name="eth-addr-freeze" id="eth-addr-freeze" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Freeze/UnFreeze</label>
                                    <input data-toggle="toggle" checked data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" name="freeze" id="freeze">
                                </div>
                                <div class="form-group">
                                    <input type="button" name="acc-freeze-btn" id="acc-freeze-btn" value="Freeze/UnFreeze Account" class="form-control btn btn-primary">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="text-align: center;">
                            <div class="col-md-6">
                                <h1>Allow Token Transfer Between Users</h1>
                                <br>
                                <div class="form-group">
                                    <label>Allow</label>
                                    <input data-toggle="toggle" checked data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" name="allow-fransfer" id="allow-fransfer">
                                </div>
                                <div class="form-group">
                                    <input type="button" name="allow-trans-btn" id="allow-trans-btn" value="Allow Transfer" class="form-control btn btn-primary">
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <h1>Finish Token Mint</h1>
                                <p style="color: red;">If you finish token mint then you can't mint token anymore </p>
                                <div class="form-group">
                                    <label>Finish Token Mint</label>
                                    <input data-toggle="toggle" checked data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" name="finish-mint" id="finish-mint">
                                </div>
                                <div class="form-group">
                                    <input type="button" name="finish-mint-btn" id="finish-mint-btn" value="Finish Token Mint" class="form-control btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- ROW-->
    </div>
</div>
@endsection

@section('additional_vendor_js')
    <script src="{{asset('admin/assets/web3_vendor/web3/dist/web3.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('admin/assets/js/Grinch.js')}}"></script>
@endsection

@section('additional_js')
<script type="text/javascript">
$(document).ready(function(){

    var buttonClick = '';

    $('#loading-spiner').show();
    $('#tokenInfo').hide();
    var success=web3.personal.unlockAccount(web3.eth.accounts[0], 'grinchtoken');
    if(success){
        
        Grinch.totalSupply.call(function (err, totalSupply) {
            // 2. get the number of decimal places used to represent this token
            Grinch.decimals.call(function (err, decimals) {
                // 3. get the name of the token
                Grinch.name.call(function (err, name){
                    Grinch.symbol.call(function (err, symbol) {
                        // 3. get the balance of the account holder
                        $('#loading-spiner').hide();
                        $('#tokenInfo').show();

                        $('#tokenName').html(name);
                        $('#tokenSymbol').html(symbol);
                        $('#tokenTotalSupply').html(totalSupply.c[0]/1000 );
                        $('#tokenDecimals').html(decimals.c[0]);
                    });
                });
            });
        });
    }


    $('#tokenMint-btn').click(function(){
        buttonClick = 'tokenMint-btn';
        $('#loading-spiner').show();

        $.ajax({
            url: '{{url('/Admins/TokenControl/MintUserToken')}}',
            type: 'POST',
            data: {
                '_token' : '{{csrf_token()}}',
                'operation' : 'mint-token-to-users'
            },
            dataType: 'html',
            success: function (data) {
                data= jQuery.parseJSON(data);
                var addr = data.addr;
                var amount = data.amount;

                var success=web3.personal.unlockAccount(web3.eth.accounts[0], 'grinchtoken');
                if(success){
                    Grinch.mint(addr,amount,(err, res) => {
                        if (res){
                            $("#loading-spiner").show();
                            console.log("Transaction Hash : " + res);
                        }
                        if(err){
                            $("#loading-spiner").hide();
                            console.log("error : " + err);
                        }
                    });

                }
            },
            error: function () {
                $('#loading-spiner').hide();
                $('#alert').addClass('alert alert-warning');
                $('#status').html('error');
                $('#trxText').html('Something went wrong!');

            }
        });

        
    });


    var mintTokenEvent = Grinch.Mint({},"latest");
    mintTokenEvent.watch(function(err, result){
        console.log(result);
        if (!err) {
            Grinch.totalSupply.call(function (err, totalSupply) {
                $('#tokenTotalSupply').html(totalSupply.c[0]/1000);
            });

            if(buttonClick == 'token-mint-other-btn'){
                $.ajax({
                    url: '{{url('/Admins/TokenControl/MintToken')}}',
                    type: 'POST',
                    data: {
                        '_token' : '{{csrf_token()}}',
                        'trxHash': result.transactionHash,
                        'to' : result.args.to,
                        'amount': result.args.amount.c[0],
                        'operation' : 'mint-token-to-admin-dev-loyalty'
                    },
                    dataType: 'html',
                    success: function (data) {
                        data= jQuery.parseJSON(data);
                        if(data.status == "ok"){
                            $("#loading-spiner").hide();
                            $("#alert").show();
                            $('#alert').addClass('alert alert-success');
                            $('#status').html('success');
                            $('#trxText').html(data.message);
                        }
                    },
                    error: function () {
                        $('#alert').addClass('alert alert-warning');
                        $('#status').html('error');
                        $('#trxText').html('Something went wrong during mint to admin!');

                    }
                });
            }else if(buttonClick == 'tokenMint-btn'){
                $.ajax({
                    url: '{{url('/Admins/TokenControl/MintToken')}}',
                    type: 'POST',
                    data: {
                        '_token' : '{{csrf_token()}}',
                        'trxHash': result.transactionHash,
                        'to' : result.args.to,
                        'amount': result.args.amount.c[0],
                        'operation' : 'mint-token-to-users'
                    },
                    dataType: 'html',
                    success: function (data) {
                        data= jQuery.parseJSON(data);
                        if(data.status == "ok"){
                            $("#loading-spiner").hide();
                            $("#alert").show();
                            $('#alert').addClass('alert alert-success');
                            $('#status').html('success');
                            $('#trxText').html(data.message);

                            var addr = data.addr;
                            var amount = data.amount;

                            var success=web3.personal.unlockAccount(web3.eth.accounts[0], 'grinchtoken');
                            if(success){
                                Grinch.mint(addr,amount,(err, res) => {
                                    if (res){
                                        $("#loading-spiner").show();
                                        console.log("Transaction Hash : " + res);
                                    }
                                    if(err){
                                        $("#loading-spiner").hide();
                                        console.log("error : " + err);
                                    }
                                });
                            }
                        }else if(data.status == "finish"){
                            $("#loading-spiner").hide();
                            $("#alert").show();
                            $('#alert').addClass('alert alert-success');
                            $('#status').html('success');
                            $('#trxText').html(data.message);

                            setTimeout(function() { location.reload(); }, 3000);
                            
                        }

                        
                    },
                    error: function () {
                        $('#alert').addClass('alert alert-warning');
                        $('#status').html('error');
                        $('#trxText').html('Something went wrong to user!');

                    }
                });
            }

            

        } else {
            $("#loading-spiner").hide();
            $("#alert").show();
            $('#alert').addClass('alert alert-warning');
            $('#status').html('error');
            $('#trxText').html(err);
        }

    });

    $("#token-mint-other-btn").click(function(){
        buttonClick = 'token-mint-other-btn';
        $("#alert").hide();
        var success=web3.personal.unlockAccount(web3.eth.accounts[0], 'grinchtoken');

        var addr = $("#eth-addr").val();
        var amount = $("#eth-amount").val()*1000;
        var eth_details = $("#eth-details").val();
        if(addr){
            if(success){
                Grinch.mint(addr,amount,(err, res) => {
                    if (res){
                        $("#loading-spiner").show();
                        console.log("Transaction Hash : " + res);
                    }
                    if(err){
                        $("#loading-spiner").hide();
                        $("#alert").show();
                        $("#alert").addClass('alert alert-warning');
                        $("#status").html('error');
                        $("#trxText").html(err + ' :  During Mint Token For Bonus, Dev Team,etc!');
                    }
                });

            }
        }else{
            alert('invalid address');
        }

        // web3.personal.lockAccount(web3.eth.accounts[0]);
    });





    $('#acc-freeze-btn').click(function(){
        $('#alert').hide();
        var success=web3.personal.unlockAccount(web3.eth.accounts[0], 'grinchtoken');
        var freeze_addr = $("#eth-addr-freeze").val();
        if(isAddress(freeze_addr)){
            if($('#freeze').is(':checked')){

                $('#loading-spiner').show();
                Grinch.freezeAccount(freeze_addr,true,(err,res)=>{
                    if(err){
                        $("#loading-spiner").hide();
                        $('#alert').show();
                        $('#alert').addClass('alert alert-warning');
                        $('#status').html('error');
                        $('#trxText').html(err + ' : During Freeze Account');
                    }else{
                        $("#loading-spiner").show();
                        $('#alert').hide();
                    }
                });
            }else{

                $('#loading-spiner').show();
                Grinch.freezeAccount(freeze_addr,false,(err,res)=>{

                });
            }

        }else{

            alert('invalid address');
        // web3.personal.lockAccount(web3.eth.accounts[0]);
        }

    });


    var freezeAccountEvent = Grinch.FrozenFunds({},"latest");
    freezeAccountEvent.watch(function(err, result){

        if (!err) {

            $.ajax({
                url: '{{url('/Admins/TokenControl/FreezeAccount')}}',
                type: 'POST',
                data: {
                    '_token' : '{{csrf_token()}}',
                    'trxHash': result.transactionHash,
                    'freeze_addr' : result.args.target,
                    'freeze_status' : result.args.frozen,
                    'operation' : 'freeze-account'
                },
                dataType: 'html',
                success: function (data) {
                    data= jQuery.parseJSON(data);
                    if(data.status == "ok"){
                        $("#loading-spiner").hide();
                        $('#alert').show();
                        $('#alert').addClass('alert alert-success');
                        $('#status').html('success');
                        $('#trxText').html(data.message);
                    }
                },
                error: function () {
                    $("#loading-spiner").hide();
                    $('#alert').show();
                    $('#alert').addClass('alert alert-warning');
                    $('#status').html('error');
                    $('#trxText').html('Something went wrong during Freeze Account!');
                }
            });

        } else {
            $("#loading-spiner").hide();
            $('#alert').show();
            $('#alert').addClass('alert alert-warning');
            $('#status').html('error');
            $('#trxText').html(err + ' : During Allow Transfer');
        }

    });


    $('#allow-trans-btn').click(function(){
        $('#alert').hide();
        var success=web3.personal.unlockAccount(web3.eth.accounts[0], 'grinchtoken');
        if($('#allow-fransfer').is(':checked')){
            $('#loading-spiner').show();
            Grinch.transferAllow((err,res)=>{
                if(err){
                    $("#loading-spiner").hide();
                    $('#alert').show();
                    $('#alert').addClass('alert alert-warning');
                    $('#status').html('error');
                    $('#trxText').html(err + ' : During Allow Transfer');
                }else{
                    $("#loading-spiner").show();
                    $('#alert').hide();
                }
            });
        }

    });

    var allowTransferEvent = Grinch.TransferAllow({},"latest");
    allowTransferEvent.watch(function (err, result) {
        console.log(result);
        if (!err) {

            $.ajax({
                url: '{{url('/Admins/TokenControl/AllowTransfer')}}',
                type: 'POST',
                data: {
                    '_token' : '{{csrf_token()}}',
                    'trxHash': result.transactionHash,
                    'operation' : 'allow-transfer'
                },
                dataType: 'html',
                success: function (data) {
                    data= jQuery.parseJSON(data);
                    if(data.status == "ok"){
                        $("#loading-spiner").hide();
                        $('#alert').show();
                        $('#alert').addClass('alert alert-success');
                        $('#status').html('success');
                        $('#trxText').html(data.message);
                    }
                },
                error: function () {
                    $("#loading-spiner").hide();
                    $('#alert').show();
                    $('#alert').addClass('alert alert-warning');
                    $('#status').html('error');
                    $('#trxText').html('Something went wrong during allow Transfer!');

                }
            });

        } else {
            $("#loading-spiner").hide();
            $('#alert').show();
            $('#alert').addClass('alert-warning');
            $('#status').html('error');
            $('#trxText').html(err + ' : During Allow Transfer');
        }
    });



    $('#finish-mint-btn').click(function(){
        $('#alert').hide();
        var success=web3.personal.unlockAccount(web3.eth.accounts[0], 'grinchtoken');
        if($('#finish-mint').is(':checked')){
            $('#loading-spiner').show();
            Grinch.finishMinting((err,res)=>{
                if(err){
                    $("#loading-spiner").hide();
                    $('#alert').show();
                    $('#alert').addClass('alert alert-warning');
                    $('#status').html('error');
                    $('#trxText').html(err + ' : During Finsh Mint');
                }else{
                    $("#loading-spiner").show();
                    $('#alert').hide();
                }
            });
        }

    });

    var mintFinishedEvent = Grinch.MintFinished({},'latest');
    mintFinishedEvent.watch(function (err, result) {

        if (!err) {

            $.ajax({
                url: '{{url('/Admins/TokenControl/MintFinish')}}',
                type: 'POST',
                data: {
                    '_token' : '{{csrf_token()}}',
                    'trxHash': result.transactionHash,
                    'operation' : 'mint-finish'
                },
                dataType: 'html',
                success: function (data) {
                    data= jQuery.parseJSON(data);
                    if(data.status == "ok"){
                        $("#loading-spiner").hide();
                        $('#alert').show();
                        $('#alert').addClass('alert alert-success');
                        $('#status').html('success');
                        $('#trxText').html(data.message);
                    }
                },
                error: function () {
                    $("#loading-spiner").hide();
                    $('#alert').show();
                    $('#alert').addClass('alert alert-warning');
                    $('#status').html('error');
                    $('#trxText').html("Something went wrong!");
                    alert("Something went wrong during Mint Finish!");
                }
            });

        } else {
            $("#loading-spiner").hide();
            $('#alert').show();
            $('#alert').addClass('alert alert-warning');
            $('#status').html('error');
            $('#trxText').html(err + ': During Finish Mint Token');
        }
    });
});

var isAddress = function (address) {
    if (!/^(0x)?[0-9a-f]{40}$/i.test(address)) {
        // check if it has the basic requirements of an address
        return false;
    } else if (/^(0x)?[0-9a-f]{40}$/.test(address) || /^(0x)?[0-9A-F]{40}$/.test(address)) {
        // If it's all small caps or all all caps, return true
        return true;
    } else {
        // Otherwise check each case
        return isChecksumAddress(address);
    }
};


var isChecksumAddress = function (address) {
    // Check each case
    address = address.replace('0x','');
    var addressHash = web3.sha3(address.toLowerCase());
    for (var i = 0; i < 40; i++ ) {
        // the nth letter should be uppercase if the nth digit of casemap is 1
        if ((parseInt(addressHash[i], 16) > 7 && address[i].toUpperCase() !== address[i]) || (parseInt(addressHash[i], 16) <= 7 && address[i].toLowerCase() !== address[i])) {
            return false;
        }
    }
    return true;
};
</script>

@endsection