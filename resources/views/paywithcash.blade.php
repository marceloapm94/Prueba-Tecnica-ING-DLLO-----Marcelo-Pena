@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<div class="container">
    
    <div  class="col-md-12 col-md-offset-0">
            <div class="row">
        
            
            
                            
                                
                        <div class="container">
                            <div class="row">
                                <div  class="col-md-10 col-md-offset-0">
                                    <h1>Formas de Pago</h1>
                                    <br>
                                    <h4><strong>PAGOS EN BOLIVARES</strong></h4>
                                    <br>
                                    
                                </div>
                            </div>
                            
                            <div class="row">
                            <p>Si estas en Venezuela tienes a tu disposición las siguientes cuentas para realizar el pago mediante Depósito o Transferencia Online:</p>
                                
                            <p><strong>Nota:</strong> Si realiza una transferencia desde otro banco debes hacerla a la cuenta <strong>BANESCO </strong>y enviar por correo comprobante o recibo de la transacción realizada.</p>
                            <br>
                            
                                <div  class="col-md-10 col-md-offset-0">
                                
                                
                                
                            
                                        
                                    <table class="table table-bordered" >
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <img src="{{ asset('provincial-300x50.png') }}" height="60%" >
        
                                                    <p>Cta. Corriente <br /> 0108 000 21 40100427193<br /> GSM Venezuela<br /> RIF. J-405421029</p>
                                                </td>
                                                
                                                <td align="center">
                                                    <img src="{{ asset('banesco-300x65 (1).png') }}" height="60%">
                                                    <p>Cta. Corriente<br /> 0134 0328 78 3281072862<br /> GSM Venezuela<br /> RIF. J-405421029</p>
                                                </td>
                                                <td align="center">
                                                    <img src="{{ asset('mercantil-300x74.png') }}" height="60%">
                                                    <p>Cta. Corriente<br /> 0105 0750 20 1750070588<br /> GSM Venezuela<br /> RIF. J-405421029</p>
                                                </td>
                                            </tr>
                                            
                                            <tr >
                                                <td align="center">
                                                    <img src="{{ asset('bancaribe.png') }}" height="70%" >
                                                    <p>Cta. Corriente<br /> 0114 0170 89 1700167042<br /> GSM Venezuela<br /> RIF. J-405421029</p>
                                                </td>
                                                <td align="center">
                                                    <img src="{{ asset('banvenez.gif') }}" height="70%" >
                                                    <p> Cta. Corriente<br /> <span style="color: #ff0000;">TEMPORALMENTE NO <br/> DISPONIBLE ESTE BANCO</span><br /> GSM Venezuela<br /> RIF. J-405421029</p>
                                                </td>
                                                <td align="center">
                                                    <img src="{{ asset('bicentenario.png') }}" height="100%" >
                                                    <p>Cta. Corriente<br /> 0175 0044 97 0075623857<br /> GSM Venezuela<br /> RIF. J-405421029</p>
                                                </td>
                                            </tr>
                                            
                                            <tr >
                                                <td align="center">
                                                    <img src="{{ asset('bnc.jpg') }}" height="70%" >
                                                    <p>Cta. Corriente<br /> 0191 0064 21 2164047031<br /> GSM Venezuela<br /> RIF. J-405421029</p>
                                                </td>
                                                <td align="center">
                                                    <img src="{{ asset('pagomovil.jpg') }}" height="70%" >
                                                    <p> Banco: Mercantil<br /> CÃ©dula: 17.718.849<br /> GSM Venezuela<br /> Monto MÃ¡ximo: 800.000Bs</p>
                                                </td>
                                                <td align="center">
                                                    <img src="{{ asset('mp.jpg') }}" height="100%" >
                                                    <p>Sistema Incluido en Web<br /> Comisión: 6.99% del monto<br /></p>
                                                </td>
                                            </tr>
                                            
                                            
                                        </tbody>
                                    </table>
                            
                            
                                </div >
                            </div>
                            
                            
                            
                            
                            <div class="row">  
                                
                                <div  class="col-md-10 col-md-offset-0">

                                            <h4><strong>PAGOS INTERNACIONALES:</strong></h4>
                                            
                                            <p>&#8211; Si no estás en Venezuela puedes realizar tu pago de forma segura a traves del sistema de Paypal o mediante Skrill (MoneyBookers). También mediante depósitos o transferencias a nuestras cuentas en USA y Panama:</p>
                                </div>
                            </div
                            
                            
                            <div class="row">
                                <div  class="col-md-10 col-md-offset-0">
                                           
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <img src="{{ asset('bankofamerica.jpg') }}" height="100%" >
                    
                                                                <p>Cta. Corriente <br /> Numero: 898072067759<br /> Nombre: Jose Daniel Aviles<br /> EMAIL ASOCIADO (Zelle) <br /> clientes.gsmvzla@gmail.com</p>
                                                            </td>
                                                            
                                                            <td align="center">
                                                                <img src="{{ asset('banesco-300x65 (1).png') }}" height="60%">
                                                                <p>Banesco PanamÃ¡<br />Cta. Corriente<br /> Numero: 201800569236<br /> Jose Daniel Aviles</p>
                                                            </td>
                                                            <td align="center">
                                                                <img src="{{ asset('Wells-Fargo-Logo-300x150.jpg') }}" height="100%">
                                                                <p>Cta. Corriente<br /> Numero: 7582096876<br /> Nombre: Jose Daniel Aviles<br /> EMAIL ASOCIADO (Zelle)<br />clientes.gsmvzla@gmail.com  </p>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr >
                                                            <td align="center">
                                                                <img src="{{ asset('PayPal-300x91-300x91.jpg') }}" height="50%" >
                                                                <p>Correo de Pagos Paypal: <br /> pagos@unlock-venezuela.com<br /> </p>
                                                            </td>
                                                            <td align="center">
                                                                <img src="{{ asset('bitcoin-300x69.jpg') }}" height="70%" >
                                                                <p> <br /> <a href="http://unlock-venezuela.com/contacto/"><strong>Solicitar Información</strong></a></p>
                                                            </td>
                                                            <td align="center">
                                                                <img src="{{ asset('skrill.jpg') }}" height="100%" >
                                                                <p>Correo Moneybookers:<br /> pagos@unlock-venezuela.com<br /></p>
                                                            </td>
                                                        </tr>
                                                        
                                                     
                                                        
                                                     
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                </div>
                        </div>
                        
                        
                        
    </div>
                        
                        
                        
                        
                        
                        
                        </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                         
                                
                                
                               
                               
        
                            
                            
                            
                            
                            
                            
                            
                            
                            
             
        </div>
    </div>
</div>
@endsection