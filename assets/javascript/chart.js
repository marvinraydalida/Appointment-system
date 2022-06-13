const date = new Date();

const labels = [];

for(let i = 0; i < 7; i++){
    labels.push(`${date.getMonth() + 1}/${date.getDate() + i}/` + `${date.getFullYear()}`.slice(-2));
}



const backgroundColor = [
    'rgba(75, 192, 192, 0.2)',
    'rgba(255, 205, 86, 0.2)',
    'rgba(255, 99, 132, 0.2)',
];

const borderColor = [
    'rgb(75, 192, 192)',
    'rgb(255, 205, 86)',
    'rgb(255, 99, 132)',
];

let accepted = [65, 59, 75, 75, 23, 23, 24];
let request = [14, 52, 45, 53, 23, 23, 27];
let cancelled = [3, 9, 10, 15, 13, 21, 38];

const data = {
    labels: labels,
    datasets: [{
        label: 'Accepted',
        data: accepted,
        backgroundColor: ['rgba(75, 192, 192, 0.2)'],
        borderColor: ['rgb(75, 192, 192)'],
        borderWidth: 1
    },
    {
        label: 'Request',
        data: request,
        backgroundColor: ['rgba(255, 205, 86, 0.2)'],
        borderColor: ['rgb(255, 205, 86)'],
        borderWidth: 1
    },
    {
        label: 'Cancelled',
        data: cancelled,
        backgroundColor: ['rgba(255, 99, 132, 0.2)'],
        borderColor: ['rgb(255, 99, 132)'],
        borderWidth: 1
    }]
};


const config = {
    type: 'bar',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'APPOINTMENT ANALYTICS',
            }
        }
    },
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);