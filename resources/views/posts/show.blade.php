@extends('layouts.app')

@section('content')

	<div class="container">	


            <div class="container">
                <div class="row">
                    <div class="col-md-3">
    
                        <?php use App\Imagen; $rutaimg = Imagen::where('ID', $post->imagen)->first(); ?>
                        <br>
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
			
		
			

	



</div>


		

@endsection