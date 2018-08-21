<?php
namespace App\Http\Controllers;
use App\Http\Controllers\PaypalController;
use App\Post;
use URL;
use App\User;
use App\Imagen;
use App\Http\Requests\CreatePostRequest;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class SoapController extends BaseSoapController
{
    private $service;
    
    public function bank(Post $post, Request $request){
        try {
            
            
            
        // Si la variable bank no existe la creamos
        if (!\Cache::has('bank')) {
    
            self::setWsdl('https://test.placetopay.com/soap/pse/?wsdl');
            $this->service = InstanceSoapClient::init();
            
            $login = "6dd490faf9cb87a9862245da41170ff2";
            $seed = date('c');
            $tranKey = "024h1IlD";
            $hashString = sha1($seed.$tranKey, false);
            $auth = ["login"=>"$login","tranKey"=>"$hashString","seed"=>"$seed"];
            $bank = $this->service->getBankList(['auth' => $auth]);
            \Cache::put('bank', $bank, 1440); //guardamos el valor dentro de la cache - (nombre la variable, valor de la variable, tiempo de vida en la cache)
        }
       
        //recuperamos el valor de la variable de la cache
        $bank = \Cache::get('bank');
        
        $user = Auth::user();
        $post->metodopago = $request->get('Metodopago');
        $post->comentario = $request->get('Comentario');
        
        $post ->save();
       
        if ($post->metodopago === 'MP'){
        return view('paywithML')->with(['post'=>$post]);}
        if ($post->metodopago === 'PSE'){
        return view('paywithPSE')->with(['post'=>$post,'bank'=>$bank->getBankListResult->item]);}
        if ($post->metodopago === 'Paypal'){
        return view('paywithpaypal')->with(['post'=>$post]);}
        if ($post->metodopago === 'Efectivo o transferencia'){
        return view('paywithcash');}
            
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function banco(Post $post, Request $request){
        
        try {
            self::setWsdl('https://test.placetopay.com/soap/pse/?wsdl');
            $this->service = InstanceSoapClient::init();
            $login = "6dd490faf9cb87a9862245da41170ff2";
            $seed = date('c');
            $tranKey = "024h1IlD";
            $hashString = sha1($seed.$tranKey, false);
            $auth = ["login"=>"$login","tranKey"=>"$hashString","seed"=>"$seed"];
            $PSETransactionResponse="";
        
            $bancoselec = $request->get('Banco');
            $tipodeC = $request->get('persona');
            $user = Auth::user();
       
            $post = Post::where('id', $request->query->get('post'))->first();
            
            $bankCode = $bancoselec; 
            $bankInterface =$tipodeC;   //personas = 0, empresas = 1
            $returnURL = URL::route('return_path', ['post'=>$post->id]); //PSETransactionResponse
            $reference = $post->id;
            $description = $post->producto;
            $language = 'es';
            $currency = 'COP';
            $totalAmount = floatval($post->precio);
            $taxAmount = floatval($post->precio - $post->precio/1.19);
            $devolutionBase = floatval(0);
            $tipAmount = floatval(0);
            $payer = ["document"=>"$user->document","documentType"=>"$user->documentType","firstName"=>"$user->firstName","lastName"=>"$user->lastName","company"=>"$user->company","emailAddress"=>"$user->emailAddress","address"=>"$user->address","city"=>"$user->city","province"=>"$user->province","country"=>"$user->country","phone"=>"$user->phone","mobile"=>"$user->mobile"];
            $buyer = ["document"=>"$user->document","documentType"=>"$user->documentType","firstName"=>"$user->firstName","lastName"=>"$user->lastName","company"=>"$user->company","emailAddress"=>"$user->emailAddress","address"=>"$user->address","city"=>"$user->city","province"=>"$user->province","country"=>"$user->country","phone"=>"$user->phone","mobile"=>"$user->mobile"];
            $shipping  = ["document"=>"$user->document","documentType"=>"$user->documentType","firstName"=>"$user->firstName","lastName"=>"$user->lastName","company"=>"$user->company","emailAddress"=>"$user->emailAddress","address"=>"$user->address","city"=>"$user->city","province"=>"$user->province","country"=>"$user->country","phone"=>"$user->phone","mobile"=>"$user->mobile"];
            $ipAddress = $request->ip();
            $userAgent = $request->header('User-Agent');
            $additionalData = "";
            
            $transaction = ["bankCode"=>"$bankCode","bankInterface"=>"$bankInterface","returnURL"=>"$returnURL","reference"=>"$reference","description"=>"$description","language"=>"$language","currency"=>"$currency","totalAmount"=>"$totalAmount","taxAmount"=>"$taxAmount","devolutionBase"=>"$devolutionBase","tipAmount"=>"$tipAmount","payer"=>$payer,"buyer"=>$buyer,"shipping"=>$shipping,"ipAddress"=>"$ipAddress","userAgent"=>"$userAgent","additionalData"=>"$additionalData"];
            

            $PSETransactionResponse = $this->service->createTransaction(['auth' => $auth,'transaction'=> $transaction]);
            
            if ($PSETransactionResponse->createTransactionResult->returnCode == "SUCCESS"){
                $hora = getdate();
                $post-> transactionID = $PSETransactionResponse->createTransactionResult->transactionID;
                $post-> sessionID = $PSETransactionResponse->createTransactionResult->sessionID;
                $post-> returnCode = $PSETransactionResponse->createTransactionResult->returnCode;
                $post-> trazabilityCode = $PSETransactionResponse->createTransactionResult->trazabilityCode;
                $post-> transactionCycle = $PSETransactionResponse->createTransactionResult->transactionCycle;
                $post-> bankCurrency = $PSETransactionResponse->createTransactionResult->bankCurrency;
                $post-> bankFactor = $PSETransactionResponse->createTransactionResult->bankFactor;
                $post-> bankURL = $PSETransactionResponse->createTransactionResult->bankURL;
                $post-> responseCode = $PSETransactionResponse->createTransactionResult->responseCode;
                $post-> responseReasonCode = $PSETransactionResponse->createTransactionResult->responseReasonCode;
                $post-> responseReasonText = $PSETransactionResponse->createTransactionResult->responseReasonText;
                $post-> funciono = 'si';
                $post-> hora = $hora["minutes"];
                $post -> save();
                return redirect()->away($PSETransactionResponse->createTransactionResult->bankURL);
                
                $post -> save();
            }else{
                
                $texto = 'No se ha podido procesar la transaccion, el codigo devuelto es: '.$PSETransactionResponse->createTransactionResult->returnCode.' El motivo del fallo de la transaccion es:'.$PSETransactionResponse->createTransactionResult->responseReasonText;
            }
        }
        
        catch(\Exception $e) {
            return $e->getMessage();
        }
        
    }
    public function afterbank(Post $post, Request $request){
        try {
            self::setWsdl('https://test.placetopay.com/soap/pse/?wsdl');
            $this->service = InstanceSoapClient::init();
            $login = "6dd490faf9cb87a9862245da41170ff2";
            $seed = date('c');
            $tranKey = "024h1IlD";
            $hashString = sha1($seed.$tranKey, false);
            $auth = ["login"=>"$login","tranKey"=>"$hashString","seed"=>"$seed"];
            $PSETransactionResponse="";
            $bancoselec = $request->get('Banco');
            $user = Auth::user();
            $TransactionInformation = $this->service->getTransactionInformation(['auth' => $auth,'transactionID'=> $post->transactionID]);
            return view('posts.result')->with(['post'=>$TransactionInformation]);
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }
   
}