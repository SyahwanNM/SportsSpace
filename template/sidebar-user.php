<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    

</head>
<style>
   body {
      font-family: 'Plus Jakarta Sans', sans-serif;
   }
</style>
<body>
   <aside id="logo-sidebar" class="fixed top-0 left-6 z-40 w-64 h-[87vh] pt-20 transition-transform -translate-x-full bg-white border-r sm:translate-x-0" aria-label="Sidebar">
         <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 text-sm">
               <li>
                  <a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-red-700 hover:text-white group bg-red-700">
                     <i class="fi fi-rs-home">
                     </i>
                     <span class="ms-3">Dashboard</span>
                  </a>
               </li>
   
               <li>
                  <a href="/komunitas/komunitas.html" class="flex items-center w-full p-2 text-base text-black hover:bg-red-600 hover:bg-red-600 hover:text-white duration-75 rounded-lg group" 
                     aria-controls="dropdown-example" 
                     data-collapse-toggle="dropdown-example">
                     <i class="fi fi-rs-users-alt"></i>   
                     <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Community</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                     </svg>
                  </a>
                  <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-black hover:bg-red-600 transition duration-75 rounded-lg pl-11">My Community</a>
                        </li>
                        <li>
                           <a href="/komunitas/addKomunitas.html" class="flex items-center w-full p-2 text-black hover:bg-red-600 hover:text-white transition duration-75 rounded-lg pl-11">Add Community</a>
                        </li>
                  </ul>
               </li>
               
               <script>
                  document.addEventListener('DOMContentLoaded', () => {
                     const menuButton = document.querySelector('[data-collapse-toggle="dropdown-example"]');
                     const submenu = document.getElementById('dropdown-example');
                     const dropdownIcon = menuButton.querySelector('svg');
               
                     // Klik pada menu utama (bukan ikon dropdown) akan membuka halaman
                     menuButton.addEventListener('click', (event) => {
                        if (event.target === dropdownIcon || dropdownIcon.contains(event.target)) {
                           event.preventDefault(); // Hanya cegah navigasi jika ikon diklik
                           submenu.classList.toggle('hidden');
                        }
                     });
               
                     // Cegah submenu menutup ketika salah satu opsinya diklik
                     submenu.addEventListener('click', (event) => {
                        event.stopPropagation(); // Hindari penutupan submenu
                     });
                  });
               </script>
               
               
      
                  <a href="/fields/fields.html" class="flex items-center p-2 text-black rounded-lg hover:bg-red-600 hover:text-white group">
                     <i class="fi fi-rs-court-sport">
                     </i>
                     <span class="flex-1 ms-3 whitespace-nowrap">Field</span>
                  </a>
               </li>
               <li>
                  <a href="#" class="flex items-center p-2 text-black rounded-lg hover:bg-red-600 hover:text-white group">
                     <i class="fi fi-rs-trophy-star"></i>
                     </i>
                     <span class="flex-1 ms-3 whitespace-nowrap">Reward</span>
                  </a>
               </li>
               <li>
                  <a href="/sports-group/sports-group.html" class="flex items-center p-2 text-black rounded-lg hover:bg-red-600 hover:text-white group">
                     <i class="fi fi-rs-two-swords"></i>
                     <span class="flex-1 ms-3 whitespace-nowrap">Sports Group</span>
                  </a>
               </li>
               <li>
                  <a href="/profile/profile.html" class="flex items-center p-2 text-black rounded-lg hover:bg-red-600 hover:text-white group">
                     <i class="fi fi-rs-user">
                     </i>
                     <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                  </a>
               </li>
            </ul>
         </div>
      </aside>
</body>
</html>


