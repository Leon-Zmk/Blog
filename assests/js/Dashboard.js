$('.counter-up').counterUp({
    delay:50,
    time: 1500
});
function go(url){
    setTimeout (function(){
        location.href=`${url}`
    },1000)
}
let Label=['jul 21','jul 20','jul 19','jul 18','jul 17','jul 16','jul 15','jul 14','jul 13','jul 12','jul 11']
let Order=[9,5,6,4,6,4,8,6,8,9,6]
let Viewer=[13,12,15,14,20,17,19,16,23,33,16]
var ctx = document.getElementById('ov').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:Label,
        datasets: [{
            label: 'Order',
            data:Order,
            backgroundColor: [
               '#007bff30'
            
            ],
            borderColor: [
               '#007bff',
               
            ],
            borderWidth: 1,
            tension:0
        },{
            label: 'Viewer',
            data:Viewer,
            backgroundColor: [
               '#28a74530'
            
            ],
            borderColor: [
               '#28a745',
               
            ],
            borderWidth: 1,
            tension:0
        }]
    },
    options: {
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes:[
                {
                    display:false,
                    gridLines:{
                        display:false
                    }
                }
            ]
        },legend:{
            display:true,
            position:'top',
            labels:{
                fontcolor:'#333',
                usePointStyle:true
            }
        }
    }
});

let dplaces=['MDY','MM','YGN','NPT',"BG"]
let dorder=[3,5,6,4,5]
var op = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(op, {
    type: 'doughnut',
    data: {
        labels:dplaces,
        datasets: [{
            label: 'Places and Order',
            data: dorder,
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
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
             xAxes:[
                {
                    display:false,
                    gridLines:{
                        display:false
                    }
                }
            ]
        },legend:{
            display:true,
            position:'bottom',
            labels:{
                fontcolor:'#333',
                usePointStyle:true
            }
        }
    }
});
