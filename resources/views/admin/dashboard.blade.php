@extends('admin.layouts.template')

@section('title', 'Dashboard')
@section('content')

<!-- Page Header -->
<div class="content bg-image overflow-hidden" style="background-image: url('assets/images/photos/wc2.jpg'); background-position: top;">
  <div class="push-50-t push-15 header-text-shadow">
    <h1 class="h2 text-white animated zoomIn">Welcome Back</h1>
    <h2 class="h5 text-white-op animated zoomIn">{{ $admin->firstname }} {{ $admin->lastname }}</h2>
  </div>
</div>
<!-- END Page Header -->

<!-- Stats -->
<div class="content bg-white border-b">
  <div class="row items-push text-uppercase">
    <div class="col-xs-6 col-sm-3">
      <div class="font-w700 text-gray-darker animated fadeIn">Registrants</div>
      <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">{{ $totalRegistrants }}</a>
    </div>
    <div class="col-xs-6 col-sm-3">
      <div class="font-w700 text-gray-darker animated fadeIn">Confirmed</div>
      <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">{{ $confirmRegistrants }}</a>
    </div>
      <div class="col-xs-6 col-sm-3">
          <div class="font-w700 text-gray-darker animated fadeIn">Boys</div>
          <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">{{ $boys }}</a>
      </div>
      <div class="col-xs-6 col-sm-3">
          <div class="font-w700 text-gray-darker animated fadeIn">Girls</div>
          <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">{{ $girls }}</a>
      </div>
  </div>
</div>
<!-- END Stats -->

<!-- Page Content -->
<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <!-- Pie Chart -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Faculty interested by registrant</h3>
                    <p class="block-description"><small>Processed by registrants chosen faculty</small></p>
                </div>
                <div class="block-content block-content-full text-center">
                    <!-- Pie Chart Container -->
                    <div style="height: 330px;"><canvas id="registrants-faculty-pie"></canvas></div>
                </div>
            </div>
            <!-- END Pie Chart -->
        </div>
        <div class="col-lg-6">
            <!-- Pie Chart -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Major interested by registrant</h3>
                    <p class="block-description"><small>Processed by first interested major of registrants</small></p>
                </div>
                <div class="block-content block-content-full text-center">
                    <!-- Pie Chart Container -->
                    <div style="height: 330px;"><canvas id="majors"></canvas></div>
                </div>
            </div>
            <!-- END Pie Chart -->
        </div>
    </div>
</div>

@foreach($majors as $major)
    {{ $major['major'] }}
@endforeach

@endsection

@section('page-script')
    <script type="text/javascript">

        // pie chart options
        var pieOptions = {
            segmentShowStroke : false,
            animateScale : true,
        }

        var registrants_faculty_pie = document.getElementById("registrants-faculty-pie").getContext("2d");

        registrants_faculty_pie.canvas.width = 300;
        registrants_faculty_pie.canvas.height = 300;

        new Chart(registrants_faculty_pie).Pie([
            {
                value: {{ $faculty['it'] }},
                color:"#878BB6",
                label: "IT"
            },
            {
                value : {{ $faculty['eng'] }},
                color : "#4ACAB4",
                label: "ENG"
            },
            {
                value : {{ $faculty['ba'] }},
                color : "#FF8153",
                label: "BA"
            }
        ], pieOptions);

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++ ) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Prepare Data
        var majorsChart = document.getElementById("majors").getContext("2d");

        majorsChart.canvas.width = 300;
        majorsChart.canvas.height = 300;

        var i=0;
        var majorData = [];
        @foreach($majors as $major)
            majorData[i] = {value: {{ $major['total'] }}, color: getRandomColor(), label: "{{ $major['name'] }}"};
            i++;
        @endforeach

        // Render Chart
        new Chart(majorsChart).Doughnut(majorData, pieOptions);

        new Chart(majorsChart, {
            type: 'doughnut',
            data: majorData,
        });


    </script>
@endsection