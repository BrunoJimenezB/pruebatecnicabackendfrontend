import {NextResponse  } from 'next/server';
import { conn } from '@/libs/mysql';
export async function GET() {
    try {
        
   
    const result = await conn.query('SELECT * FROM Productos')
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
        
    
        
   
    const {nombre, descripcion,precio, stock, categoria, url_img} =  await request.json();

const result = await conn.query('INSERT INTO Productos SET ?', {
nombre,
descripcion,
precio,
stock,
categoria,
url_img
});
console.log(result)
    return NextResponse.json({
    nombre,
    descripcion,
    precio,
    stock,
    categoria,
    url_img
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