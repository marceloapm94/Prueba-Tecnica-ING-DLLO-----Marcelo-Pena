@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  







<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Pagar con Paypal</div>
                <div class="panel-body">
                    
                    <div class="container">
                <div class="row">
                    <div class="col-md-2">
    
                        <?php use App\Imagen; $rutaimg = Imagen::where('ID', $post->imagen)->first(); ?>
                        <br>
                        <img src="{{$rutaimg->guid}}"  style="width:100%; ">
       
                    </div>
    
                    <div class="col-md-3">
                        <h5><b>ID:</b> {{$post->id}} </h5>
                        <h5><b>Producto:</b> {{$post->producto}} </h5>
                        <h5><b>Precio:</b> {{$post->moneda}} {{$post->precio}} </h5>
                        <h5><b>Cliente:</b> {{$post->cliente}} </h5>
                    </div>
                </div>
            </div>
                    
            <div class="container">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.paypal') !!}" >
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <Input id="amount" type="hidden" class="form-control" name="amount" value="{{$post->precio}}" autofocus>
                                <Input id="ID" type="hidden" class="form-control" name="ID" value="{{$post->id}}" autofocus>
                                <Input id="Producto" type="hidden" class="form-control" name="Producto" value="{{$post->producto}}" autofocus>
                                <Input id="Cliente" type="hidden" class="form-control" name="Cliente" value="{{$post->cliente}}" autofocus>
                                    
                                    
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Pagar con Paypal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection