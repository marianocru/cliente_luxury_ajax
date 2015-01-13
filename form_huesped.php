<fieldset>
      <legend>Huesped</legend>

        <label for="huesped_tipo_doc"> Doc.: </label>
            <select name="huesped[tipo_doc]" id="huesped_tipo_doc">
                <option value="DNI" selected="">DNI</option>
                <option value="PASS">PASS</option>
            </select>
                 <input name="huesped[nro_doc]" type="text" id="huesped_nro_doc" >
        
          <br>
    <label for="huesped_nombre"> Nombre: </label>
    <input name="huesped[nombre]" type="text" id="huesped_nombre">
    <label for="huesped_apellido"> Apellido: </label>
    <input name="huesped[apellido]" type="text" id="huesped_apellido">
      <br>
    <label for="huesped_fecha_nacimiento"> Fecha Nacimiento: </label>
    <input name="huesped[fecha_nacimiento]" type="date" id="huesped_fecha_nacimiento">
    <br>
    <label for="huesped_tel"> Tel.: </label>
    <input name="huesped[tel]" type="tel" id="huesped_tel">
        <label for="huesped_email"> E-mail: </label>
        <input name="huesped[email]" type="email" id="huesped_email">
  
  </fieldset>
  <input type="submit" id="reservar" value="Reservar" name="Reservar">