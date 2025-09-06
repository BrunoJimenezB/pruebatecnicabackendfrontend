import {NextResponse  } from 'next/server';
import { conn } from '@/libs/mysql';
export async function GET() {
    try {
        
   
    const result = await conn.query('SELECT * FROM Vendedores')
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
        
    
        
   
    const {nombre, email,telefono, direccion} =  await request.json();

const result = await conn.query('INSERT INTO Vendedores SET ?', {
nombre,
email,
telefono,
direccion

});
console.log(result)
    return NextResponse.json({
        nombre,
        email,
        telefono,
        direccion
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