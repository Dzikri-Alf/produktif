<?= $this->extend('/base'); ?>

<?= $this->section('content'); ?>
<title>Delete</title>
<?php
$db = \Config\Database::connect();
?>
<!-- Container for demo purpose -->
<div class="container my-24 px-6 mx-auto">

  <!-- Section: Design Block -->
  <section class="mb-32 text-gray-800">
    <div class="flex justify-center">
      <div class="text-center max-w-[700px]">
        <p class="uppercase text-blue-600 font-bold mb-6">Delete</p>
        <h2 class="text-3xl font-bold mb-6">All user</h2>
      </div>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-x-6 xl:gap-x-12">
    <?php
    $query = $db->query('SELECT * from users');
    $users = $query->getResult();
    foreach($users as $row) :
        $id = $row->id
    ?>
    <div class="mb-12">
        <div class="flex">
          <div class="shrink-0 mt-1">
            <svg class="w-4 h-4 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="currentColor"
                d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
              </path>
            </svg>
          </div>
          <div class="grow ml-4">
            <p class="font-bold mb-1"><?= $row->nama; ?></p>
            <p class="text-gray-500"><?= $row->alamat; ?></p>
          </div>
          <form action="forDelete" method="post">
            <button type="submit" name="subject" value="<?= $id; ?>" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>   
          </form>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>
  <!-- Section: Design Block -->

</div>
<!-- Container for demo purpose -->
<?= $this->endSection('content'); ?>