@extends('layout')
@section('title','about Us')
@section('content')
@if ($langue==="ar")
{{-- arabic --}}
      <section class="about_us">
    <div class="container main">
        <h2>About Us</h2>
        <p>نحن شركة متخصصة في تقديم حلول تقنية مبتكرة تهدف إلى تحسين حياة الناس وجعل العالم مكاناً أفضل. نؤمن بأن التكنولوجيا يمكن أن تغير العالم، ونعمل جاهدين لتحقيق هذا الهدف من خلال منتجاتنا وخدماتنا.</p>

        <h2>رؤيتنا</h2>
        <p>أن نصبح رواداً في مجال التكنولوجيا والابتكار، وأن نوفر لعملائنا حلولاً متكاملة تساعدهم على تحقيق أهدافهم.</p>

        <h2>قيمنا</h2>
        <ul>
            <li>الابتكار</li>
            <li>الجودة</li>
            <li>النزاهة</li>
            <li>التميز في الخدمة</li>
     
        </ul>
    </div>

    <footer>
        <p>جميع الحقوق محفوظة &copy; dawoud2024</p>
    </footer>
   </section>
   {{-- italian --}}
   @elseif ($langue==="it") 
   <section class="about_us">
    <div class="container main">
        <h2>Chi siamo</h2>
        <p>Siamo un'azienda specializzata nel fornire soluzioni tecnologiche innovative volte a migliorare la vita delle persone e rendere il mondo un posto migliore. Crediamo che la tecnologia possa cambiare il mondo e lavoriamo duramente per raggiungere questo obiettivo attraverso i nostri prodotti e servizi.</p>

        <h2>La nostra visione</h2>
        <p>Diventare leader nel settore della tecnologia e dell'innovazione, fornendo ai nostri clienti soluzioni complete che li aiutino a raggiungere i loro obiettivi.</p>

        <h2>I nostri valori</h2>
        <ul>
            <li>Innovazione</li>
            <li>Qualità</li>
            <li>Integrità</li>
            <li>Eccellenza nel servizio</li>
           
        </ul>
    </div>

    <footer>
        <p>Tutti i diritti riservati &copy; dawoud2024</p>
    </footer>
</section>

   {{-- another langue --}}
   @else
   <section class="about_us">
    <div class="container main">
        <h2>About Us</h2>
        <p>We are a specialized company in providing innovative technological solutions aimed at improving people's lives and making the world a better place. We believe that technology can change the world, and we work hard to achieve this goal through our products and services.</p>

        <h2>Our Vision</h2>
        <p>To become leaders in the field of technology and innovation, and to provide our customers with comprehensive solutions that help them achieve their goals.</p>

        <h2>Our Values</h2>
        <ul>
            <li>Innovation</li>
            <li>Quality</li>
            <li>Integrity</li>
            <li>Excellence in service</li>
           
        </ul>
    </div>

    <footer>
        <p>All rights reserved &copy; dawoud2024</p>
    </footer>
</section>

@endif

@endsection