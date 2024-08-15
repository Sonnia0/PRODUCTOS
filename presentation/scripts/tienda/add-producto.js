document.addEventListener('DOMContentLoaded', function () {
    const productosForm = document.getElementById('productosForm');
    productosForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        const producto = document.getElementById('producto').value;
        const cantidad = parseInt(document.getElementById('cantidad').value);
        const precio = parseFloat(document.getElementById('precio').value);
        
        // Log the values to check correctness
        console.log(`Producto: ${producto}, Cantidad: ${cantidad}, Precio: ${precio}`);

        const totalConDescuento = await realizarOperacion(producto, cantidad, precio);
        document.getElementById('total').innerText = `Total con descuento: $${totalConDescuento}`;
    });

    async function realizarOperacion(producto, cantidad, precio) {
        let total;

        // Calculate the total with discount using the new function
        total = calcularTotalConDescuento(cantidad, precio);

        const formData = new FormData();
        formData.append('producto', producto);
        formData.append('cantidad', cantidad);
        formData.append('precio', precio);
        formData.append('total', total);

        // Log formData to see what is being sent
        console.log(`FormData: producto=${producto}, cantidad=${cantidad}, precio=${precio}, total=${total}`);

        try {
            const response = await fetch('http://tienda.test/businessLogic/swTienda.php', {
                method: 'POST',
                body: formData
            });
            /* Uncomment this block if you want to handle the server response
            const result = await response.json();
            if (result.success) {
                document.getElementById('resultado').innerText = `Total con descuento: $${result.total}`;
            } else {
                alert('Error al realizar la operación: ' + result.error);
            }
            */
        } catch (error) {
            console.error('Error al realizar la operación:', error);
        }

        return total;
    }

    // Function to calculate the total price with a 12% discount
    function calcularTotalConDescuento(cantidad, precio) {
        const totalSinDescuento = cantidad * precio;
        const descuento = totalSinDescuento * 0.12;
        return totalSinDescuento - descuento;
    }
});