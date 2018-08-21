@extends('layouts.app')

@section('content')

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
    <div class="col-md-3">
    
        <?php use App\Imagen; $rutaimg = Imagen::where('ID', $post->imagen)->first(); ?>
        
        <br>
        
        <?php 
            use App\User;
            $usuario = Auth::user();
         ?>
        
        <img src="{{$rutaimg->guid}}"  width="200" height="200">
       
    </div>
    
    <div class="col-md-9">
        <h3>ID: {{$post->id}} </h3>
        <h3>Producto: {{$post->producto}} </h3>
        <h3>Precio: {{$post->moneda}} {{$post->precio}} </h3>
        <h3>Cliente: {{$post->cliente}} </h3>
       
        
        
        
        
    </div>
</div>
</div>
<hr>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3> Datos del Comprador</h3>
            <br>
            <h4>Documento: {{$usuario->document}} </h4>
            <h4>Tipo de documento: {{$usuario->documentType}} </h4>
            <h4>Nombre: {{$usuario->moneda}} {{$post->firstName}} </h4>
            <h4>Apellido: {{$usuario->lastName}} </h4>
            <h4>Compañia: {{$usuario->company}} </h4>
            <h4>Email: {{$usuario->emailAddress}} </h4>
            <h4>Direccion: {{$usuario->address}} </h4>
            <h4>Ciudad: {{$usuario->city}} </h4>
            <h4>Provincia: {{$usuario->province}} </h4>
            <h4>Pais: {{$usuario->country}} </h4>
            <h4>Telefono fijo: {{$usuario->phone}} </h4>
            <h4>Celular: {{$usuario->mobile}} </h4>
        </div>
        
        <div class="col-md-4">
            <h3> Datos quien realiza el pago:</h3>
            <br>
            <h4>Documento: {{$usuario->document}} </h4>
            <h4>Tipo de documento: {{$usuario->documentType}} </h4>
            <h4>Nombre: {{$usuario->moneda}} {{$post->firstName}} </h4>
            <h4>Apellido: {{$usuario->lastName}} </h4>
            <h4>Compañia: {{$usuario->company}} </h4>
            <h4>Email: {{$usuario->emailAddress}} </h4>
            <h4>Direccion: {{$usuario->address}} </h4>
            <h4>Ciudad: {{$usuario->city}} </h4>
            <h4>Provincia: {{$usuario->province}} </h4>
            <h4>Pais: {{$usuario->country}} </h4>
            <h4>Telefono fijo: {{$usuario->phone}} </h4>
            <h4>Celular: {{$usuario->mobile}} </h4>
        </div>
        
        <div class="col-md-4">
            <h3> Datos quien recibe el envio</h3>
            <br>
            <h4>Documento: {{$usuario->document}} </h4>
            <h4>Tipo de documento: {{$usuario->documentType}} </h4>
            <h4>Nombre: {{$usuario->moneda}} {{$post->firstName}} </h4>
            <h4>Apellido: {{$usuario->lastName}} </h4>
            <h4>Compañia: {{$usuario->company}} </h4>
            <h4>Email: {{$usuario->emailAddress}} </h4>
            <h4>Direccion: {{$usuario->address}} </h4>
            <h4>Ciudad: {{$usuario->city}} </h4>
            <h4>Provincia: {{$usuario->province}} </h4>
            <h4>Pais: {{$usuario->country}} </h4>
            <h4>Telefono fijo: {{$usuario->phone}} </h4>
            <h4>Celular: {{$usuario->mobile}} </h4>
        </div>
    </div>
</div>
<br>
<hr>
<div class="container">
   
       
       
        

			<form action="{{ route('update_post_path', ['post'=>$post->id]) }}" method="POST">
				
			

					{{csrf_field()}}
					{{method_field('PUT')}}

				<div class="col-md-6">
				     

			    	<!-- Metodo de pago -->
				
					<div class="form-group">
				
						<label for="metodopago">Metodo de pago:</label>
						
						@if($post->moneda == "$")
						
						<select name="Metodopago" value="" class="form-control">
                               <option value="Efectivo o transferencia">Efectivo o transferencia</option> 
                               <option value="MP">Mercado Pago</option> 
                               <option value="Paypal">Paypal</option>
                               <option value="PSE">PSE</option>
                        </select>
                        @else
                        <select name="Metodopago" value="" class="form-control">
                               <option value="Efectivo o transferencia">Efectivo o transferencia</option> 
                               <option value="Paypal">Paypal</option> 
                        </select>
                        
                        
                        @endif
                        
                    </div>
                    
                    	<!-- Comentario -->
				
                        
                    <div class="form-group">
				
						<label for="comentario">Comentario:</label>
						
						<input type="text" name="Comentario" class="form-control" value="{{ old('Comentario') }}"/>
						
					</div>
					<div class="form-group">
							
							<button type="submit" class='btn btn-primary'>Continuar</button>
							<!-- Cliente 	<a href=" {{ route('home') }} " class="btn btn-primary"> Regresar</a> -->
							
							
							
					
					</div>
					
			
					
						
				
				</div>

				

            </form>
		

</div>


					
				
				

			



@endsection