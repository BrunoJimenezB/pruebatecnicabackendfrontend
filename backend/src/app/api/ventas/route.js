import {NextResponse  } from 'next/server';
import { conn } from '@/libs/mysql';
export async function GET() {
    try {
        
   
    const result = await conn.query(
        `
     SELECT 
    v.Id_venta,
    c.Nombre AS nombre_cliente,
    vd.nombre AS nombre_vendedor,
    z.nombre_zona,
    v.fecha,
    v.monto_total
FROM ventas v
JOIN clientes c ON v.Id_cliente = c.Id_Cliente
JOIN vendedores vd ON v.Id_vendedor = vd.Id_vendedor
JOIN zonas z ON v.Id_zona = z.Id_zona
ORDER BY v.Id_venta ASC;

      `
    );
    return NextResponse.json(result)
     } catch (error) {
        return NextResponse.json({
            message: error.message
        }
    )
    }
}

export async function POST(req) {
  const body = await req.json();
const { Id_cliente, Id_vendedor, Id_zona, fecha, monto_total, detalles } = body;

  try {
    // Insertar la venta
    const result = await conn.query(
      "INSERT INTO ventas (Id_cliente, Id_vendedor, Id_zona, fecha, monto_total) VALUES (?, ?, ?, ?, ?)",
     [Id_cliente, Id_vendedor, Id_zona, fecha, monto_total]
    );

    const ventaId = result.insertId;

    // Insertar los detalles
    for (const detalle of detalles) {
      await conn.query(
        "INSERT INTO detalle_ventas (Id_venta, Id_producto, cantidad, precio_unitario, subtotal) VALUES (?, ?, ?, ?, ?)",
        [
          ventaId,
          detalle.Id_producto,
          detalle.cantidad,
          detalle.precio_unitario,
          detalle.subtotal,
        ]
      );
    }

    // Importante: cerrar conexión
    await conn.end();

    return Response.json({
      success: true,
      message: "Venta creada correctamente",
      ventaId,
    });
  } catch (error) {
    console.error(error);
    return Response.json({
      success: false,
      message: "Error al crear la venta",
      error: error.message,
    });
  }
}


