import axios from "axios";
async function loadUsuario() {
const {data} = await axios.get('http://localhost:3001/api/products')
return data;
}
 
export default  async function Home() {
  const usuarios = await loadUsuario();
console.log(usuarios);
  return (
    <div className=" flex justify-center items-center">
<div
  class="relative flex flex-col p-3 px-8 w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
  <table class="w-full text-left table-auto min-w-max">
    <thead>
      <tr>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Cedula
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Nombre
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Fecha de Nacimiento
          </p>
        </th>
        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"> Pago</p>
        </th>
      </tr>
    </thead>
    <tbody>
      {usuarios.map(user=>(
      <tr>
        
            <td>{user.Cedula}</td>
            <td>{user.Nombre}</td>
            <td>{user.Fecha_Nacimiento}</td>
            <td>{user.Pago}</td>
       
      </tr>
       ))}
    </tbody>
  </table>
</div>
</div>

  //  <div>
  //   {usuarios.map(user=> (
  //     <div key={user.Cedula}>
  //       <h1>{user.Cedula}</h1>
  //       </div>
      
  //   ))}
  //  </div>
  );
}
