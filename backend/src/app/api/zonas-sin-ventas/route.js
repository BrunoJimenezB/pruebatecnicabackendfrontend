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
      SELECT z.Id_zona, z.nombre_zona
  FROM zonas z
  LEFT JOIN ventas v 
    ON z.Id_zona = v.Id_zona 
    AND v.fecha BETWEEN ? AND ?
  WHERE v.Id_zona IS NULL;

      `,
      [fechaInicio, fechaFin]
    );

    return NextResponse.json(rows);
  } catch (error) {
    return NextResponse.json({ error: error.message }, { status: 500 });
  }
}