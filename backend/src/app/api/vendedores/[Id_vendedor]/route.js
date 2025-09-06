import { NextResponse} from 'next/server';
import { conn  } from "@/libs/mysql";
export async function GET(request, {params}) {
try {
    

    

const result= await conn.query('SELECT * FROM Vendedores WHERE Id_vendedor = ?', [params.Id_vendedor])
    console.log(result)
    if (result.length==0) {
        return NextResponse.json({
            message: 'Vendedor no encontrado'
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
        
   const result= await conn.query('DELETE FROM Vendedores WHERE Id_vendedor = ?',[params.Id_vendedor])
   if (result.affectedRows == 0) {
    return NextResponse.json('Vendedor no encontrado')
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
    const result = await conn.query('UPDATE Vendedores SET ? WHERE Id_vendedor = ?',[data,params.Id_vendedor])
    if(result.affectedRows == 0){
        return NextResponse.json('Vendedor no encontrado');
    }
    return NextResponse.json('Vendedor Actualizado')
    } catch (error) {
        return NextResponse.json({
            message: error.message
        },{
            status: 404
        })
    }
}