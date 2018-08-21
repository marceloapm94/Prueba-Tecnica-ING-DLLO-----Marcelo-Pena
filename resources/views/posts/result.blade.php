@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

@if(count($errors))

<div class="alert alert-danger">
    
    <ul>
         @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        
        
    </ul>
    
    
    
</div>

@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-heading"><h3>Los datos de su transaccion:</h3></div>
                <div class="panel-body">
                            
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-md-5">
                                
                                <h5><b>transactionID:</b> {{$post->getTransactionInformationResult->transactionID}}</h5>
                                <h5><b>sessionID: </b>{{$post->getTransactionInformationResult->sessionID}}</h5>
                                <h5><b>reference: </b>{{$post->getTransactionInformationResult->reference}}</h5>
                                <h5><b>requestDate: </b>{{$post->getTransactionInformationResult->requestDate}}</h5>
                                <h5><b>bankProcessDate: </b>{{$post->getTransactionInformationResult->bankProcessDate}}</h5>
                                <h5><b>onTest: </b>{{$post->getTransactionInformationResult->onTest}}</h5>
                                <h5><b>returnCode: </b>{{$post->getTransactionInformationResult->returnCode}}</h5>
                                <h5><b>trazabilityCode: </b>{{$post->getTransactionInformationResult->trazabilityCode}}</h5>
                                <h5><b>transactionCycle: </b>{{$post->getTransactionInformationResult->transactionCycle}}</h5>
                                <h5><b>transactionState: </b>{{$post->getTransactionInformationResult->transactionState}}</h5>
                                <h5><b>responseCode: </b>{{$post->getTransactionInformationResult->responseCode}}</h5>
                                <h5><b>responseReasonCode: </b>{{$post->getTransactionInformationResult->responseReasonCode}}</h5>
                                <h5><b>responseReasonText: </b>{{$post->getTransactionInformationResult->responseReasonText}}</h5>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>



			



@endsection

