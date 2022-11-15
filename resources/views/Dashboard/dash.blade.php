@extends('home')
@section('home-content')


<style>
    .table  tr td {
        padding:2px;

    }
    .table thead th {
        padding: 2px;
    }
 
</style>
<div class="row">

<div class="col-6">
<h5 class="text-primary font-weight-bold text-center">Company vs Products</h5>
<br>
<table class="table table-striped">
        <thead>
            <tr>
                <th class="" width="5%" >Company</th>
                <th class="" width="5%" >Products</th>
            </tr>
        </thead>
        <tbody id="records">
            @foreach ($product_data as $data_table)
                <tr>
                    <td>{{ $data_table->company_name }}</td>
                    <td>{{ $data_table->name }}</td>
                </tr>
            @endforeach
        </tbody>
</table>
</div>

<div class="col-6">
    <h5 class="text-primary font-weight-bold text-center">Products Chart</h5>
    <div class="card">
        <div class="card-body myChart">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

</div>


<!-- <script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script>   -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->

<div>
<script>
    // DATA FROM PHP TO JAVASCRIPT
    const labels = {!! json_encode($labels) !!};
    const data = {!! json_encode($data) !!};
    const max_price1 = {!! json_encode($max_price) !!};
    const propertyValues = Object.values(max_price1);
    const maxValue = propertyValues[0]['max_price'];
</script>

<!-- <canvas id="myChart" width="400" height="400"></canvas> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
       
        type: 'bar',
        data: {
            labels: labels, // <======= Here I set the x-axis
            datasets: [{
                label: '# of Votes',
                data: data, // <======= Here I set the y-axis
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                    legend: {
                        display: false
                    }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize : 1000,
                    max:maxValue+1000
                }
            }
        }
    });
</script>

</div>


@endsection