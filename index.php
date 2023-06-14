<?php
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - DW AdventureWorks</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href=#>DW AdventureWorks</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Mondrian</div>

                        <a class="nav-link" href="cube.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Cube
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">DWO</div>
                    Adventureworks
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Biaya Purchasing </div>
                                                    <?php
                                                    $sql = "SELECT SUM(Biaya_purchasing) AS total_pembelian FROM fakta_vendor_biaya223";
                                                    $result = mysqli_query($connection, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $totalPembelian = $row['total_pembelian'];
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($totalPembelian); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Jumlah Produk</div>
                                                <?php
                                                    $sql = "SELECT SUM(ProductId) AS total_product FROM fakta_vendor_biaya223";
                                                    $result = mysqli_query($connection, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $totalHarga = $row['total_product'];
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($totalHarga); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total Sales</div>
                                                <?php
                                                    $sql = "SELECT COUNT(linetotal) AS total FROM fakta1";
                                                    $result = mysqli_query($connection, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $totalVendor = $row['total'];
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-danger"><?php echo $totalVendor; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <?php
                                                $sql = "SELECT COUNT(TerritoryID) AS total FROM dim_teritori";
                                                $result = mysqli_query($connection, $sql);
                                                $row = mysqli_fetch_assoc($result);
                                                $totalVendor = $row['total'];
                                                ?>
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Territory</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                            <strong>Jumlah:</strong> <?php echo $totalVendor; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Purchasing Cost Per Year
                                </div>
                                <div class="card-body">
                                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                        <?php
                                    // Assuming you have already established the database connection

                                    // Fetch the top categories from the database
                                    $sql = "select t.tahun as tahun ,sum(f.biaya_purchasing) as jumlah from fakta_vendor_biaya223 f join time12 t on (t.time_id=f.time_id) group by t.tahun order by t.tahun ";
                                    $result = mysqli_query($connection, $sql);

                                    $labels = array();
                                    $data = array();

                                    // Process the fetched data
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $labels[] = $row['tahun'];
                                        $data[] = $row['jumlah'];
                                    }

                                    ?>

                                    <!-- JavaScript code to generate the chart -->
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            // Generate chart using Chart.js
                                            var ctx = document.getElementById('myAreaChart').getContext('2d');
                                            var myAreaChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: <?php echo json_encode($labels); ?>,
                                                    datasets: [{
                                                        label: 'Number of Orders',
                                                        data: <?php echo json_encode($data); ?>,
                                                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                                                        borderColor: 'rgba(75, 192, 192, 1)',
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true,
                                                            precision: 0
                                                        }
                                                    }
                                                }
                                            });
                                        });
                                    </script>

                                     <!-- HTML code for the chart -->
                                     <div class="col-xl-6">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <i class="fas fa-chart-area me-1"></i>
                                                Top Vendors
                                            </div>
                                            <div class="card-body">
                                                <canvas id="myAreaChart2" width="100%" height="40"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
// Assuming you have already established the database connection

// Fetch the top vendors from the database
$sql = "SELECT dv.Name AS nama_vendor, COUNT(fvb.VendorID) as total_pembelian
        FROM fakta_vendor_biaya223 fvb
        JOIN dim_vendor dv ON dv.VendorID = fvb.VendorID
        GROUP BY dv.Name
        order by COUNT(fvb.VendorID)DESC
        LIMIT 5";
$result = mysqli_query($connection, $sql);

$labels = array();
$data = array();

// Process the fetched data
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['nama_vendor'];
    $data[] = $row['total_pembelian'];
}
?>

<!-- JavaScript code to generate the chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Generate chart using Chart.js
        var ctx = document.getElementById('myAreaChart2').getContext('2d');
        var myAreaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Total Purchases',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: 'rgba(0, 0, 500, 0.6)',
                    borderColor: 'rgba(0, 0, 500, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    });
</script>

<?php
// Assuming you have already established the database connection

// Fetch the top states from the database
$sql = "SELECT t.bulan as bulan, SUM(fvb.biaya_purchasing) as total
        FROM fakta_vendor_biaya223 fvb
        JOIN time12 t ON t.time_id  = fvb.time_id 
        where t.TAHUN='2002'
        GROUP BY t.bulan 
        order by SUM(fvb.biaya_purchasing)DESC
        LIMIT 5";
$result = mysqli_query($connection, $sql);

$labels = array();
$data = array();

// Process the fetched data
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['bulan'];
    $data[] = $row['total'];
}
?>

<!-- HTML code for the chart -->
<div class="col-xl-6">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-chart-pie me-1"></i>
            Purchasing Cost at 2002
        </div>
        <div class="card-body">
            <canvas id="myPieChart" width="100%" height="40"></canvas>
        </div>
    </div>
</div>

<!-- JavaScript code to generate the chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Generate chart using Chart.js
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Total Purchases',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: ['rgba(0, 123, 255, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(255, 205, 86, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(153, 102, 255, 0.6)'],
                    borderColor: ['rgba(0, 123, 255, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 205, 86, 1)', 'rgba(54, 162, 235, 1)', 'rgba(153, 102, 255, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Top States'
                    }
                }
            }
        });
    });
</script>
<?php
// Assuming you have already established the database connection

// Fetch the top cities based on the total amount of purchases
$sql = "SELECT dt.Name as name , SUM(f.linetotal) as total
        FROM fakta1 f
        JOIN dim_teritori dt ON dt.TerritoryID  = f.TerritoryID 
        join time12 t on T.time_id = F.time_id 
        where t.TAHUN='2003'
        GROUP BY dt.Name 
        order by SUM(f.linetotal)DESC
        LIMIT 5";
$result = mysqli_query($connection, $sql);

$labels = array();
$data = array();

// Process the fetched data
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['name'];
    $data[] = $row['total'];
}
?>

<!-- HTML code for the chart -->
<div class="col-xl-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Top 5 Territory Sales in 2003</h6>
        </div>
        <div class="card-body">
            <div class="chart-pie">
                <canvas id="pieChartAllTime"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript code to generate the chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Generate chart using Chart.js
        var ctx = document.getElementById('pieChartAllTime').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 205, 86, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    });
</script>

                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Line total terendah pada quarter pertama tahun 2004
                                </div>
                                <div class="card-body">
                                    <canvas id="myAreaChart4" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                        <?php
// Fetch the data from the database
$sql = "SELECT
        dt.group as kelompok,
        SUM(CASE
            WHEN t.bulan = 1 THEN f.linetotal 
            ELSE 0
        END) AS january_total,
        SUM(CASE
            WHEN t.bulan = 2 THEN f.linetotal
            ELSE 0
        END) AS february_total,
        SUM(CASE
            WHEN t.bulan = 3 THEN f.linetotal
            ELSE 0
        END) AS march_total
        FROM
        fakta1 f join dim_teritori dt on dt.TerritoryID = f.TerritoryID 
        join time12 t on t.time_id =f.time_id 
        WHERE
        t.tahun = 2004 AND
        t.bulan BETWEEN 1 AND 3
        GROUP BY
        dt.group;";
$result = mysqli_query($connection, $sql);

$labels = array();
$januaryData = array();
$februaryData = array();
$marchData = array();

// Process the fetched data
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['kelompok'];
    $januaryData[] = $row['january_total'];
    $februaryData[] = $row['february_total'];
    $marchData[] = $row['march_total'];
}

$labels_gr = json_encode($labels);
$januaryData_gr = json_encode($januaryData);
$februaryData_gr = json_encode($februaryData);
$marchData_gr = json_encode($marchData);
?>



<!-- JavaScript code to generate the chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        // Data hasil query
        var groupLabels = <?php echo $labels_gr; ?>;
        var januaryData = <?php echo $januari_total; ?>;
        var februaryData = <?php echo $februari_total; ?>;
        var marchData = <?php echo $march_total; ?>;

        // Buat chart batang dengan Chart.js
        var ctx = document.getElementById('myAreaChart4').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: groupLabels,
                datasets: [
                    {
                        label: 'January',
                        data: januaryData,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)' // Warna merah
                    },
                    {
                        label: 'February',
                        data: februaryData,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)' // Warna biru
                    },
                    {
                        label: 'March',
                        data: marchData,
                        backgroundColor: 'rgba(255, 206, 86, 0.5)' // Warna kuning
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>