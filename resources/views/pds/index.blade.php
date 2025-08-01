<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Registro PDS">
    <title>Registro PDS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="pt-16">

<header class="fixed top-0 left-0 w-full z-50 bg-blue-600 shadow-md">
    <div class='flex shadow-md py-4 px-4 sm:px-10 font-[sans-serif] min-h-[70px] tracking-wide relative z-50'>
        <div class='flex flex-wrap items-center justify-between gap-5 w-full'>
            <a href="#" class="max-sm:hidden"><img src="https://upload.wikimedia.org/wikipedia/commons/2/24/CoA_mil_ITA_airmobile_bde_Friuli.png" alt="logo" class='w-10' /></a>
            <a href="#" class="hidden max-sm:block"><img src="https://upload.wikimedia.org/wikipedia/commons/2/24/CoA_mil_ITA_airmobile_bde_Friuli.png" alt="logo" class='w-9' /></a>
            <div class="text-blue-100 absolute flex left-20 font-semibold">BRIGATA AEROMOBILE FRIULI</div>

            {{-- Toggle button for mobile menu --}}
            <button id="toggleOpen" class='lg:hidden ml-auto'>
                <svg class="w-7 h-7 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>

            <div id="collapseMenu" class='max-lg:hidden lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50'>
                <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white w-9 h-9 flex items-center justify-center border'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 fill-black" viewBox="0 0 320.591 320.591">
                        <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" data-original="#000000"></path>
                        <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" data-original="#000000"></path>
                    </svg>
                </button>
                <ul class='lg:flex gap-x-5 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
                    <li class='mb-6 hidden max-lg:block'>
                        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/2/24/CoA_mil_ITA_airmobile_bde_Friuli.png" alt="logo" class='w-36' /></a>
                    </li>
                    <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'><a href='/dashboard' class='navbar-link text-yellow-600 hover:text-yellow-500'>Dashboard</a></li>
                    <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'><a href='/inspds' class='navbar-link text-yellow-600 hover:text-yellow-500'>Acquisizioni</a></li>
                    <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'><a href='#' class='navbar-link text-yellow-600 hover:text-yellow-500'>Gestione Finanziaria</a></li>
                    <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'><a href='javascript:void(0)' class='navbar-link text-yellow-600 hover:text-yellow-500'>Movimenti di Cassa</a></li>
                    <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'><a href='#' class='navbar-link text-yellow-600 hover:text-yellow-500'>Gestione Note</a></li>
                    <li class='max-lg:border-b border-gray-300 max-lg:py-3 px-3'><a href='/reglist' class='navbar-link text-yellow-600 hover:text-yellow-500'>Registro</a></li>
                </ul>
            </div>
            <div class='flex max-lg:ml-auto space-x-4'>
                <a href="/logout">
                    <button class='navbar-link px-4 py-2 text-sm rounded-full font-bold text-amber-50 border-2 bg-transparent hover:bg-gray-50 transition-all ease-in-out duration-300'>Logout</button>
                </a>
            </div>
        </div>
    </div>
</header>

<main class="contents">
    <div class="py-12">
        <div class="w-full sm:px-6 lg:px-8">
            <div x-data="{
                    showModal: false,
                    pdsToEdit: null,
                    editForm: {},
                    openModal(pds) {
                        this.pdsToEdit = pds;
                        // Formatta la data per l'input 'date'
                        if (pds.data_protocollo) {
                             const date = new Date(pds.data_protocollo);
                             pds.data_protocollo = date.toISOString().split('T')[0];
                        }
                        this.editForm = { ...pds };
                        this.showModal = true;
                    },
                    closeModal() {
                        this.showModal = false;
                    }
                }">

                {{-- La tabella PDS --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{-- ... (il contenuto della tua tabella) ... --}}
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black dark:text-gray-100">1535</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-gray-300">01/08/2025</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <button x-data="{ pdsData: {&quot;id&quot;:6,&quot;idreparto&quot;:1,&quot;reparto&quot;:&quot;Comando Brigata Aeromobile Friuli&quot;,&quot;numpds&quot;:&quot;1535&quot;,&quot;datapds&quot;:&quot;2025-07-29&quot;,&quot;oggetto&quot;:&quot;Prova di connessione&quot;,&quot;idcapitolo&quot;:1,&quot;capitolo&quot;:1189,&quot;art&quot;:2,&quot;prog&quot;:51,&quot;idv&quot;:1958547,&quot;decreto&quot;:&quot;Fuori Area 2025 - Anticipazione&quot;,&quot;importo&quot;:&quot;2500.00&quot;,&quot;previstoimpegno&quot;:&quot;2500.00&quot;,&quot;impegnato&quot;:&quot;0.00&quot;,&quot;contabilizzato&quot;:&quot;0.00&quot;,&quot;note&quot;:null,&quot;registrato&quot;:0,&quot;impegnato_flag&quot;:0,&quot;validato&quot;:0,&quot;created_at&quot;:&quot;2025-07-29T18:40:03.000000Z&quot;,&quot;updated_at&quot;:&quot;2025-07-31T20:06:05.000000Z&quot;} }" @click="openModal(pdsData)"
                                                class="text-blue-600 hover:text-blue-900 transition ease-in-out duration-150">
                                            Modifica
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- La Modale di Modifica (corretta e completa) --}}
                <template x-if="showModal">
                    <div class="fixed inset-0 z-[999] overflow-y-auto" @click="closeModal()">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                        <div @click.stop class="flex items-center justify-center min-h-screen">
                            <div x-transition:enter="ease-out duration-300"
                                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                 x-transition:leave="ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 class="inline-block align-bottom bg-white dark:bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all my-8 max-w-lg w-full">
                                <div class="bg-white dark:bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modal-title">
                                        Modifica PDS #<span x-text="pdsToEdit.id"></span>
                                    </h3>
                                    <div class="mt-2">
                                        <form :action="`/pds/${pdsToEdit.id}`" method="POST">
                                            @csrf
                                            @method('PUT')

                                            {{-- Campi del Form --}}
                                            <div class="mb-4">
                                                <label for="num_pds" class="block text-sm font-medium text-gray-700 dark:text-gray-300">N. PDS</label>
                                                <input type="text" name="num_pds" id="num_pds" x-model="editForm.num_pds" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                            </div>
                                            <div class="mb-4">
                                                <label for="data_protocollo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data Protocollo</label>
                                                <input type="date" name="data_protocollo" id="data_protocollo" x-model="editForm.data_protocollo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                            </div>
                                            <div class="mb-4">
                                                <label for="reparto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reparto</label>
                                                <input type="text" name="reparto" id="reparto" x-model="editForm.reparto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                            </div>
                                            <div class="mb-4">
                                                <label for="capitolo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Capitolo</label>
                                                <input type="text" name="capitolo" id="capitolo" x-model="editForm.capitolo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                            </div>
                                            <div class="mb-4">
                                                <label for="art" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Art</label>
                                                <input type="text" name="art" id="art" x-model="editForm.art" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                            </div>
                                            <div class="mb-4">
                                                <label for="prog" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prog</label>
                                                <input type="text" name="prog" id="prog" x-model="editForm.prog" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                            </div>
                                            <div class="mb-4">
                                                <label for="oggetto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Oggetto</label>
                                                <textarea name="oggetto" id="oggetto" x-model="editForm.oggetto" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"></textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label for="anno" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Anno</label>
                                                <input type="number" name="anno" id="anno" x-model="editForm.anno" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                            </div>

                                            <div class="mt-6 flex justify-end space-x-2">
                                                <button type="submit"
                                                        class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 sm:w-auto sm:text-sm">
                                                    Salva Modifiche
                                                </button>
                                                <button type="button" @click="closeModal()"
                                                        class="mt-3 inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:w-auto sm:text-sm">
                                                    Annulla
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ... (funzioni di highlight e toggle del menu) ...
        // Funzionalità Navbar (Highlight attivo e Menu Mobile)
        const navbarLinks = document.querySelectorAll('.navbar-link');
        const toggleOpen = document.getElementById('toggleOpen');
        const toggleClose = document.getElementById('toggleClose');
        const collapseMenu = document.getElementById('collapseMenu');

        function highlightActiveLink() {
            const currentPath = window.location.pathname;
            const normalizedCurrentPath = (currentPath.endsWith('/') && currentPath.length > 1) ? currentPath.slice(0, -1) : currentPath;

            navbarLinks.forEach(link => {
                link.classList.remove('font-bold', 'text-yellow-300', 'border-b-2', 'border-yellow-300');
                let linkHref = link.getAttribute('href');
                if (linkHref) {
                    if (linkHref.endsWith('/') && linkHref.length > 1) {
                        linkHref = linkHref.slice(0, -1);
                    }
                } else {
                    linkHref = '';
                }

                if (linkHref === normalizedCurrentPath) {
                    link.classList.add('font-bold', 'text-yellow-300', 'border-b-2', 'border-yellow-300');
                }
            });
        }

        function toggleMobileMenu() {
            if (collapseMenu.classList.contains('max-lg:-translate-x-full')) {
                collapseMenu.classList.remove('max-lg:-translate-x-full');
                collapseMenu.classList.add('max-lg:translate-x-0');
                document.body.classList.add('overflow-hidden');
            } else {
                collapseMenu.classList.remove('max-lg:translate-x-0');
                collapseMenu.classList.add('max-lg:-translate-x-full');
                document.body.classList.remove('overflow-hidden');
            }
        }

        if (toggleOpen) {
            toggleOpen.addEventListener('click', toggleMobileMenu);
        }
        if (toggleClose) {
            toggleClose.addEventListener('click', toggleMobileMenu);
        }

        navbarLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (!collapseMenu.classList.contains('max-lg:-translate-x-full')) {
                    toggleMobileMenu();
                }
            });
        });

        highlightActiveLink();
    });
</script>
</body>
</html>
