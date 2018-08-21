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
    
       
        

			<form name="envia" action="{{ route('store_post_path' )}}" method="POST">
				
			

					{{csrf_field()}}

				<div class="col-md-4">

					<h2>Cargando..</h2>
						
					<!-- Producto -->
				
					<div class="form-group">
				
						
						
						<input type="hidden" name="Producto" class="form-control" value="{{$producto}}"/>
				
					</div>


					<!-- Precio -->
				
					<div class="form-group">
				
					
						
						<input type="hidden" name="Precio" class="form-control" value="{{$precio}}"/>
				
					</div>
					
					
					<!-- Moneda  -->
				
					<div class="form-group">
				
						
						
						<input type="hidden" name="Moneda" class="form-control" value="{{$moneda}}"/>
				
					</div>
					
					<!-- Imagen  -->
				
					<div class="form-group">
				
						
						
						<input type="hidden" name="Imagen" class="form-control" value="{{$imagen}}"/>
				
					</div>
					
						<!-- Usuario  -->
				
					<div class="form-group">
				
						
						
						<input type="hidden" name="Usuario" class="form-control" value="{{$user_id}}"/>
				
					</div>
					
					
					
					
					
					
					
					
					
					
					<script language="JavaScript">
                    document.envia.submit()
                    </script>";
					
					<div class="form-group">
							
							<button type="submit" class='btn btn-primary'>Crear registro</button>
							<a href=" {{ route('home') }} " class="btn btn-primary"> Regresar</a>
					
						</div>


		

				</div>


					
				
				

			</form>


</div>

	

@endsection