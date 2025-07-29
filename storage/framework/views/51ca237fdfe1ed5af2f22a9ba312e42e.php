<nav id="main-navbar" class="fixed top-0 left-0 w-full z-50 bg-white shadow-md ">

<header class='flex shadow-md py-4 px-4 sm:px-10 bg-blue-600 font-[sans-serif] min-h-[70px] tracking-wide relative z-50'>
    <body class="pt-16">
    <div class='flex flex-wrap items-center justify-between gap-5 w-full'>
        <a href="#" class="max-sm:hidden"><img src="https://upload.wikimedia.org/wikipedia/commons/2/24/CoA_mil_ITA_airmobile_bde_Friuli.png" alt="logo" class='w-10' /></a>
        <a href="#" class="hidden max-sm:block"><img src="https://upload.wikimedia.org/wikipedia/commons/2/24/CoA_mil_ITA_airmobile_bde_Friuli.png" alt="logo" class='w-9' /></a>
        <div class="text-blue-100 absolute flex left-20 font-semibold">BRIGATA AEROMOBILE FRIULI</div>
        <div id="collapseMenu"
             class='max-lg:hidden lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50'>
            <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white w-9 h-9 flex items-center justify-center border'>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 fill-black" viewBox="0 0 320.591 320.591">
                    <path
                            d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                            data-original="#000000"></path>
                    <path
                            d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                            data-original="#000000"></path>
                </svg>
            </button>

<?php if(auth()->guard()->check()): ?>
            <ul
                    class='lg:flex gap-x-5 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
                <li class='mb-6 hidden max-lg:block'>
                    <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/2/24/CoA_mil_ITA_airmobile_bde_Friuli.png" alt="logo" class='w-36' />
                    </a>
                </li>
                <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'>
                    <a href='/dashboard'
                       class='navbar-link text-yellow-600 hover:text-yellow-500'>Dashboard</a>
                </li>

                    <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'><a href='/inspds'
                                                                                class='navbar-link text-yellow-600 hover:text-yellow-500'>Acquisizioni</a>
                </li>
                <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'><a href='#'
                                                                                class='navbar-link text-yellow-600 hover:text-yellow-500'>Gestione Finanziaria</a>
                </li>
                <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'><a href='javascript:void(0)'
                                                                                class='navbar-link text-yellow-600 hover:text-yellow-500'>Movimenti di Cassa</a>
                </li>
                <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'><a href='#'
                                                                                class='navbar-link text-yellow-600 hover:text-yellow-500'>Gestione Note</a>
                </li>
                <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'><a href='/reglist'
                                                                                class='navbar-link text-yellow-600 hover:text-yellow-500'>Registro</a>
                </li>

            </ul>

        </div>

        <div class='flex max-lg:ml-auto space-x-4'>
            <a href="/logout"><button
                        class='navbar-link px-4 py-2 text-sm rounded-full font-bold text-amber-50 border-2 bg-transparent hover:bg-gray-50 transition-all ease-in-out duration-300'>Logout</button></a>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
            <a href="/login"><button
                    class='navbar-link px-4 py-2 text-sm rounded-full font-bold text-amber-50 border-2 bg-transparent hover:bg-gray-50 transition-all ease-in-out duration-300'>Login</button></a>
                <a href="/register"><button
                            class='navbar-link px-4 py-2 text-sm rounded-full font-bold text-white border-2 border-[#007bff] bg-[#007bff] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff]'>Registrati</button></a>

            <button id="toggleOpen" class='lg:hidden'>
                <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <?php endif; ?>
        </div>
    </div>
    </body>
</header>

</nav>

<script>
    
 
    document.addEventListener('DOMContentLoaded', function() {
        // --- Funzionalità Navbar (Highlight attivo e Menu Mobile) ---
        const navbarLinks = document.querySelectorAll('.navbar-link');
        const toggleOpen = document.getElementById('toggleOpen');
        const toggleClose = document.getElementById('toggleClose');
        const collapseMenu = document.getElementById('collapseMenu');

        function highlightActiveLink() {
        const currentPath = window.location.pathname;
        // Normalizza il percorso URL rimuovendo la slash finale se presente (tranne per la root "/")
        const normalizedCurrentPath = (currentPath.endsWith('/') && currentPath.length > 1)
        ? currentPath.slice(0, -1)
        : currentPath;

        navbarLinks.forEach(link => {
        // Rimuove le classi "attive" precedenti
        link.classList.remove('font-bold', 'text-yellow-300', 'border-b-2', 'border-yellow-300');

        // Non applicare l'highlight ai bottoni o ai link che non sono di navigazione (es. Logout)
        // Ho rimosso 'navbar-link' dai bottoni 'Logout', 'Login', 'Registrati' nel Blade per evitare questo.
        // Se vuoi che il logout sia evidenziato come un link, dovrai gestirlo separatamente o cambiare la logica.

        let linkHref = link.getAttribute('href');
        // Normalizza l'href del link
        if (linkHref) { // Assicurati che href non sia null
        if (linkHref.endsWith('/') && linkHref.length > 1) {
        linkHref = linkHref.slice(0, -1);
    }
    } else {
        linkHref = ''; // Se href è null, impostalo a stringa vuota per il confronto
    }


        // Confronta il percorso del link con il percorso attuale
        // Usa un'espressione regolare per gestire casi come /dashboard/ o /dashboard
        // O semplicemente compara le stringhe normalizzate
        if (linkHref === normalizedCurrentPath) {
        // Applica le classi per "illuminare" il link
        link.classList.add('font-bold', 'text-yellow-300', 'border-b-2', 'border-yellow-300');
    }
    });
    }

        // Funzione per mostrare/nascondere il menu mobile usando classi Tailwind
        function toggleMobileMenu() {
        if (collapseMenu.classList.contains('max-lg:-translate-x-full')) {
        // Se è nascosto, mostralo
        collapseMenu.classList.remove('max-lg:-translate-x-full');
        collapseMenu.classList.add('max-lg:translate-x-0');
        // Aggiungi un overlay di sfondo (questo richiede un pseudo-elemento ::before in CSS o un div separato)
        // Dato che l'overlay è gestito via 'max-lg:before:fixed', qui manipoliamo le classi genitore
        document.body.classList.add('overflow-hidden'); // Blocca lo scroll del body
    } else {
        // Se è visibile, nascondilo
        collapseMenu.classList.remove('max-lg:translate-x-0');
        collapseMenu.classList.add('max-lg:-translate-x-full');
        document.body.classList.remove('overflow-hidden'); // Riabilita lo scroll del body
    }
    }

        // Event listeners per il toggle del menu mobile
        if (toggleOpen) {
        toggleOpen.addEventListener('click', toggleMobileMenu);
    }
        if (toggleClose) {
        toggleClose.addEventListener('click', toggleMobileMenu);
    }

        // Chiudi il menu mobile se si clicca su un link al suo interno (e poi la pagina si ricarica)
        navbarLinks.forEach(link => {
        link.addEventListener('click', function() {
        // Solo se il menu è attualmente aperto (non ha la classe -translate-x-full)
        if (!collapseMenu.classList.contains('max-lg:-translate-x-full')) {
        toggleMobileMenu(); // Chiude il menu
    }
    });
    });

        // Inizializzazione della navbar all'avvio
        highlightActiveLink();
</script><?php /**PATH /home/lovix/PhpstormProjects/AppLaravel/resources/views/partials/navbar.blade.php ENDPATH**/ ?>