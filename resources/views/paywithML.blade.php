@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-default">
                <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4>Importante!</h4>
                            </div>
                            <div class="modal-body">
                                  <h5>Tenga en cuenta que luego de realizar el pago por Mercado Pago debe regresar a la WEB y registrar el pago por la pagina</h5>
                                 
                           </div>
                           <div class="modal-footer">
                                <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                           </div>
                        </div>
                    </div>
                </div>
                

                <div class="panel-heading">Pagar con Mercado Libre</div>
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
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.ML') !!}" >
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
                                    Pagar con ML
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