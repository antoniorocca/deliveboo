@extends('layouts.app')




@section('head_scripts')
<style media="screen">
#myChart_box {
  margin: auto;
  width: 80%;
}
</style>
@endsection


@section('content')
<div class="container">
  <h1>Grafici</h1>
</div>
@endsection
@section('scripts')
<h2>Piatti venduti</h2>
<div id="myChart_box">
  <canvas id="myChart" width="400" height="300"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script type="text/javascript">
var orders = {!!$orders!!};
let data = [];
Object.keys(orders).forEach(key => {
  orders[key].order = JSON.parse(orders[key].order);
  orders[key].order.forEach((item, i) => {
    data.push(item);
  });

});

let filtered = [];
let dishesArray = []
data.forEach((data, i) => {
  if (!filtered.includes(data.id)) {
    filtered.push(data.id);
    dishesArray.push({
      id:data.id,
      name:'',
      quantity:0
    })
  }
});

data.forEach((data, i) => {
  dishesArray.forEach((item, i) => {
    if (data.id === item.id) {
      if (data.quantity == undefined) {
        item.quantity++;
        item.name = data.name;
      }else{
        item.quantity += data.quantity;
        item.name = data.name;

      }
    }
  });

});
console.log(dishesArray);
let names = [];
let values = [];
let colors = [];
let borderColor = [];
dishesArray.forEach((item, i) => {
  names.push(item.name+' '+item.id);
  values.push(item.quantity);
  colors.push('rgba(0, 160, 130,0.2)')
  borderColor.push('rgba(0, 160, 130,1)')
});
console.log(names, values, colors, borderColor);
var ctx = document.getElementById('myChart');
Chart.defaults.global.legend.display = false;
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: names,
        datasets: [{
            label: 'Piatti venduti',
            data: values,
            backgroundColor: colors,
            borderColor: borderColor,
            borderWidth: 3
        }]
    },
    options: {
        scales: {
          yAxes: [{
              ticks: {
                  beginAtZero: true
              },
              gridLines: {
                  color: "rgba(0, 0, 0, 0)",
              }
          }],
          xAxes: [{
              ticks: {
                  beginAtZero: true
              },
              gridLines: {
                  color: "rgba(0, 0, 0, 0)",
              }

          }]
        }
    }
});

</script>
@endsection
