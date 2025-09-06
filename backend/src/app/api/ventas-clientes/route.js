import {NextResponse  } from 'next/server';
import { conn } from '@/libs/mysql';
export async function GET() {
    try {
        
   
    const result = await conn.query(
         `
        SELECT 
    c.Id_Cliente,
    c.Nombre AS nombre_cliente,
    ROUND(COALESCE(SUM(CASE WHEN YEAR(v.fecha) = 2020 THEN v.monto_total END), 0), 2) AS ventas_2020,
    ROUND(COALESCE(SUM(CASE WHEN YEAR(v.fecha) = 2021 THEN v.monto_total END), 0), 2) AS ventas_2021,
    ROUND(COALESCE(SUM(CASE WHEN YEAR(v.fecha) = 2022 THEN v.monto_total END), 0), 2) AS ventas_2022,
    ROUND(COALESCE(SUM(CASE WHEN YEAR(v.fecha) = 2023 THEN v.monto_total END), 0), 2) AS ventas_2023,
    ROUND(COALESCE(SUM(CASE WHEN YEAR(v.fecha) = 2024 THEN v.monto_total END), 0), 2) AS ventas_2024,
    ROUND(COALESCE(SUM(CASE WHEN YEAR(v.fecha) = 2025 THEN v.monto_total END), 0), 2) AS ventas_2025
FROM clientes c
LEFT JOIN ventas v ON c.Id_Cliente = v.Id_cliente
GROUP BY c.Id_Cliente, c.Nombre
ORDER BY c.Id_Cliente;

        
        
        `,
    )
    return NextResponse.json(result)
     } catch (error) {
        return NextResponse.json({
            message: error.message
        }
    )
    }
}