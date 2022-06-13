

function createChart(accepted, cancelled, request) {
    const date = new Date();

    const labels = [];

    for (let i = 1; i <= 7; i++) {
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

fetch('http://test.mydomain.com/Appointment-system/admin/getNextWeekData')
    .then(response => response.json())
    .then(json => {
        const accepted = json[0];
        const cancelled = json[1];
        const request = json[2];

        createChart(accepted, cancelled, request);

        return json;
    })