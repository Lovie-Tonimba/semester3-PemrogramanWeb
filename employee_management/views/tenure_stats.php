<?php
include 'views/header.php';
$summary = $employeeModel->getTenureSummary();
$details = $employeeModel->getTenureDetails();

// Hitung total karyawan dan kategori
$total_employees_tenure = array_sum(array_column($summary, 'total_employees'));
?>

<h2>Statistik Masa Kerja Karyawan</h2>

<p style="margin-bottom: 2rem; color: #666;">
    Data statistik berikut diambil dari karyawan yang sudah dikategorikan berdasarkan lama bekerja.
</p>

<?php if (!empty($summary)): ?>
    <!-- Cards Summary -->
    <div class="dashboard-cards">
        <div class="card">
            <h3>Total Kategori</h3>
            <div class="number"><?php echo count($summary); ?></div>
        </div>
        <div class="card">
            <h3>Total Karyawan</h3>
            <div class="number"><?php echo $total_employees_tenure; ?></div>
        </div>
    </div>

    <!-- Detail karyawan per kategori -->
    <?php
    $grouped = [];
    foreach ($details as $d) {
        $grouped[$d['tenure_category']][] = $d;
    }
    ?>
    <?php foreach ($grouped as $category => $list): ?>
    <h3 style="margin-top:2rem;"><?php echo htmlspecialchars($category); ?></h3>
    <table class="data-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Departemen</th>
          <th>Jabatan</th>
          <th>Gaji</th>
          <th>Lama Bekerja</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($list as $emp): ?>
        <tr>
          <td><?php echo htmlspecialchars($emp['id']); ?></td>
          <td><?php echo htmlspecialchars($emp['full_name']); ?></td>
          <td><?php echo htmlspecialchars($emp['department']); ?></td>
          <td><?php echo htmlspecialchars($emp['position']); ?></td>
          <td>Rp <?php echo number_format($emp['salary'], 0, ',', '.'); ?></td>
          <td><?php echo $emp['years_of_service']; ?> tahun</td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php endforeach; ?>

    <!-- Visualisasi Jumlah Karyawan per Kategori -->
    <div style="margin-top: 3rem;">
        <h3>Visualisasi Data</h3>
        <div style="background: white; padding: 1.5rem; border-radius: 8px; margin: 1rem 0; border-left: 4px solid #27ae60;">
            <h4>Jumlah Karyawan per Kategori</h4>
            <?php foreach ($summary as $row): ?>
                <div style="margin: 0.5rem 0;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.25rem;">
                        <span><?php echo htmlspecialchars($row['tenure_category']); ?></span>
                        <span><?php echo $row['total_employees']; ?> orang</span>
                    </div>
                    <div style="background: #f0f0f0; border-radius: 4px; height: 20px;">
                        <div style="background: #27ae60; height: 100%; border-radius: 4px; width: <?php echo ($row['total_employees'] / max(array_column($summary, 'total_employees')) * 100); ?>%;"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php else: ?>
    <div style="text-align: center; padding: 3rem; background: #f8f9fa; border-radius: 8px;">
        <p style="font-size: 1.2rem; color: #666;"> Tidak ada data karyawan berdasarkan masa kerja.</p>
        <p style="color: #999;">Pastikan data karyawan sudah tersedia di database.</p>
        <a href="index.php?action=create" class="btn btn-primary" style="margin-top: 1rem;">Tambah Data Karyawan</a>
    </div>
<?php endif; ?>

<div style="margin-top: 2rem; padding: 1rem; background: #e7f3ff; border-radius: 5px;">
    <strong>Informasi:</strong>
    Halaman ini menggunakan data dari VIEW tambahan tenure_category dan tenure_details.
</div>

<?php include 'views/footer.php'; ?>