

function createChart(accepted, cancelled, request, labels) {

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
}

function createPieChart(accepted, cancelled, empty = 0) {
    if(accepted === 0 && cancelled === 0) empty = 1;
    const data = {
        labels: [
            'Accepted',
            'Cancelled',
        ],
        datasets: [{
            data: [accepted, cancelled, empty],
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgb(255, 99, 132)',
                'rgb(245, 245, 245)'
            ],
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {
            rotation: 180,
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'TODAY\'S APPOINTMENT',
                }
            }
        },
    }

    const myChart = new Chart(
        document.getElementById('doughnutChart'),
        config
    );
}

fetch('http://test.mydomain.com/Appointment-system/admin/getNextWeekData')
    .then(response => response.json())
    .then(json => {
        const accepted = json[1];
        const cancelled = json[2];
        const request = json[3];
        const labels = json[4];

        createChart(accepted, cancelled, request, labels);
        createPieChart(json[0][0], json[0][1]);

        return json;
    })