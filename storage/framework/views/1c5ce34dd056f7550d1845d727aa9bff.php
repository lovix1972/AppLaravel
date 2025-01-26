<body class="bg-gray-100 ">
<nav class="bg-white shadow-md w-full ">
    <div class="container  px-4 sm:px-6 lg:px-8   ">
        <div class="flex items-left  h-16">
            <!-- Logo -->
            <div class="flex items-middle">

                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/CoA_mil_ITA_airmobile_bde_Friuli.png/190px-CoA_mil_ITA_airmobile_bde_Friuli.png" alt="Logo" class="h-10 w-10  inline-block">


            </div>
            <!-- Menu Desktop -->
            <div class="hidden md:flex space-x-9 z-20">
              <summary class="btn m-1"><a href="#" class="text-gray-800 hover:text-blue-600 transition">STRUMENTI</a></summary>
                <summary  class="btn m-1"><a href="#" class="text-gray-800 hover:text-blue-600 transition">CRUSCOTTO</a></summary>

                <details class="dropdown">
                    <summary class="btn m-1">GESTIONE FINANZIARIA</summary>
                    <ul class="menu dropdown-content rounded-box shadow-lg rounded-lg bg-white z-10">
                        <li><a href="#" class="text-gray-800 hover:text-blue-600 transition w-96 ">VALIDAZIONE</a></li>
                        <li><a href="#" class="text-gray-800 hover:text-blue-600 transition w-96">MOVIMENTI DI CASSA</a></li>
                        <li><a href="#" class="text-gray-800 hover:text-blue-600 transition w-96">GESTIONE NOTE</a></li>
                        <li><a href="#" class="text-gray-800 hover:text-blue-600 transition w-96">FONDO ECONOMALE</a></li>
                        <div class="border-t border-gray-200 "></div>
                        <li><a href="#" class="text-gray-800 hover:text-blue-600 transition w-96 ">PREAVVISI</a></li>

                    </ul>
                </details>

                <summary  class="btn m-1"><a href="#" class="text-gray-800 hover:text-blue-600 transition">STRUMENTI</a></summary>
                <summary  class="btn m-1"><a href="#" class="text-gray-800 hover:text-blue-600 transition ">STRUMENTI</a></summary>
                <summary  class="btn m-1"><a href="#" class="text-gray-800 hover:text-blue-600 transition">LOGOUT</a></summary>

            </div>
            <!-- Menu Mobile Icon -->
            <div class="md:hidden">
                <button id="menuButton" class="text-gray-800 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Menu Mobile -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200">
        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 hover:text-blue-600">Home</a>
        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 hover:text-blue-600">About</a>
        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 hover:text-blue-600">Services</a>
        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 hover:text-blue-600">Contact</a>
    </div>
</nav>

<script>
    // Gestione del menu mobile
    document.getElementById('menuButton').addEventListener('click', function () {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    });
</script>
<?php /**PATH D:\AppLaravel\resources\views/partials/navbar.blade.php ENDPATH**/ ?>