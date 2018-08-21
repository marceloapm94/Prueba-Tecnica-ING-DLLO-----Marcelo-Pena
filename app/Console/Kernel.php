<?php

namespace App\Console;
use App\Http\Controllers\PaypalController;
use URL;
use App\Http\Requests\CreatePostRequest;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SoapClient;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Post;
use App\User;
use App\Imagen;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            
            $url = 'https://test.placetopay.com/soap/pse/?wsdl';
            $options = ["http" => ["user_agent" => 'PHPSoapClient']];
            $soapClientOptions = [
            "stream_context" => $options,
            "cache_wsdl"     => WSDL_CACHE_NONE
                                 ];
        
        $conectionSoap = new SoapClient($url, $soapClientOptions);
          
        $login = "6dd490faf9cb87a9862245da41170ff2";
        $seed = date('c');
        $tranKey = "024h1IlD";
        $hashString = sha1($seed.$tranKey, false);
        $auth = ["login"=>"$login","tranKey"=>"$hashString","seed"=>"$seed"];
        //$bank = $conectionSoap->getBankList(["auth" => $auth]);
        
        $post = Post::where('funciono', 'si')->first(); 
        

        
       
        $horaa = getdate();        
                if($post->funciono == "si") {
                    $TransactionInformation = $conectionSoap->getTransactionInformation(['auth' => $auth,'transactionID'=> $post->transactionID]);
                    
                    if($TransactionInformation->getTransactionInformationResult->transactionState == 'OK'){
                        //var_dump($TransactionInformation->getTransactionInformationResult->transactionState);
                        $post->funciono = 'terminado';
                        $post -> save();
                    }
                        if ($horaa["minutes"] < $post->hora+6){
                            $var2 = (string) $horaa["minutes"];
                            $var3 = (string) $post->hora+6;
                                var_dump("aun no se han cumplido los minutos".$var2.' '.$var3);
                        }else{
                                $TransactionInformation = $conectionSoap->getTransactionInformation(['auth' => $auth,'transactionID'=> $post->transactionID]);
                                if($TransactionInformation->getTransactionInformationResult->transactionState == 'PENDING'){
                                    $post->transactionState = 'PENDING';
                                    $post->hora = $horaa["minutes"];    //$post-> hora = $hora["minutes"];
                                    $post -> save();
                                }else{
                                    //guardo en bd
                                    $post->funciono = 'terminado';
                                    $post->transactionState = $TransactionInformation->getTransactionInformationResult->transactionState;
                                    $post -> save();
                                }
                            }
                    
                }else{
                    var_dump("No habian casos para actualizar");
                }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
