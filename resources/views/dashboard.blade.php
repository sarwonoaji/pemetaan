@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row">

<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2">
<div class="card-body">
Earnings (Monthly) - $40,000
</div>
</div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-success shadow h-100 py-2">
<div class="card-body">
Earnings (Annual) - $215,000
</div>
</div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-info shadow h-100 py-2">
<div class="card-body">
Tasks - 50%
</div>
</div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-warning shadow h-100 py-2">
<div class="card-body">
Pending - 18
</div>
</div>
</div>

</div>

<div class="row">
<div class="col-xl-8 col-lg-7">
<div class="card shadow mb-4">
<div class="card-body">
<canvas id="myAreaChart"></canvas>
</div>
</div>
</div>

<div class="col-xl-4 col-lg-5">
<div class="card shadow mb-4">
<div class="card-body">
<canvas id="myPieChart"></canvas>
</div>
</div>
</div>
</div>

@endsection