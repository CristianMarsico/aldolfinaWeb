<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Detalle del Producto</title>
<style>
  body {
    margin: 0; padding: 20px;
    font-family: Arial, sans-serif;
    background-color: #f5f6fa;
    color: #333;
  }
  .container {
    max-width: 1000px;
    margin: 0 auto;
    display: flex;
    gap: 40px;
    flex-wrap: wrap;
  }
  /* IMAGENES */
  .product-images {
    flex: 1 1 450px;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  .main-image {
    width: 100%;
    height: 400px;
    border-radius: 12px;
    background: #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }
  .main-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
  }
  .thumbnails {
    display: flex;
    gap: 12px;
    justify-content: flex-start;
  }
  .thumbnails img {
    width: 70px;
    height: 70px;
    border-radius: 8px;
    cursor: pointer;
    border: 2px solid transparent;
    object-fit: contain;
    transition: border-color 0.3s ease;
  }
  .thumbnails img:hover,
  .thumbnails img.active {
    border-color: #00a650;
  }
  /* INFO PRODUCTO */
  .product-info {
    flex: 1 1 450px;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  .product-info h1 {
    font-size: 28px;
    font-weight: 700;
    margin: 0;
  }
  .price {
    font-size: 26px;
    font-weight: 700;
    color: #e63946;
  }
  .installments {
    font-size: 16px;
    color: #333;
  }
  .discount-info {
    font-size: 14px;
    font-weight: 600;
    color: #007a00;
  }
  .add-cart-btn {
    margin-top: 20px;
    background-color: #222;
    color: #fff;
    font-weight: 700;
    font-size: 16px;
    padding: 14px;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
  }
  .add-cart-btn:hover {
    background-color: #005940;
  }
  /* CALCULAR ENVÍO */
  .shipping-section {
    margin-top: 30px;
    font-size: 14px;
  }
  .shipping-section label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
  }
  .shipping-input {
    padding: 8px;
    width: 150px;
    border-radius: 8px;
    border: 1px solid #ccc;
    margin-right: 12px;
  }
  .shipping-btn {
    background-color: #00a650;
    border: none;
    color: white;
    font-weight: 600;
    padding: 9px 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  .shipping-btn:hover {
    background-color: #007a00;
  }
  /* INFO ADICIONAL */
  .info-sections {
    margin-top: 20px;
    font-size: 13px;
    color: #666;
  }
  .info-sections div {
    margin-bottom: 12px;
  }
  /* DESCRIPCIÓN DEL PRODUCTO */
  .description-section {
    width: 100%;
    margin-top: 40px;
    padding: 24px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    font-size: 16px;
    line-height: 1.5;
  }
  /* RESPONSIVE */
  @media (max-width: 768px) {
    .container {
      flex-direction: column;
      padding: 10px;
    }
    .main-image {
      height: 300px;
    }
    .thumbnails img {
      width: 56px;
      height: 56px;
    }
    .product-info h1 {
      font-size: 24px;
    }
    .price {
      font-size: 22px;
    }
  }
</style>
</head>
<body>

<div class="container">

  <div class="product-images">
    <div class="main-image">
      <img id="current-image" src="{{ asset('img/default.jpg') }}" alt="Producto principal" />
    </div>
    <div class="thumbnails">
      <img src="{{ asset('img/vital.jpg') }}" alt="Miniatura 1" class="active" onclick="changeImage(this)" />
      <img src="{{ asset('img/default.jpg') }}" alt="Miniatura 2" onclick="changeImage(this)" />
      <img src="{{ asset('img/default.jpg') }}" alt="Miniatura 3" onclick="changeImage(this)" />
      <img src="{{ asset('img/default.jpg') }}" alt="Miniatura 4" onclick="changeImage(this)" />
    </div>
  </div>

  <div class="product-info">
    <h1>LANA DE OVEJA 2/2 CRUDO 150 GR.</h1>
    <div class="price">$8.590,00</div>
    <div class="installments">24 cuotas de $786,67</div>
    <div class="discount-info">10% de descuento pagando con Transferencia o depósito</div>

    <button class="add-cart-btn">AGREGAR AL CARRITO</button>

    <div class="shipping-section">
      <label for="cp">Calculá tu envío</label>
      <input type="text" id="cp" class="shipping-input" placeholder="Código Postal" />
      <button class="shipping-btn" onclick="calcularEnvio()">CALCULAR</button>
      <p id="resultado-envio"></p>
    </div>

    <div class="info-sections">
      <div><strong>Compra protegida:</strong> Tus datos están protegidos y seguros.</div>
      <div><strong>Cambios y devoluciones:</strong> Puedes realizar cambios en un plazo de 30 días.</div>
    </div>
  </div>
</div>

<!-- Sección de descripción bajo la sección principal -->
<div class="description-section">
  <h2>Descripción del producto</h2>
  <p>
    Lana de oveja en color crudo, 2/2, peso aproximado 150 gramos. Ideal para tejido y manualidades, suave y natural, sin teñir. Calidad superior para proyectos artesanales y textiles de alta durabilidad.
  </p>
  <p>
    Esta lana es perfecta para todo tipo de implementaciones, garantiza comodidad y resistencia. Además, ofrecemos asesoramiento para el cuidado y mantenimiento del producto.
  </p>
</div>

<script>
  function changeImage(el) {
    document.getElementById('current-image').src = el.src;
    document.querySelectorAll('.thumbnails img').forEach(img => img.classList.remove('active'));
    el.classList.add('active');
  }

  function calcularEnvio() {
    const cp = document.getElementById('cp').value.trim();
    const resultado = document.getElementById('resultado-envio');
    if (!cp) {
      resultado.textContent = 'Por favor ingresa un código postal.';
      resultado.style.color = 'red';
      return;
    }
    resultado.style.color = '#222';
    resultado.textContent = 'Costo de envío para CP ' + cp + ': $ 1.200,00 (estimado)';
  }
</script>

</body>
</html>
