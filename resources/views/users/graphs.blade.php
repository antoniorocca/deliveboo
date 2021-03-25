@extends('layouts.app')




@section('head_scripts')
<style media="screen">
#myChart_box, #myChart_box2 {
  margin: auto;
  width: 80%;
}
</style>
@endsection


@section('content')
@endsection
@section('scripts')
<div class="spacer">
  <img class="img_spacer" src="{{asset('storage/lightgreen_wave.png')}}" alt="">
</div>
<div id="backend_container"class="">
  <div class="backend_wrap">
    <div class="content_row">
      <h2>Piatti venduti</h2>
      <div id="myChart_box">
        <canvas id="myChart" width="300" height="170"></canvas>
      </div>
    </div>
    <div class="content_row">
      <h2>Profitto per mese</h2>
      <div id="myChart_box2">
        <canvas id="myChart2" width="300" height="170"></canvas>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script type="text/javascript">


// PRIMO GRAFICO
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


// SECONDO GRAFICO

let date = [
  ['2020-01'],
  ['2020-02'],
  ['2020-03'],
  ['2020-04'],
  ['2020-05'],
  ['2020-06'],
  ['2020-07'],
  ['2020-08'],
  ['2020-09'],
  ['2020-10'],
  ['2020-11'],
  ['2020-12'],
  ['2021-01'],
  ['2021-02'],
  ['2021-03'],
  ['2021-04'],
  ['2021-05'],
  ['2021-06'],
  ['2021-07'],
  ['2021-08'],
  ['2021-09'],
  ['2021-10'],
  ['2021-11'],
  ['2021-12'],
];


orders.forEach((order, i) => {
  date.forEach((date, i) => {
    if (date[0]=== order.order_date[0]+order.order_date[1]+order.order_date[2]+order.order_date[3]+order.order_date[4]+order.order_date[5]+order.order_date[6]) {
      date.push(order);
    }
  });

});
date.forEach((date, i) => {
  let totalMonth = 0;
  for (var i = 1; i < date.length; i++) {
    totalMonth += date[i].amount;
  }
  date.push(totalMonth)
});
let newDate=[];
let newTotalMonth =[];
let newColor = [];
let newBorderColor = [];
date.forEach((item, i) => {
  newDate.push(item[0]);
  newTotalMonth.push(item[item.length -1]);
  newColor.push('rgba(0, 160, 130,0.2)');
  newBorderColor.push('rgba(0, 160, 130, 1)');
});
console.log(newDate, newTotalMonth);
var ctx = document.getElementById('myChart2');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: newDate,
        datasets: [{
            label: 'Incasso per mese',
            data: newTotalMonth,
            backgroundColor: newColor,
            borderColor: newBorderColor,
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
