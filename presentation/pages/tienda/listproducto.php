<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Edad</title>
    <link href="../../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Container -->
    <div class="container mx-auto max-w-md py-6">
        <!--<h1 class="text-xl font-bold text-gray-800 mb-4 text-center">Lista de Cálculos</h1>-->
        <div class="bg-white shadow-md rounded p-4">
            <!-- Botón para eliminar todos los cálculos -->
            <div class="mb-4 text-center">
                <button id="delete-all-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Eliminar Todos
                </button>
            </div>
            <table class="min-w-full bg-white" id="table-calculo">
                <thead class="bg-blue-800 text-black">
                    <tr>
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Producto</th>
                        <th class="py-2 px-4 text-left">Cantidad</th>
                        <th class="py-2 px-4 text-left">Precio</th>
                        <th class="py-2 px-4 text-left">Total</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Aquí se llenarán dinámicamente los datos de los cálculos -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="../../scripts/tienda/list-producto.js"></script>
</body>
</html>
