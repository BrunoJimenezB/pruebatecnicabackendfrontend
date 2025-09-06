import { NextResponse} from 'next/server';
import { conn  } from "@/libs/mysql";
export async function GET(request, {params}) {
try {
    

    

const result= await conn.query('SELECT * FROM Zonas WHERE Id_zona = ?', [params.Id_zona])
    console.log(result)
    if (result.length==0) {
        return NextResponse.json({
            message: 'Zona no encontrada'
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
        
   const result= await conn.query('DELETE FROM Zonas WHERE Id_zona = ?',[params.Id_zona])
   if (result.affectedRows == 0) {
    return NextResponse.json('Zona no encontrada')
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
    const result = await conn.query('UPDATE Zonas SET ? WHERE Id_zona = ?',[data,params.Id_zona])
    if(result.affectedRows == 0){
        return NextResponse.json('Zona no encontrada');
    }
    return NextResponse.json('Zona Actualizada')
    } catch (error) {
        return NextResponse.json({
            message: error.message
        },{
            status: 404
        })
    }
}