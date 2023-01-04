  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('imagenes/super_market.png');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">BIENVENIDO<span></span></h2>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url('imagenes/super_market2.png');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">
                  GRACIAS POR SU VISITA
                </h2>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url('imagenes/Captura1.png');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">
                  
                </h2>
              </div>
            </div>
          </div>

        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section>

  <section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="section-title">
        <h2>SUPERMERCADO “SUPER-MARKET M&B PORTACHUELO</h2>
        <p>
          SUPERMERCADO “SUPER-MARKET M&B PORTACHUELO
      </div>

      <div class="row">
        <div class="col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter=".filter-categoria">Categorias</li>
            <li data-filter=".filter-tipo">Tipos</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        @foreach (@categorias() as $categoria)
          <div class="col-lg-4 col-md-6 portfolio-item filter-categoria">
            <div class="portfolio-wrap p-4" style="height: 300px">
              <img src="{{ asset($categoria->logo) }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{ $categoria->nombre }}</h4>
                <p>{{ $categoria->nombre }}</p>
                <div class="portfolio-links">
                  <a href="{{ asset($categoria->logo) }}" data-gall="portfolioGallery" class="venobox" title="{{ $categoria->nombre }}"><i class="icofont-eye"></i></a>
                  <a href="{{ route('web.categorias', ['id'=>$categoria->id]) }}" title="mas detalle"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach

        @foreach (@tipos() as $tipo)
          <div class="col-lg-4 col-md-6 portfolio-item filter-tipo">
            <div class="portfolio-wrap  p-4" style="height: 300px">
              <img src="{{ asset($tipo->logo) }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{ $tipo->nombre }}</h4>
                <p>{{ $tipo->nombre }}</p>
                <div class="portfolio-links">
                  <a href="{{ asset($tipo->logo) }}" data-gall="portfolioGallery" class="venobox" title="{{ $tipo->tipo }}"><i class="icofont-eye"></i></a>
                  <a href="{{ route('web.tipos', ['id'=>$tipo->id]) }}" title="mas detalle"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach 
      
      </div>
    </div>
  </section>