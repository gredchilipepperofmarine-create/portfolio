const ctx = document.getElementById('skillChart');

const data = {
  labels: [
    'HTML',
    'CSS',
    'Javascript',
    'PHP',
    'Mysql'
  ],
  datasets: [{
    label: 'Skill Level',
    data: [90, 90, 70, 60, 60],
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgb(255, 99, 132)',
    pointBackgroundColor: 'rgb(255, 99, 132)',
    pointBorderColor: '#fff',
    pointHoverBackgroundColor: '#fff',
    pointHoverBorderColor: 'rgb(255, 99, 132)'
  }]
};


new Chart(ctx, {
 type: 'radar',
  data: data,
  options: {
    scales: {
      r: {
        min: 0,
        max: 100,
        ticks: {
          stepSize: 20
        }
      }
    }
  }
})