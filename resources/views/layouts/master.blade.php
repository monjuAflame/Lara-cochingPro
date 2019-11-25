<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Panjaree Coching</title>

    {{--Bootstrap--}}   
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">

    {{--bootstrap theme--}} 
    <link href="{{ asset('public/css/bootstrap-theme.css') }}" rel="stylesheet">
   
    {{--font icon--}} 
    <link href="{{ asset('public/css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet" />   

    {{--full calendar css--}} 
    <link href="{{ asset('public/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />

    {{--easy pie chart--}} 
    <link href="{{ asset('public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>

    {{--owl carousel--}} 
    <link rel="stylesheet" href="{{ asset('public/') }}/css/owl.carousel.css" type="text/css">
    <link href="{{ asset('public/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">

    {{--Custom styles--}} 
    <link rel="stylesheet" href="{{ asset('public/css/fullcalendar.css') }}">
    <link href="{{ asset('public/css/widgets.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/css/xcharts.min.css') }}" rel=" stylesheet"> 
    <link href="{{ asset('public/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
    {{------dataTable-----}}
    <link href="{{ asset('public/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/buttons.dataTables.min.css') }}" rel="stylesheet">

    @yield('style')
  </head>

  <body>

<section id="container" class="">
     
    <header class="header dark-bg">
          @include('layouts.includes.header')
    </header>      

    <aside>
          @include('layouts.includes.sidebar')
    </aside>

    <section id="main-content">
        <section class="wrapper">  
            <div class="row">
                @yield('pageInfo')
            </div>

            @yield('content')

        </section>
    </section>
</section>

    {{-- javascripts --}}
    <script src="{{ asset('public/js/jquery.js') }}"></script>
    <script src="{{ asset('public/js/jquery-ui-1.10.4.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery-1.8.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    {{-- bootstrap --}}
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    {{-- nice scroll --}}
    <script src="{{ asset('public/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    {{-- charts scripts --}}
    <script src="{{ asset('public/assets/jquery-knob/js/jquery.knob.js') }}"></script>
    <script src="{{ asset('public/js/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
    <script src="{{ asset('public/js/owl.carousel.js') }}" ></script>
    {{-- jQuery full calendar --}}
    <<script src="{{ asset('public/js/fullcalendar.min.js') }}"></script> 
    {{-- Full Google Calendar - Calendar --}}
    <script src="{{ asset('public/assets/fullcalendar/fullcalendar/fullcalendar.js') }}"></script>
    {{-- script for this page only --}}
    <script src="{{ asset('public/js/calendar-custom.js') }}"></script>
    <script src="{{ asset('public/js/jquery.rateit.min.js') }}"></script>
    {{-- custom select --}}
    <script src="{{ asset('public/js/jquery.customSelect.min.js') }}" ></script>
    <script src="{{ asset('public/assets/chart-master/Chart.js') }}"></script>
   
    {{-- custome script for all page --}}
    <script src="{{ asset('public/js/scripts.js') }}"></script>
    {{-- custom script for this page --}}
    <script src="{{ asset('public/js/sparkline-chart.js') }}"></script>
    <script src="{{ asset('public/js/easy-pie-chart.js') }}"></script>
    <script src="{{ asset('public/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('public/js/xcharts.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.autosize.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.placeholder.min.js') }}"></script>
    <script src="{{ asset('public/js/gdp-data.js') }}"></script>  
    <script src="{{ asset('public/js/morris.min.js') }}"></script>
    <script src="{{ asset('public/js/sparklines.js') }}"></script>    
    <script src="{{ asset('public/js/charts.js') }}"></script>
    <script src="{{ asset('public/js/jquery.slimscroll.min.js') }}"></script>
    {{-----daTable------}}
    <script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/js/jszip.min.js') }}"></script>
    <script src="{{ asset('public/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/js/buttons.html5.min.js') }}"></script>
    @yield('script')    
  <script>
$(document).ready(function(){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
});
      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
      
      /* ---------- Map ---------- */
    $(function(){
      $('#map').vectorMap({
        map: 'world_mill_en',
        series: {
          regions: [{
            values: gdpData,
            scale: ['#000', '#000'],
            normalizeFunction: 'polynomial'
          }]
        },
        backgroundColor: '#eef3f7',
        onLabelShow: function(e, el, code){
          el.html(el.html()+' (GDP - '+gdpData[code]+')');
        }
      });
    });

  </script>

  </body>
</html>
