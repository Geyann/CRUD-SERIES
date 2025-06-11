<?php
include 'connect.php';

$sql = "SELECT gender, COUNT(*) AS count FROM seriescrud GROUP BY gender";
$result = mysqli_query($con, $sql);
$genderLabels = [];
$genderCounts = [];
while ($row = mysqli_fetch_assoc($result)) {
    $genderLabels[] = ucfirst($row['gender']); 
    $genderCounts[] = $row['count'];
}

$sql = "SELECT place, COUNT(*) AS count FROM seriescrud GROUP BY place";
$result = mysqli_query($con, $sql);

$placeLabels = [];
$placeCounts = [];

while ($row = mysqli_fetch_assoc($result)) {
    $placeLabels[] = ucwords($row['place']);
    $placeCounts[] = $row['count'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pie Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            margin: 2rem;
            background-color:#2c2c2c;
        }

        .main-container {
            display: flex;
        }

        .charts-column {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 2rem;
        }

        .chart-container {
            width: 350px;
            margin-bottom: 3rem;
        }

        .legend-column {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .card {
            width: 250px;
            background: rgb(44, 44, 44);
            font-family: "Courier New", Courier, monospace;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            overflow: hidden;
        }

        .card__title {
            color: white;
            font-weight: bold;
            padding: 5px 10px;
            border-bottom: 1px solid rgb(167, 159, 159);
            font-size: 0.95rem;
        }

        .card__data {
            font-size: 0.8rem;
            display: flex;
            justify-content: space-between;
            border-right: 1px solid rgb(203, 203, 203);
            border-left: 1px solid rgb(203, 203, 203);
            border-bottom: 1px solid rgb(203, 203, 203);
        }

        .card__right {
            width: 60%;
            border-right: 1px solid rgb(203, 203, 203);
        }

        .card__left {
            width: 40%;
            text-align: end;
        }

        .item {
            padding: 3px 0;
            background-color: white;
        }

        .card__right .item {
            padding-left: 0.8em;
        }

        .card__left .item {
            padding-right: 0.8em;
        }

        .item:nth-child(even) {
            background: rgb(234, 235, 234);
        }

        .legend-box {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .legend-item {
            display: flex;
            flex-direction: column;
        }

        .legend-color {
            display: none;
        }
    </style>
</head>
<body>

<div class="main-container">
    <div class="charts-column">
        <div class="chart-container">
            <canvas id="genderChart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="placeChart"></canvas>
        </div>
    </div>
    <div class="legend-column">
        <div class="legend-box" id="genderLegend"></div>
        <div class="legend-box" id="placeLegend"></div>
    </div>
</div>

<script>
    Chart.register(ChartDataLabels);

    const genderLabels = <?php echo json_encode($genderLabels); ?>;
    const genderCounts = <?php echo json_encode($genderCounts); ?>;
    const genderColors = ['#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0'];

    const placeLabels = <?php echo json_encode($placeLabels); ?>;
    const placeCounts = <?php echo json_encode($placeCounts); ?>;
    const placeColors = ['blue', 'red', 'green', 'yellow', 'violet'];

    // Gender Chart
    const genderCtx = document.getElementById('genderChart').getContext('2d');
    new Chart(genderCtx, {
        type: 'pie',
        data: {
            labels: genderLabels,
            datasets: [{
                data: genderCounts,
                backgroundColor: genderColors
            }]
        },
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (value, context) => {
                        const data = context.chart.data.datasets[0].data.map(Number);
                        const total = data.reduce((a, b) => a + b, 0);
                        return ((value / total) * 100).toFixed(1) + "%";
                    },
                    color: '#000',
                    font: {
                        weight: 'bold',
                        size: 14
                    },
                    align: 'start',
                    anchor: 'end',
                    offset: 20
                },
                legend: { display: false }
            }
        }
    });

    // Place Chart
    const placeCtx = document.getElementById('placeChart').getContext('2d');
    new Chart(placeCtx, {
        type: 'pie',
        data: {
            labels: placeLabels,
            datasets: [{
                data: placeCounts,
                backgroundColor: placeColors
            }]
        },
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (value, context) => {
                        const data = context.chart.data.datasets[0].data.map(Number);
                        const total = data.reduce((a, b) => a + b, 0);
                        return ((value / total) * 100).toFixed(1) + "%";
                    },
                    color: '#000',
                    font: {
                        weight: 'bold',
                        size: 14
                    },
                    align: 'start',
                    anchor: 'end',
                    offset: 20
                },
                legend: { display: false }
            }
        }
    });

    // Create card-style legend
    function createLegend(containerId, labels, values, title = "") {
        const container = document.getElementById(containerId);

        const card = document.createElement('div');
        card.className = 'card';

        const cardTitle = document.createElement('div');
        cardTitle.className = 'card__title';
        cardTitle.textContent = title;

        const dataContainer = document.createElement('div');
        dataContainer.className = 'card__data';

        const rightCol = document.createElement('div');
        rightCol.className = 'card__right';

        const leftCol = document.createElement('div');
        leftCol.className = 'card__left';

        labels.forEach((label, index) => {
            const labelItem = document.createElement('div');
            labelItem.className = 'item';
            labelItem.textContent = label;
            rightCol.appendChild(labelItem);

            const valueItem = document.createElement('div');
            valueItem.className = 'item';
            valueItem.textContent = values[index];
            leftCol.appendChild(valueItem);
        });

        dataContainer.appendChild(rightCol);
        dataContainer.appendChild(leftCol);

        card.appendChild(cardTitle);
        card.appendChild(dataContainer);

        container.appendChild(card);
    }

    createLegend('genderLegend', genderLabels, genderCounts, 'Gender Breakdown');
    createLegend('placeLegend', placeLabels, placeCounts, 'Place Breakdown');
</script>

</body>
</html>