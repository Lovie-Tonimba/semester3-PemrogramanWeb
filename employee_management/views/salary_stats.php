<?php
/**
 * File: views/salary_stats.php
 * Sumber Data: VIEW department_stats
 * Fungsi: AVG(), MAX(), MIN()
 */
include 'views/header.php';
?>

<h2>Statistik Gaji Karyawan</h2>

<p style="margin-bottom: 2rem; color: #666;">
    Data berikut diambil dari VIEW <code>department_stats</code> di database PostgreSQL.
</p>

<?php if ($stats->rowCount() > 0): ?>
    <?php
        $all_stats = $stats->fetchAll(PDO::FETCH_ASSOC);
        // Hitung statistik global
        $total_employees = array_sum(array_column($all_stats, 'total_employees'));
        $total_salary_budget = array_sum(array_column($all_stats, 'total_salary_budget'));
        $avg_all = $total_salary_budget / $total_employees;

        $max_all = max(array_column($all_stats, 'max_salary'));
        $min_all = min(array_column($all_stats, 'min_salary'));
    ?>

    <!-- Summary Cards -->
    <div class="dashboard-cards">
        <div class="card">
            <h3>Rata-rata Gaji (Keseluruhan)</h3>
            <div class="number">Rp <?php echo number_format($avg_all, 0, ',', '.'); ?></div>
        </div>
        <div class="card">
            <h3>Gaji Tertinggi (Keseluruhan)</h3>
            <div class="number">Rp <?php echo number_format($max_all, 0, ',', '.'); ?></div>
        </div>
        <div class="card">
            <h3>Gaji Terendah (Keseluruhan)</h3>
            <div class="number">Rp <?php echo number_format($min_all, 0, ',', '.'); ?></div>
        </div>
    </div>

    <!-- Table -->
    <table class="data-table">
        <thead>
            <tr>
                <th>Departemen</th>
                <th>Rata-rata Gaji</th>
                <th>Gaji Tertinggi</th>
                <th>Gaji Terendah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($all_stats as $dept): ?>
            <tr>
                <td><strong><?php echo htmlspecialchars($dept['department']); ?></strong></td>
                <td>Rp <?php echo number_format($dept['avg_salary'], 0, ',', '.'); ?></td>
                <td style="color: #27ae60;">Rp <?php echo number_format($dept['max_salary'], 0, ',', '.'); ?></td>
                <td style="color: #e74c3c;">Rp <?php echo number_format($dept['min_salary'], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Simple Visualization -->
    <div style="margin-top: 3rem;">
        <h3>Visualisasi: Rata-rata Gaji per Departemen</h3>
        <?php $max_avg = max(array_column($all_stats, 'avg_salary')); ?>
        <?php foreach ($all_stats as $dept): ?>
            <div style="margin: 0.75rem 0;">
                <div style="display: flex; justify-content: space-between;">
                    <span><?php echo htmlspecialchars($dept['department']); ?></span>
                    <span>Rp <?php echo number_format($dept['avg_salary'], 0, ',', '.'); ?></span>
                </div>
                <div style="background: #f0f0f0; border-radius: 4px; height: 20px;">
                    <div style="background: #667eea; height: 100%; border-radius: 4px; width: <?php echo ($dept['avg_salary'] / $max_avg * 100); ?>%;"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php else: ?>
    <div style="text-align: center; padding: 3rem; background: #f8f9fa; border-radius: 8px;">
        <p style="font-size: 1.2rem; color: #666;">Tidak ada data statistik gaji.</p>
        <p style="color: #999;">Pastikan VIEW <code>department_stats</code> telah dibuat di database dan data karyawan tersedia.</p>
    </div>
<?php endif; ?>

<div style="margin-top: 2rem; padding: 1rem; background: #e7f3ff; border-radius: 5px;">
    <strong>Informasi:</strong>
    Halaman ini menggunakan data dari VIEW <code>department_stats</code> dengan fungsi agregat
    <code>AVG()</code>, <code>MAX()</code>, <code>MIN()</code>, dan <code>GROUP BY department</code>.
</div>

<?php include 'views/footer.php'; ?>