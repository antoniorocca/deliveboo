@extends('layouts.app')




@section('head_scripts')

<style media="screen">
#app {
  position: relative;
  z-index: 10;
}
#myChart_box, #myChart_box2 {
  margin: auto;
  width: 80%;
}
#chartdiv {
  width: 2500px;
  height: 1500px;
  position: absolute;
  top:35%;
  left: 50%;
  transform: translateX(-50%);
}

</style>
@endsection


@section('content')
@endsection
@section('scripts')
<div class="spacer">
  <img class="img_spacer" src="{{asset('storage/lightgreen_wave.png')}}" alt="">
</div>
<div id="backend_container"class="chart_container">
  <div class="backend_wrap">
    <div class="wrap">
      <div id="myChart_row" class="content_row">
        <h2>Piatti venduti</h2>
        <div id="myChart_box">
          <canvas id="myChart" width="300" height="170"></canvas>
        </div>
        <img src="/img/burger.png" alt="">
      </div>
      <div id="myChart_row2" class="content_row">
        <h2>Profitto per mese</h2>
        <div id="myChart_box2">
          <canvas id="myChart2" width="300" height="170"></canvas>
        </div>
        <img src="/img/wallet.png" alt="">
      </div>
    </div>
  </div>
  <div id="chartdiv"></div>
</div>





    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/plugins/wordCloud.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
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
  colors.push('rgba(0, 160, 130,0.4)')
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

Object.keys(orders).forEach(key => {
  date.forEach((date, i) => {
    if (date[0] === orders[key].order_date[0]+orders[key].order_date[1]+orders[key].order_date[2]+orders[key].order_date[3]+orders[key].order_date[4]+orders[key].order_date[5]+orders[key].order_date[6]) {
      date.push(orders[key]);
    }
  });
});
date.forEach((date, i) => {

});


date.forEach((date, i) => {
  let totalMonth = 0;
  for (var i = 1; i < date.length; i++) {
    totalMonth += date[i].amount;
  }
  date.push(totalMonth);
});
let finalDate = [];
let totalPerMonth = [];
let newColor = [];
let newBorderColor = [];
date.forEach((date, i) => {
  finalDate.push(date[0]);
  totalPerMonth.push(date[date.length - 1]);
  newColor.push('rgba(0, 160, 130,0.4)');
  newBorderColor.push('rgba(0, 160, 130, 1)');
});

console.log(finalDate, totalPerMonth);





var ctx = document.getElementById('myChart2');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: finalDate,
        datasets: [{
            label: 'Incasso per mese',
            data: totalPerMonth,
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
















am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4plugins_wordCloud.WordCloud);
var series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());

series.accuracy = 10;
series.step = 130;
series.rotationThreshold = 1;
series.maxCount = 100;
series.minWordLength = 2;
series.labels.template.margin(4,4,4,4);
series.maxFontSize = am4core.percent(25);

series.text = "Though yet of Hamlet our dear brother's death The memory be green, and that it us befitted To bear our hearts in grief and our whole kingdom To be contracted in one brow of woe, Yet so far hath discretion fought with nature That we with wisest sorrow think on him, Together with remembrance of ourselves. Therefore our sometime sister, now our queen, The imperial jointress to this warlike state, Have we, as 'twere with a defeated joy,-- With an auspicious and a dropping eye, With mirth in funeral and with dirge in marriage, In equal scale weighing delight and dole,-- Taken to wife: nor have we herein barr'd Your better wisdoms, which have freely gone With this affair along. For all, our thanks. Now follows, that you know, young Fortinbras, Holding a weak supposal of our worth, Or thinking by our late dear brother's death Our state to be disjoint and out of frame, Colleagued with the dream of his advantage, He hath not fail'd to pester us with message, Importing the surrender of those lands Lost by his father, with all bonds of law, To our most valiant brother. So much for him. Now for ourself and for this time of meeting: Thus much the business is: we have here writ To Norway, uncle of young Fortinbras,-- Who, impotent and bed-rid, scarcely hears Of this his nephew's purpose,--to suppress His further gait herein; in that the levies, The lists and full proportions, are all made Out of his subject: and we here dispatch You, good Cornelius, and you, Voltimand, For bearers of this greeting to old Norway; Giving to you no further personal power To business with the king, more than the scope Of these delated articles allow. Farewell, and let your haste commend your duty. Tis sweet and commendable in your nature, Hamlet,To give these mourning duties to your father: But, you must know, your father lost a father; That father lost, lost his, and the survivor bound In filial obligation for some term To do obsequious sorrow: but to persever In obstinate condolement is a course Of impious stubbornness; 'tis unmanly grief; It shows a will most incorrect to heaven, A heart unfortified, a mind impatient, An understanding simple and unschool'd: For what we know must be and is as common As any the most vulgar thing to sense, Why should we in our peevish opposition Take it to heart? Fie! 'tis a fault to heaven, A fault against the dead, a fault to nature, To reason most absurd: whose common theme Is death of fathers, and who still hath cried, From the first corse till he that died to-day, 'This must be so.' We pray you, throw to earth This unprevailing woe, and think of us As of a father: for let the world take note, You are the most immediate to our throne; And with no less nobility of love Than that which dearest father bears his son, Do I impart toward you. For your intent In going back to school in Wittenberg, It is most retrograde to our desire: And we beseech you, bend you to remain Here, in the cheer and comfort of our eye, Our chiefest courtier, cousin, and our son.";

series.colors = new am4core.ColorSet();
series.colors.list = [
  am4core.color('rgba(0, 160, 130, .05)'),
  am4core.color('rgba(0, 160, 130, .1)'),
  am4core.color('rgba(0, 160, 130, .15)'),
  am4core.color('rgba(0, 160, 130, .2)'),
  am4core.color('rgba(0, 160, 130, .25)'),
  am4core.color('rgba(0, 160, 130, .15)'),
];
series.colors.reuse = true;
// series.colors.passOptions = {}; // makes it loop
//series.labelsContainer.rotation = 45;
series.angles = [0,-90];
series.fontWeight = "700"

setInterval(function () {
  series.dataItems.getIndex(Math.round(Math.random() * (series.dataItems.length - 1))).setValue("value", Math.round(Math.random() * 10));
}, 500000)

}); // end am4core.ready()












</script>
@endsection
