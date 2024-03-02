<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light ">
     <div class="container">
       <a class="navbar-brand" href="{{ asset(''); }}"><img src="{{ asset('home/assets/img/logo_horizontal.png'); }}" alt="" srcset=""></a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
         <ul class="navbar-nav">
             @if(isset($data['selective_processes']) && ($data['selective_processes'] !== NULL))
             <li class="nav-item justify-content-end">
                 <a href="{{ asset('login'); }}" class="nav-link pt-2 text-right">INSCREVA-SE</a>
             </li>
             @else
             <li class="nav-item justify-content-end">
                 <a href="{{ asset('ensalamento'); }}" class="nav-link pt-2 text-right">RESULTADOS</a>
             </li>
             <li class="nav-item">
                 <a href="{{ asset('precadastro'); }}" class="nav-link pt-2 text-right">PRÉ CADASTRO</a>
             </li>
             @endif
         </ul>
       </div>
     </div>
   </nav>
 </header><!-- End Header -->
