import { NextResponse} from 'next/server';
import { conn  } from "@/libs/mysql";
export async function GET(request, {params}) {
try {
    

    

const result= await conn.query(
  `
     SELECT 
    dv.Id_detalle_venta,
    dv.Id_venta,
    dv.Id_producto,
    p.nombre AS nombre_producto,
    dv.cantidad,
    dv.precio_unitario,
    dv.subtotal,
    v.monto_total,
    p.url_img as url_img
    
FROM detalle_ventas dv
JOIN productos p ON dv.Id_producto = p.Id_producto
JOIN ventas v ON dv.Id_venta = v.Id_venta
WHERE dv.Id_venta = ?
ORDER BY dv.Id_detalle_venta ASC;

      `
    
    , [params.Id_venta]

)
    console.log(result)
    if (result.length==0) {
        return NextResponse.json({
            message: 'Detalle no encontrado'
        })
    } else {
          return NextResponse.json(result)
    }
} catch (error) {
    return NextResponse.json({
        message: error.message 
    });

}
}