import {NextResponse  } from 'next/server';
import { conn } from '@/libs/mysql';
export async function GET() {
    try {
        
   
    const result = await conn.query('SELECT * FROM Zonas')
    return NextResponse.json(result)
     } catch (error) {
        return NextResponse.json({
            message: error.message
        }
    )
    }
}

export async function POST(request) {
    try {
        
    
        
   
    const {Cedula, Fecha_Nacimiento,Nombre, Pago} =  await request.json();

const result = await conn.query('INSERT INTO Zonas SET ?', {
nombre_zona,
descripcion

});
console.log(result)
    return NextResponse.json({
       nombre_zona,
    descripcion
    })
    } catch (error) {
        console.log(error);
        return NextResponse.json({
            message: error.message
        },{
            status: 500,
        }
        );
         }
}