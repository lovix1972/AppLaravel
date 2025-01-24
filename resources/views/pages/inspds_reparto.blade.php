<x-layouts.list-layouts>

<div class="card align-middle w-5/6 m-3 px-5 rounded-lg shadow-lg py-5">
        <h2 class="text-3xl font-semibold text-center mb-6">Inserimento Dati</h2>

        <form action="#" method="POST">
            @csrf
            <div class="card border-x-cyan-950 ">
                <!-- Reparto -->
                <div class="mb-1">
                    <label for="reparto" class="text-red-500">Reparto</label>
                    <input type="text" id="reparto" name="reparto" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- Num PDS -->
                <div class="mb-1">
                    <label for="num_pds" class="block text-sm font-medium text-gray-700">Numero PDS</label>
                    <input type="text" id="num_pds" name="num_pds" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- Data PDS -->
                <div class="mb-1">
                    <label for="datapds" class="block text-sm font-medium text-gray-700">Data PDS</label>
                    <input type="date" id="datapds" name="datapds" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- Num Protocollo -->
                <div class="mb-1">
                    <label for="num_protocollo" class="block text-sm font-medium text-gray-700">Numero Protocollo</label>
                    <input type="text" id="num_protocollo" name="num_protocollo" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>
            </div>

                <!-- ID Capitolo -->
                <div class="mb-1">
                    <label for="id_capitolo" class="block text-sm font-medium text-gray-700">ID Capitolo</label>
                    <input type="text" id="id_capitolo" name="id_capitolo" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- Capitolo -->
                <div class="mb-1">
                    <label for="capitolo" class="block text-sm font-medium text-gray-700">Capitolo</label>
                    <input type="text" id="capitolo" name="capitolo" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- Articolo -->
                <div class="mb-1">
                    <label for="art" class="block text-sm font-medium text-gray-700">Articolo</label>
                    <input type="number" id="art" name="art" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- Progressivo -->
                <div class="mb-1">
                    <label for="prog" class="block text-sm font-medium text-gray-700">Programmaa</label>
                    <input type="number" id="prog" name="prog" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- IDV -->
                <div class="mb-1">
                    <label for="idv" class="block text-sm font-medium text-gray-700">IDV</label>
                    <input type="number" id="idv" name="idv" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- OPS3 -->
                <div class="mb-1">
                    <label for="ops3" class="block text-sm font-medium text-gray-700">OPS3</label>
                    <input type="text" id="ops3" name="ops3" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- Decreto -->
                <div class="mb-1">
                    <label for="decreto" class="block text-sm font-medium text-gray-700">Decreto</label>
                    <input type="text" id="decreto" name="decreto" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>


            <!-- Bottone di Submit -->
            <div class="mt-1 text-center">
                <button type="submit" class="btn btn-primary b-radius ">
                    Inserisci Dati
                </button>
            </div>
        </form>
</div>

</x-layouts.list-layouts>