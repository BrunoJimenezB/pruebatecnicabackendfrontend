import { NextResponse} from 'next/server';
import { conn  } from "@/libs/mysql";
export async function GET(request, {params}) {
try {
    

    

const result= await conn.query('SELECT * FROM Productos WHERE Id_producto = ?', [params.Id_producto])
    console.log(result)
    if (result.length==0) {
        return NextResponse.json({
            message: 'Producto no encontrado'
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
        
   const result= await conn.query('DELETE FROM Productos WHERE Id_producto = ?',[params.Id_producto])
   if (result.affectedRows == 0) {
    return NextResponse.json('Producto no encontrado')
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
    const result = await conn.query('UPDATE Productos SET ? WHERE Id_producto = ?',[data,params.Id_producto])
    if(result.affectedRows == 0){
        return NextResponse.json('Producto no encontrado');
    }
    return NextResponse.json('Producto Actualizado')
    } catch (error) {
        return NextResponse.json({
            message: error.message
        },{
            status: 404
        })
    }
}