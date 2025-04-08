<div class="page-wrapper">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Stat Widgets -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card stat-card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-gradient-primary text-white rounded-circle p-3 me-3">
                                <i class="pe-7s-cash fs-4"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number fw-bold mb-1">
                                    <?php
                                    if (!empty($totalprice)) {
                                        foreach ($totalprice as $order) {
                                            $total = $order['total'] !== null ? $order['total'] : 0;
                                            echo number_format($total, 0, ',', '.') . ' đ';
                                        }
                                    } else {
                                        echo '0 đ';
                                    }
                                    ?>
                                </h3>
                                <p class="stat-label text-muted mb-0">Doanh thu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card stat-card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-gradient-success text-white rounded-circle p-3 me-3">
                                <i class="pe-7s-cart fs-4"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number fw-bold mb-1">
                                    <?php
                                    if (!empty($totalorder)) {
                                        foreach ($totalorder as $order) {
                                            echo $order['total'];
                                        }
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </h3>
                                <p class="stat-label text-muted mb-0">Đơn hàng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card stat-card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-gradient-info text-white rounded-circle p-3 me-3">
                                <i class="pe-7s-browser fs-4"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number fw-bold mb-1">
                                    <?php
                                    if (!empty($totalproduct)) {
                                        foreach ($totalproduct as $product) {
                                            echo $product['total'];
                                        }
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </h3>
                                <p class="stat-label text-muted mb-0">Sản phẩm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card stat-card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-gradient-warning text-white rounded-circle p-3 me-3">
                                <i class="pe-7s-users fs-4"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number fw-bold mb-1">
                                    <?php
                                    if (!empty($totaluser)) {
                                        foreach ($totaluser as $user) {
                                            echo $user['total'];
                                        }
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </h3>
                                <p class="stat-label text-muted mb-0">Tài khoản</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Stat Widgets -->

        <!-- Revenue Charts -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="card-title mb-0 fw-bold">Thống kê doanh thu</h5>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-body">
                                <!-- Chart tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom" id="chartTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="monthly-tab" data-bs-toggle="tab" data-bs-target="#monthlyChart" type="button" role="tab" aria-controls="monthlyChart" aria-selected="true">Theo tháng</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="daily-tab" data-bs-toggle="tab" data-bs-target="#dailyChart" type="button" role="tab" aria-controls="dailyChart" aria-selected="false">Theo ngày</button>
                                    </li>
                                </ul>
                                
                                <div class="tab-content mt-4" id="chartTabContent">
                                    <div class="tab-pane fade show active" id="monthlyChart" role="tabpanel" aria-labelledby="monthly-tab">
                                        <canvas id="monthlyChartCanvas" height="300"></canvas>
                                    </div>
                                    <div class="tab-pane fade" id="dailyChart" role="tabpanel" aria-labelledby="daily-tab">
                                        <canvas id="dailyChartCanvas" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card-body border-start">
                                <!-- Daily stats -->
                                <div class="daily-stats mb-4">
                                    <h6 class="text-uppercase fw-bold mb-3">Thống kê hôm nay</h6>
                                    <div class="stat-item py-2 border-bottom">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="stat-label">Đơn hàng mới:</span>
                                            <div class="text-end">
                                                <strong><?php echo isset($today_orders) ? $today_orders : 0; ?></strong>
                                                <?php if (isset($yesterday_orders)): ?>
                                                    <div class="small comparison <?php echo ($today_orders > $yesterday_orders) ? 'text-success' : 'text-danger'; ?>">
                                                        <i class="pe-7s-<?php echo ($today_orders > $yesterday_orders) ? 'up' : 'down'; ?>-arrow me-1"></i>
                                                        <?php
                                                        $diff = $today_orders - $yesterday_orders;
                                                        echo ($diff >= 0 ? '+' : '') . $diff . ' so với hôm qua';
                                                        ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stat-item py-2 border-bottom">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="stat-label">Doanh thu:</span>
                                            <div class="text-end">
                                                <strong><?php echo isset($today_revenue) ? number_format($today_revenue, 0, ',', '.') . ' đ' : '0 đ'; ?></strong>
                                                <?php if (isset($yesterday_revenue)): ?>
                                                    <div class="small comparison <?php echo ($today_revenue > $yesterday_revenue) ? 'text-success' : 'text-danger'; ?>">
                                                        <i class="pe-7s-<?php echo ($today_revenue > $yesterday_revenue) ? 'up' : 'down'; ?>-arrow me-1"></i>
                                                        <?php
                                                        $diff = $today_revenue - $yesterday_revenue;
                                                        echo ($diff >= 0 ? '+' : '') . number_format($diff, 0, ',', '.') . ' đ so với hôm qua';
                                                        ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stat-item py-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="stat-label">Sản phẩm bán ra:</span>
                                            <div class="text-end">
                                                <strong><?php echo isset($today_products) ? $today_products : 0; ?></strong>
                                                <?php if (isset($yesterday_products)): ?>
                                                    <div class="small comparison <?php echo ($today_products > $yesterday_products) ? 'text-success' : 'text-danger'; ?>">
                                                        <i class="pe-7s-<?php echo ($today_products > $yesterday_products) ? 'up' : 'down'; ?>-arrow me-1"></i>
                                                        <?php
                                                        $diff = $today_products - $yesterday_products;
                                                        echo ($diff >= 0 ? '+' : '') . $diff . ' so với hôm qua';
                                                        ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Monthly stats -->
                                <div class="monthly-stats mt-4">
                                    <h6 class="text-uppercase fw-bold mb-3">Thống kê tháng này</h6>
                                    <div class="stat-item py-2 border-bottom">
                                        <div class="d-flex justify-content-between">
                                            <span class="stat-label">Tổng đơn hàng:</span>
                                            <strong><?php echo isset($month_orders) ? $month_orders : 0; ?></strong>
                                        </div>
                                    </div>
                                    <div class="stat-item py-2 border-bottom">
                                        <div class="d-flex justify-content-between">
                                            <span class="stat-label">Tổng doanh thu:</span>
                                            <strong><?php echo isset($month_revenue) ? number_format($month_revenue, 0, ',', '.') . ' đ' : '0 đ'; ?></strong>
                                        </div>
                                    </div>
                                    <div class="stat-item py-2">
                                        <div class="d-flex justify-content-between">
                                            <span class="stat-label">Tổng sản phẩm:</span>
                                            <strong><?php echo isset($month_products) ? $month_products : 0; ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Revenue Charts -->
    </div>
</div>

<!-- Add Bootstrap 5 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Custom CSS -->
<style>
    .stat-card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 10px;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
    }
    
    .bg-gradient-success {
        background: linear-gradient(45deg, #1cc88a, #13855c);
    }
    
    .bg-gradient-info {
        background: linear-gradient(45deg, #36b9cc, #258391);
    }
    
    .bg-gradient-warning {
        background: linear-gradient(45deg, #f6c23e, #dda20a);
    }
    
    .text-success {
        color: #1cc88a !important;
    }
    
    .text-danger {
        color: #e74a3b !important;
    }
    
    .nav-tabs-custom .nav-link {
        border: none;
        font-weight: 500;
        color: #5a5c69;
        padding: 0.75rem 1rem;
        position: relative;
    }
    
    .nav-tabs-custom .nav-link.active {
        color: #4e73df;
        background: none;
    }
    
    .nav-tabs-custom .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #4e73df;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
    
    .card-header {
        border-bottom: 1px solid rgba(0,0,0,.05);
    }
    
    .comparison {
        font-size: 0.75rem;
    }
</style>

<!-- Updated Chart.js Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Configure Chart.js defaults
    Chart.defaults.font.family = "'Nunito', 'Segoe UI', Arial, sans-serif";
    Chart.defaults.font.size = 12;
    Chart.defaults.color = '#5a5c69';
    
    // Monthly revenue data
    const monthlyData = {
        labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
        datasets: [{
            label: 'Doanh thu theo tháng',
            data: <?php echo json_encode($monthly_revenue ?? []); ?>,
            backgroundColor: 'rgba(78, 115, 223, 0.2)',
            borderColor: 'rgba(78, 115, 223, 1)',
            borderWidth: 2,
            borderRadius: 4,
            barThickness: 20
        }]
    };

    // Daily revenue data
    const dailyData = {
        labels: <?php echo json_encode($daily_labels ?? []); ?>,
        datasets: [{
            label: 'Doanh thu theo ngày',
            data: <?php echo json_encode($daily_revenue ?? []); ?>,
            backgroundColor: 'rgba(28, 200, 138, 0.2)',
            borderColor: 'rgba(28, 200, 138, 1)',
            borderWidth: 3,
            tension: 0.4,
            pointBackgroundColor: 'rgba(28, 200, 138, 1)',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 5,
            pointHoverRadius: 7
        }]
    };

    // Initialize monthly chart
    const monthlyCtx = document.getElementById('monthlyChartCanvas').getContext('2d');
    new Chart(monthlyCtx, {
        type: 'bar',
        data: monthlyData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND',
                                maximumFractionDigits: 0
                            }).format(value);
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#5a5c69',
                    bodyColor: '#5a5c69',
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1,
                    padding: 12,
                    boxPadding: 6,
                    usePointStyle: true,
                    callbacks: {
                        label: function(context) {
                            return new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND',
                                maximumFractionDigits: 0
                            }).format(context.raw);
                        }
                    }
                }
            }
        }
    });

    // Initialize daily chart
    const dailyCtx = document.getElementById('dailyChartCanvas').getContext('2d');
    new Chart(dailyCtx, {
        type: 'line',
        data: dailyData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND',
                                maximumFractionDigits: 0
                            }).format(value);
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#5a5c69',
                    bodyColor: '#5a5c69',
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1,
                    padding: 12,
                    boxPadding: 6,
                    usePointStyle: true,
                    callbacks: {
                        label: function(context) {
                            return new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND',
                                maximumFractionDigits: 0
                            }).format(context.raw);
                        }
                    }
                }
            }
        }
    });
});
</script>