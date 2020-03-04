/*  1st Chart */

let myChart0 = document.getElementById('myChart0').getContext('2d');

// Global Options
Chart.defaults.global.defaultFontSize = 10;
Chart.defaults.global.defaultFontColor = '#FFF';
Chart.defaults.global.defaultFontFamily = 'MB Empire';

let massPopChart0 = new Chart(myChart0, {
  type:'polarArea', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels: ['More than 1h','Between 30mn and 1h','Less than 30mn'],
    datasets:[{
      label:'2017',
      data:[
        15,
        64,
        21
        
      ],
      
      backgroundColor:['#2EB5E8','#7120EB','#F199D3'],
      borderWidth:1,
      borderColor:'none',
      hoverBorderWidth:3,
      hoverBorderColor:'#000'
    
    }]
  },
  options:{
    title:{
      display:false
    },
    legend:{
      display:true,
      position: 'bottom',
      labels:{
        fontColor:'#FFF',
        align: 'left',
      }
    },
    layout:{
      padding:{
        left: 10,
        right:0,
        bottom:0,
        top:0
      }
    },
    tooltips:{
      enabled:true
    }
  }
});










/* 2nd Chart*/

let myChart = document.getElementById('myChart').getContext('2d');

// Global Options
Chart.defaults.global.defaultFontSize = 10;
Chart.defaults.global.defaultFontColor = '#FFF';
Chart.defaults.global.defaultFontFamily = 'MB Empire';

let massPopChart = new Chart(myChart, {
  type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:['Jan','Feb','Mar','Avr','Mai','Jun','Jul','Aug','Sep','Otc','Nov','Dec'],
    datasets:[{
      label:'2017',
      data:[
        707,
        505,
        1003,
        1501,
        5030,
        2340,
        2357,
        1111,
        980,
        3222,
        1777,
        1333
        
      ],
      //backgroundColor:'green',
      backgroundColor:'#2EB5E8',
      borderWidth:1,
      borderColor:'none',
      hoverBorderWidth:3,
      hoverBorderColor:'#000'
    } , {
      label:'2018',
      data:[
        1574,
        3009,
        4632,
        5536,
        2032,
        1111,
        4138,
        2846,
        905,
        3181,
        4030,
        4497
      ],
      //backgroundColor:'green',
      backgroundColor:'#7120EB',
      borderWidth:1,
      borderColor:'none',
      hoverBorderWidth:3,
      hoverBorderColor:'#000'
    }, {
      label:'2019',
      data:[
        2658,
        1798,
        2141,
        5360,
        4730,
        4566,
        6721,
        2498,
        1540,
        5654,
        4297,
        6766
      ],
      //backgroundColor:'green',
      backgroundColor:'#F199D3',
      borderWidth:1,
      borderColor:'none',
      hoverBorderWidth:3,
      hoverBorderColor:'#000'
    }]
  },
  options:{
    title:{
      display:false
    },
    legend:{
      display:true,
      position:'right',
      labels:{
        fontColor:'#FFF',
        fontFamily:'MB Empire',
        fontSize: 12
      }
    },
    layout:{
      padding:{
        left: 10,
        right:0,
        bottom:0,
        top:0
      }
    },
    tooltips:{
      enabled:true
    }
  }
});