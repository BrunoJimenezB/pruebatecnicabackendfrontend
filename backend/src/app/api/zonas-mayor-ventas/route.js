import {NextResponse  } from 'next/server';
import { conn } from '@/libs/mysql';


export async function GET() {
  try {
   // const { searchParams } = new URL(req.url);

    // Fechas recibidas desde query params
   // const Id_zona = searchParams.get("Id_zona") ;
 
    const rows = await conn.query(
      `
  SELECT 
    v.Id_vendedor,
    vd.nombre AS nombre_vendedor,
    v.Id_zona,
    z.nombre_zona,
    COUNT(DISTINCT v.Id_venta) AS total_ventas
FROM ventas v
JOIN vendedores vd ON v.Id_vendedor = vd.Id_vendedor
JOIN zonas z ON v.Id_zona = z.Id_zona
GROUP BY v.Id_vendedor, v.Id_zona
ORDER BY total_ventas DESC;


      `
    );

    return NextResponse.json(rows);
  } catch (error) {
    return NextResponse.json({ error: error.message }, { status: 500 });
  }
}