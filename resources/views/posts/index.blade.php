@extends('layouts.app')

@section('content')

	<div class="container">	
	
	


    @foreach($posts as $post)
    
        @if ( ($post->user_id == Auth::id()) || Auth::user()->role == 'admin' )


			<div class="row">
				<div class="col-md-12">
			    
					<h2><a href="{{ route('post_path', ['post' => $post->id]) }}">Identificador de compra: {{$post->id}}</a></h2>
					
					<p>Producto: {{$post->producto}} </p>
                    <p>Precio: {{$post->moneda}} {{$post->precio}} </p>
                    <p>Cliente: {{$post->cliente}}  </p>
                    <p>Correo: {{$post->correo}} </p>
                    <p>Metodo de pago: {{$post->metodopago}}  </p>
   				    <p>Comentario: {{$post->comentario}}  </p>

				</div>
				
			</div>
			<hr>
			
	    @endif
			
	@endforeach
	

			

	{{$posts->render()}}



</div>


		

@endsection