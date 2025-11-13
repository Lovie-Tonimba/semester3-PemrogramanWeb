<?php
include 'views/header.php';

// Ambil data overview dari model
$overview = $employeeModel->getEmployeeOverview();
$overview = $overview[0]; // karena view cuma menghasilkan 1 baris
?>

<h2>Ringkasan Karyawan</h2>

<p style="margin-bottom: 2rem; color: #666;">
    Ringkasan ini menampilkan total karyawan, total gaji per bulan, dan rata-rata masa kerja.
</p>

<div class="dashboard-cards" style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2rem;">
    <div class="card" style="flex: 1 1 200px; background: #f5f5f5; padding: 1rem; border-radius: 8px; text-align: center;">
        <h3>Total Karyawan</h3>
        <div class="number" style="font-size: 1.5rem; font-weight: bold; color: #667eea;">
            <?php echo $overview['total_employees']; ?>
        </div>
    </div>

    <div class="card" style="flex: 1 1 200px; background: #f5f5f5; padding: 1rem; border-radius: 8px; text-align: center;">
        <h3>Total Gaji Per Bulan</h3>
        <div class="number" style="font-size: 1.5rem; font-weight: bold; color: #667eea;">
            Rp <?php echo number_format($overview['total_salary'], 0, ',', '.'); ?>
        </div>
    </div>

    <div class="card" style="flex: 1 1 200px; background: #f5f5f5; padding: 1rem; border-radius: 8px; text-align: center;">
        <h3>Rata-rata Masa Kerja</h3>
        <div class="number" style="font-size: 1.5rem; font-weight: bold; color: #667eea;">
            <?php echo number_format($overview['avg_tenure_years'], 1); ?> tahun
        </div>
    </div>
</div>

<div style="margin-top: 2rem; padding: 1rem; background: #e7f3ff; border-radius: 5px;">
    <strong>Informasi:</strong> 
    Data ini diambil dari VIEW <code>employee_overview</code> di database PostgreSQL 
    yang menggunakan fungsi agregat <code>COUNT()</code>, <code>SUM()</code>, dan <code>AVG()</code>.
</div>

<?php include 'views/footer.php'; ?>