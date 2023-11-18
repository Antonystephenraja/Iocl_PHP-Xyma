<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title> IOCL DASHBOARD</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="d-flex justify-content-center">
                <img src="././Indian-Oil.png" alt="iocl logo" class="img-fluid mx-auto" style="width: 200px;">
            </div>
            <div class="sidebar-heading text-center py-4 primary-text fs-5 fw-bold text-uppercase border-bottom">INDIAN OIL</div>
                <div class="list-group list-group-flush my-1">
                    <a href="index.php" id="dashboardLink"  class="list-group-item list-group-item-action bg-transparent second-text active"><i
                            class="fas fa-tachometer-alt me-4"></i>DASHBOARD</a>
                    <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fa fa-lighr fa-chart-column me-4"></i>GRAPH</a>
                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-chart-line me-4"></i>REPORTS</a>
                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-thin fa-map-location-dot me-4"></i>MAP</a>
                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold border-bottom"><i
                            class="fas fa-shopping-cart me-4"></i>SETTING</a>
                    <div class="d-flex justify-content-start ">
                            <img src="Assets\images\xyma.png" alt="logo" class="img-fluid" style="width: 150px; margin-left: 20px;">
                    </div>
                    <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                            class="fas fa-power-off me-4"></i>Logout</a>         
                </div>
            </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Graph</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>STEPHEN
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="row g-3 my-2">
                <div class="row g-3 my-2">
                    <div class="col-12">
                        <div class="chart p-3 shadow-sm d-flex justify-content-start align-items-center rounded">
                            <div>
                                <h4>GRAPH</h4>
                                <canvas id="myChart" style="width: 2000px; max-width: 100%; max-height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn ms-3" id="limitButton100">100 Data</button>
                        <button class="btn ms-3" id="limitButton300">300 Data</button>
                        <button class="btn ms-3" id="limitButton500">500 Data</button>
                        <button class="btn ms-3" id="limitButton1000">1000 Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
   const ctx = document.getElementById('myChart');
    const url = "http://localhost/iocl/Database/alldata.php";
    let sensor1val = [];
    let time = [];
    let mychart;

    var last10Sensor1Val;
    var last10Time;
    
    async function getChartData() {
        const response = await fetch(url);
        const data = await response.json();

        sensor1val = [];
        time = [];

        for (let index = 0; index < data.length; index++) {
            sensor1val[index] = data[index].temperature;
            time[index] = data[index].timestamp;
        }

        last10Sensor1Val = sensor1val.slice(-5000);
        last10Time = time.slice(-5000);

        if (mychart) {
            mychart.data.labels = last10Time;
            mychart.data.datasets[0].data = last10Sensor1Val;
            mychart.update();
        } else {
            mychart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: last10Time,
                    datasets: [{
                        label: 'sensor1',
                        data: last10Sensor1Val,
                        borderWidth: 1,
                        borderColor: '#BF2098'
                    }]
                },
                options: {}
            });
        }
    }

    document.getElementById("limitButton100").addEventListener("click", function () {
        const last5Sensor1Val = sensor1val.slice(-100);
        const last5Time = time.slice(-100);

        mychart.data.labels = last5Time;
        mychart.data.datasets[0].data = last5Sensor1Val;
        mychart.update();
    });

    getChartData();
    //  setInterval(getChartData, 1000);
</script> 


    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>