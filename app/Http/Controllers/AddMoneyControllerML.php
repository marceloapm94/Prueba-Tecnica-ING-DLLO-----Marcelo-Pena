<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use App\Post;
use App\User;
use App\Imagen;
use Session;
use Redirect;
use Input;
use MP;

/** All Paypal Details class **/


use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
class AddMoneyControllerML extends HomeController
{
    
        
    private $_api_context;
    
    public function payWithPaypal()
    {
        return view('paywithML');
    }
  
  
    public function postPaymentWithML(Request $request)
    {
        
        $mp = new MP (env('MP_CLIENT_ID'), env('MP_CLIENT_SECRET'));
       // $mp->sandbox_mode(FALSE);
        $current_user = auth()->user();
        //dd($current_user);

    $preferenceData = [
        
        'external_reference' => $request->get('ID'),
              
        'payer'              => [
            'name' => $current_user->user_login,
            'email' => $current_user->user_email,

        ],
        'back_urls'          => [
            
        
        ],
        'notification_url'   => env('MP_NOTIFICATION_URL')
    ];

    // add items
   
        $preferenceData['items'][] = [
            'id'          => $request->get('ID'),
            'title'       => $request->get('Producto'),            
            'quantity'    => 1,
            'currency_id' => 'VEF',
            'unit_price'  => intval($request->get('amount')),
                ];
    

    $preference = $mp->create_preference($preferenceData);
    
    //dd($preference);

    // return init point to be redirected
    $url = $preference['response']['init_point'];
    return Redirect::to($url);
}
    
    
    
    public function getPaymentStatus(Request $request)
    {
        
       // $mp = new MP (env('MP_CLIENT_ID'), env('MP_CLIENT_SECRET'));
        //$mp->sandbox_mode(TRUE);
       // $payment_info = $mp->get_payment_info($_GET["id"]);
        
      //  if ($payment_info["status"] == 200) {
	  //  print_r($payment_info["response"]);
//}

return response('OK', 201);
//return new HttpStatusCodeResult(200);
//echo json_encode(array());


   
        
 }
}