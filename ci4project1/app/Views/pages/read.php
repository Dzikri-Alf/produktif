<?= $this->extend('/base'); ?>

<?= $this->section('content'); ?>
<?php
$db = \Config\Database::connect();
?>
<title>Read</title>
<!-- Container for demo purpose -->
<div class="container my-24 px-6 mx-auto">
  
  <!-- Section: Design Block -->
  <section class="mb-32 text-gray-800">
    <div class="flex flex-wrap">
      <div class="grow-0 shrink-0 basis-auto w-full md:w-2/12 lg:w-3/12">
        <img src="/img/img2.jpg" class="w-full shadow-lg rounded-lg mb-6"
          alt="" />
      </div>

      <div class="grow-0 shrink-0 basis-auto w-full md:w-10/12 lg:w-9/12 md:pl-6 text-center md:text-left">
        <h5 class="text-xl font-semibold mb-6">READ</h5>
        <div class="mb-6 flex space-x-4 justify-center md:justify-start">
          <p>Table : <i>users</i></p>
        </div>
        <section class="mb-32 text-gray-800 text-center">
        <!-- Section: Design Block -->
            <div class="grid gap-x-6 lg:gap-x-12 md:grid-cols-3">
            <?php
            $query = $db->query('SELECT * from users');
            $users = $query->getResult();
            foreach($users as $row) :
                $id = $row->id
            ?>
                <div class="mb-12 md:mb-0">
                    <h2 class="text-3xl font-bold display-5 text-blue-600 mb-4"><?= $row->id; ?></h2>
                    <h5 class="text-lg font-medium mb-4"><?= $row->nama; ?></h5>
                    <p class="text-gray-500">
                    <?= $row->alamat; ?>
                    </p><br>
                </div>
                <?php endforeach; ?>
            </div>
        <!-- Section: Design Block -->
        </section>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
  
</div>
<!-- Container for demo purpose -->
<?= $this->endSection('content'); ?>