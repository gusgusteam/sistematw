<div>
    <h1 class="text-center">MI PEDIDO</h1>
    <table id="detalle" class="table table-hover table-bordered">
        <thead class="" >
            <tr style="color:white">
                <th>PRODUCTO</th>
                <th>CANTIDAD</th>
                <th>PRECIO </th>
                <th>SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carrito as $car)
                <tr style="background-color:white">
                    <td>{{@producto($car->idProducto)->descripcion}} <br> {{@producto($car->idProducto)->marca}} {{@producto($car->idProducto)->modelo}}</td>
                    <td>{{$car->cantidad}}</td>
                    <td>{{@producto($car->idProducto)->precioVenta}}</td>
                    <td>{{@producto($car->idProducto)->precioVenta * $car->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="color:white">
                <th>TOTAL</th>
                <th></th>
                <th></th>
                <th>
                    <h6 id="total"> Bs/. {{$total}}</h6>
                </th>
            </tr>
        </tfoot>
    </table>
</div>
