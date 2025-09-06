import {NextResponse  } from 'next/server';
import { conn } from '@/libs/mysql';
export async function GET() {
    try {
        
   
    const result = await conn.query('SELECT * FROM Clientes')
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
        
    
        
   
    const {Nombre, Telefono,Direccion, Email} =  await request.json();

const result = await conn.query('INSERT INTO Clientes SET ?', {
Nombre,
Telefono,
Direccion,
Email
});
console.log(result)
    return NextResponse.json({
        Nombre,
        Telefono,
        Direccion,
        Email
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