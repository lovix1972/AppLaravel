<x-layouts.list-layouts>

    <div class="bg-white p-8 rounded-lg shadow-lg  relative top-20 m-auto z-10">
        <h2 class="text-2xl font-semibold text-center mb-6">Modulo Acquisizione PDS</h2>
        <form>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Campi del form -->
                <div class="flex flex-col">
                    <label for="reparto">Reparto</label>
                    <select class="form-select form-control ]" id="reparto" name ="reparto"  required>
                        <option></option>
                        @foreach($reparti as $r)
                            <option>{{$r->idreparto}} - {{$r->reparto}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="protocollo" class="text-sm font-medium text-gray-700">Num. protocollo</label>
                    <input type="text" id="protocollo" name="protocollo" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm" >
                </div>
                <div class="flex flex-col">
                    <label for="datpds" class="text-sm font-medium text-gray-700">Data PDS </label>
                    <input type="date" id="data" name="data" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm" >
                </div>
                <div class="flex flex-col">
                    <label for="campo4" class="text-sm font-medium text-gray-700">Campo 4</label>
                    <input type="text" id="campo4" name="campo4" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="flex flex-col">
                    <label for="campo5" class="text-sm font-medium text-gray-700">Campo 5</label>
                    <input type="text" id="campo5" name="campo5" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="flex flex-col">
                    <label for="campo6" class="text-sm font-medium text-gray-700">Campo 6</label>
                    <input type="text" id="campo6" name="campo6" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="flex flex-col">
                    <label for="campo7" class="text-sm font-medium text-gray-700">Campo 7</label>
                    <input type="text" id="campo7" name="campo7" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="flex flex-col">
                    <label for="campo8" class="text-sm font-medium text-gray-700">Campo 8</label>
                    <input type="text" id="campo8" name="campo8" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="flex flex-col">
                    <label for="campo9" class="text-sm font-medium text-gray-700">Campo 9</label>
                    <input type="text" id="campo9" name="campo9" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="flex flex-col">
                    <label for="campo10" class="text-sm font-medium text-gray-700">Campo 10</label>
                    <input type="text" id="campo10" name="campo10" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm" required>
                </div>
            </div>
            <div class="mt-6 flex justify-center">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">Invia</button>
            </div>
        </form>
    </div>

    <script>
        // Funzione per aggiornare i campi basata sull'opzione selezionata
        function updateFields() {
            const data = {{$reparti}} // Dati dal PHP
            const select = document.getElementById("selectOption");
            const selectedValue = select.value;

            // Aggiorna i campi solo se l'opzione è valida
            if (data[selectedValue]) {
                document.getElementById("nome").value = data[selectedValue].nome;
                document.getElementById("email").value = data[selectedValue].email;
                document.getElementById("telefono").value = data[selectedValue].telefono;
            } else {
                document.getElementById("nome").value = "";
                document.getElementById("email").value = "";
                document.getElementById("telefono").value = "";
            }
        }
    </script>
</x-layouts.list-layouts>