<div class="card">
    <div class="card-body">
        <div class="card-sub">
        </div>
        <table  class="table table-bordered"  border="1" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Santri</th>
                <th>Nis</th>
                <th>Penilaian</th>
                <th>Bobot Penilaian</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach($penilaian as $p): ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $p->santri->nama;  ?></td>
                    <td><?php echo $p->santri->nis;  ?></td>
                    <td><?php echo $p->kategori->nama;  ?></td>
                    <td><?php echo $p->kategori->bobot;  ?></td>
                    <td><?php echo $p->keterangan;  ?></td>
<?php $no++; ?>
<?php  endforeach;  ?>
            </tbody>
          </table>
</body>
</html>