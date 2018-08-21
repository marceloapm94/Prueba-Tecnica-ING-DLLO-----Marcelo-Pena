<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PaypalController;
use App\Post;
use App\User;
use App\Imagen;
use App\Http\Requests\CreatePostRequest;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    
    {
        
       $posts = Post::orderBy('id', 'desc')->paginate(10);
       return view('posts.index')-> with(['posts'=>$posts]) ; 
    }
    
    public function show( Post $post)

    {
        
        return view('posts.show')-> with(['post'=>$post]) ; 
    }
    
    public function create($producto, $precio, $moneda, $imagen)
    
    {
        $user_id = \Auth::id();
        return view('posts.create')-> with(['producto'=>$producto, 'precio'=>$precio, 'moneda'=>$moneda, 'imagen'=>$imagen, 'user_id'=>$user_id]);
    }
    public function store(CreatePostRequest $request)

    {
        $user = Auth::user();
        
        $post = new Post;
        $post-> cliente = $user->user_nicename;
        $post-> correo = $user->user_email;
        $post-> producto = $request->get('Producto');
        $post-> precio = $request->get('Precio');
        $post-> moneda = $request->get('Moneda');
        $post-> imagen = $request->get('Imagen');
        $post-> user_id = $request->get('Usuario');
        $post-> transactionID = 0;
        $post-> sessionID = 'aun no';
        $post-> returnCode = 'aun no';
        $post-> trazabilityCode = 'aun no';
        $post-> transactionCycle = 0;
        $post-> bankCurrency = 'aun';
        $post-> bankFactor = 0;
        $post-> bankURL = 'aun no';
        $post-> responseCode = 0;
        $post-> responseReasonCode = 'aun';
        $post-> responseReasonText = 'aun no';
        $post-> funciono ='no';
        $post ->save();
        
        return view('posts.edit')->with(['post'=>$post]);
   
	}
	
	 public function edit(Post $post)
    {
        
        return view('posts.edit')->with(['post'=>$post]);
   
	}
	


}
