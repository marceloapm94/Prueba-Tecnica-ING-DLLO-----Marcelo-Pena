@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-default">
                
                <div class="panel-heading">Pagar con PSE</div>
                <div class="panel-body">
                    
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
    
                        <?php use App\Imagen; $rutaimg = Imagen::where('ID', $post->imagen)->first(); 
                            use App\User;
                            $usuario = Auth::user();
                         ?>
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
                
                    <div class="col-md-3 ">
                    
                    <div class="container">
                        <h3> Datos del Comprador</h3>
                        <br>
                        <div class="col-md-4 ">
                            <h4>Documento: {{$usuario->document}} </h4>
                            <h4>Tipo de documento: {{$usuario->documentType}} </h4>
                            <h4>Nombre: {{$usuario->firstName}} </h4>
                            <h4>Apellido: {{$usuario->lastName}} </h4>
                            <h4>Compania: {{$usuario->company}} </h4>
                            <h4>Email: {{$usuario->emailAddress}} </h4>
                        </div>
                        <div class="col-md-6 ">
                            <h4>Direccion: {{$usuario->address}} </h4>
                            <h4>Ciudad: {{$usuario->city}} </h4>
                            <h4>Provincia: {{$usuario->province}} </h4>
                            <h4>Pais: {{$usuario->country}} </h4>
                            <h4>Telefono fijo: {{$usuario->phone}} </h4>
                            <h4>Celular: {{$usuario->mobile}} </h4>
                        </div>
                    </div>
                
            </div>
            
           </div>
                <br>
                <br>
                <br>
                
                
                <form action="{{ route('banco', ['post'=>$post->id]) }}" method="POST">
				
			

					{{csrf_field()}}
					{{method_field('PUT')}}

				<div class="col-md-6">
				     

			    	<!-- Metodo de pago -->
				<div class="container">
                    <div class="col-md-3 col-md-offset-2">
    					<div class="form-group">
    				
    						<label for="metodopago">Seleccione el banco con el que desea pagar:</label>
    						
    						<?php
    						

                                    $html="";
                                    $html.="<select name='Banco'>";
                            
                                    foreach ($bank as $valor)
                                    {
                                        $html.='<option value="'.$valor->bankCode.'">'.$valor->bankName.'</option>';
                                    }
                                   
                                    $html.="</select>";
                            
                                    echo $html."\n\n";
                                  
                                
                            ?>
                            <label for="persona">Seleccione el tipo de cuenta con la que realizara el pago:</label>
                            
                            <select name="persona" value="" class="form-control">
                               <option value="0">Persona</option> 
                               <option value="1">Empresa</option> 
                            </select>
                        </div>
                    </div>
                </div>
                    
                    
                    
                <div class="container">
                    <div class="col-md-3 col-md-offset-2">
                        <div class="form-group">
							
							<button type="submit" class='btn btn-primary'>Continuar</button>
							<!-- Cliente 	<a href=" {{ route('home') }} " class="btn btn-primary"> Regresar</a> -->
							
						</div>
					</div>
                </div>
					
			
					
						
				
				</div>

				

            </form>
            
            
           
                    
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
                        
                        
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection