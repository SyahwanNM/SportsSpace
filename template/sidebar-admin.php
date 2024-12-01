<?php
$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/sportsspace/admin"; // Sesuaikan '/project/admin' dengan folder root Anda
?>
<main class="pt-20"> <!-- Add padding-top to prevent content being hidden behind the header -->
        <!-- Your page content here -->
    </main>
</body>

   <div class="flex">
    <!-- Sidebar -->
      <div class="w-1/5">
         <div class="font-plusjakartasans fixed bg-white h-screen p-10 bg-white rounded-lg shadow mt-4">
            <nav>
               <ul>
                  <li class="mb-4">
                     <a class="flex items-center text-black hover:text-white hover:bg-red-700 p-2 rounded-lg" href="<?=$base_url?>/index.php">
                        <i class="fi fi-rs-home mr-2"></i>Dashboard
                     </a>
                  </li>
                  <li class="mb-4">
                     <a class="flex items-center text-black hover:text-white hover:bg-red-700 p-2 rounded-lg" href="<?=$base_url?>/community/index.php">
                        <i class="fi fi-rs-users-alt mr-2"></i>Community
                     </a>
                  </li>
                  
                  <li class="mb-4">
                     <a class="flex items-center text-black hover:text-white hover:bg-red-700 p-2 rounded-lg" href="#">
                        <i class="fi fi-rs-court-sport mr-2"></i>Field
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
    <!-- Main Content -->
      <div class="w-4/5 p-3 mt-4">