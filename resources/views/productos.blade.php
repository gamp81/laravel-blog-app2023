@extends('layouts.app')

@section('content')
<section id="service" class="service2 sections lightbg">

            <div class="container">
                <div class="row">
                    <h4 style="text-align:center;  "class="text-2xl text-black font-bold">PRODUCTOS ESTRELLAS</h4>
					<div class="pricing col-md-12">
						<div class="col-md-5">
							<div class="price-box to-animate-2">
								<h2 style="text-align:center;" class="text-2xl text-black font-bold ">Syslab</h2>
								<a href="/syslab">
                                <div class="price"><img src="/images1/syslab1.png" alt="" /></div></a>
								<div class="text-1xl text-black text-left py-4 ">
							            <p>Sistema de laboratori para gestionar laboratorios clinicos, resultados en linea con codigo QR.</p>
                                   
								</div>
								<div class="features_buttom">
                                    <a href="/contactanos" class="btn btn-primary">Solicitar Información</a>
								
                                </div>
							</div>
						</div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-5">
							<div class="price-box to-animate-2">
							<h2 style="text-align:center;" class="text-2xl text-black font-bold ">Facturacion Electronica</h2>
                                <a href="http://facturandoec.gmiti.com/">
                                <div class="price"><img src="/images/facturando.png" alt="" /></div>
								<div class="text-1xl text-black text-left py-4 ">
									<p>Sistema de facturacion electronica para todo negocio.</p>
								</div>
								<br>
								<div class="features_buttom">
                                    <a href="/contactanos" class="btn btn-primary">Solicitar Información</a>
                                </div>	
							</div>
						</div>
					</div>
				</div>

               
            </div>
        </section><!-- End of Service2 Section -->	
        @stop