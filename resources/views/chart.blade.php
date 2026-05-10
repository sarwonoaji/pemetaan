@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Charts</h1>

<div class="row">

    <!-- AREA CHART -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
            </div>

            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>

        </div>
    </div>

    <!-- PIE CHART -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
            </div>

            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection

@push('scripts')

<!-- Chart.js -->
<script src="{{ asset('bootstrap/vendor/chart.js/Chart.min.js') }}"></script>

<script>
/* AREA CHART */
var ctx = document.getElementById("myAreaChart");
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [{
            label: "Earnings",
            data: [1000, 2000, 1500, 3000, 2500, 4000],
            borderColor: "#4e73df",
            backgroundColor: "rgba(78,115,223,0.1)"
        }]
    }
});

/* PIE CHART */
var ctx2 = document.getElementById("myPieChart");
new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ["Direct", "Social", "Referral"],
        datasets: [{
            data: [55, 30, 15],
            backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"]
        }]
    }
});
</script>

@endpush