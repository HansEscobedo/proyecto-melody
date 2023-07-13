@extends('app')

@section('title')
    Recaudación
@endsection

@push('chart')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0 "></script>
@endpush

@section('content')

    @if ($detail_orders->count() === 0)
        <p class="text-2xl font-bold text-center text-black">No se han generado venta de entradas</p>
    @else
        <div id="chartContainer" class="flex flex-col items-center">
            <div id="chart" class="mb-8">
                <h3 class="mb-4 text-lg font-semibold text-center">Total Vendido por Concierto (Gráfico de Barras)</h3>
                <canvas id="myChartBarConcerts"></canvas>

            <div id="chart" class="mb-8">
                <h3 class="mb-4 text-lg font-semibold text-center">Total Vendido por Método de Pago (Gráfico de Barras)</h3>
                <canvas id="myChartBarPayment"></canvas>
            </div>
            <div id="chart">
                <h3 class="mb-4 text-lg font-semibold text-center">Total Vendido por Método de Pago (Gráfico de Pie)</h3>
                <canvas id="myChartPiePayment"></canvas>
            </div>

        </div>
    @endif

@endsection


@section('script')
    <script src="{{ asset('assets/js/my-charts.js') }}"></script>
@endsection
