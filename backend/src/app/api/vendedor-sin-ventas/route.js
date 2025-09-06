import {NextResponse  } from 'next/server';
import { conn } from '@/libs/mysql';


export async function GET(req) {
  try {
    const { searchParams } = new URL(req.url);

    // Fechas recibidas desde query params
    const fechaInicio = searchParams.get("fechaInicio") ;
    const fechaFin = searchParams.get("fechaFin") ;


    const rows = await conn.query(
      `
      SELECT 
    vd.Id_vendedor,
    vd.nombre AS nombre_vendedor
FROM vendedores vd
WHERE NOT EXISTS (
    SELECT 1
    FROM ventas v
    WHERE v.Id_vendedor = vd.Id_vendedor
      AND v.fecha BETWEEN ? AND ?
);

      `,
      [fechaInicio, fechaFin]
    );

    return NextResponse.json(rows);
  } catch (error) {
    return NextResponse.json({ error: error.message }, { status: 500 });
  }
}