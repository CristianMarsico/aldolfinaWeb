@extends('layouts.user')

@section('content')
<section class="contact-section">

    <div class="container">
        <div class="contact-wrapper">
            <!-- IZQUIERDA -->
            <div class="contact-info">
                <span class="contact-tag"> CONTACTO </span>

                <h2> Hablemos sobre tu compra </h2>

                <p class="contact-description">
                    Estamos para ayudarte con pedidos,
                    envíos, stock y cualquier consulta
                    sobre nuestros productos.
                </p>

                <div class="info-list">
                    <div class="info-item">
                        <div class="icon-box">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div>
                            <h5>Horarios</h5>
                            <p>
                                Lun a Vie · 09:30 a 19:30<br>
                                Sábados · 10:00 a 14:00
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="icon-box">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div>
                            <h5> WhatsApp </h5>
                            <p> +54 9 11 6699 2211 </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="icon-box">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div>
                            <h5> Email </h5>
                            <p> hola@panalesonline.com.ar </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div>
                            <h5> Dirección </h5>
                            <p> Av. Córdoba 5215 </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DERECHA -->
            <div class="contact-form-card">
                <form class="contact-form">
                    <div class="form-group">
                        <label> Nombre completo </label>
                        <input type="text" placeholder="Ingresá tu nombre">
                    </div>
                    <div class="form-group">
                        <label> Correo electrónico </label>
                        <input type="email" placeholder="ejemplo@email.com">
                    </div>
                    <div class="form-group">
                        <label> Teléfono </label>
                        <input type="text" placeholder="+54 9 11...">
                    </div>
                    <div class="form-group">
                        <label> Mensaje </label>
                        <textarea placeholder="Escribí tu consulta..."></textarea>
                    </div>
                    <button type="submit">
                        Enviar consulta
                    </button>
                </form>
            </div>
        </div>
        
    </div>

</section>
@endsection