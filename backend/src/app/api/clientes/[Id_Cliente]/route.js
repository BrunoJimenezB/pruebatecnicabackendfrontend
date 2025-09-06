import { NextResponse} from 'next/server';
import { conn  } from "@/libs/mysql";
export async function GET(request, {params}) {
try {
    

    

const result= await conn.query('SELECT * FROM Clientes WHERE Id_Cliente = ?', [params.Id_Cliente])
    console.log(result)
    if (result.length==0) {
        return NextResponse.json({
            message: 'Cliente no encontrado'
        })
    } else {
          return NextResponse.json(result[0])
    }
} catch (error) {
    return NextResponse.json({
        message: error.message 
    });

}
}

export async function DELETE(request, {params}) {
    try {
        
   const result= await conn.query('DELETE FROM Clientes WHERE Id_Cliente = ?',[params.Id_Cliente])
   if (result.affectedRows == 0) {
    return NextResponse.json('Cliente no encontrado')
   }
   return new Response(null, {
    status: 204
   })
   // return NextResponse.json('eliminar Producto')
    } catch (error) {
        return NextResponse.json({
            message: error.message
        },{
        status: 500
        }
    );
    }
}
export async function PUT(request, {params}) {
    try {
        
    const data = await request.json()
    const result = await conn.query('UPDATE Clientes SET ? WHERE Id_Cliente = ?',[data,params.Id_Cliente])
    if(result.affectedRows == 0){
        return NextResponse.json('Cliente no encontrado');
    }
    return NextResponse.json('Cliente Actualizado')
    } catch (error) {
        return NextResponse.json({
            message: error.message
        },{
            status: 404
        })
    }
}