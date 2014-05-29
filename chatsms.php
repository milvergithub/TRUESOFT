<?php
?>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="400"><iframe src="" width="400" height="300" scrolling="no"></iframe></td>
  </tr>
  <tr>
    <td align="center"><form id="form1" name="form1" method="post" action="ejecucion.php">
      <label></label>
      <label></label>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="359" bgcolor="#CCFFCC">Alias
            <label>
              <input name="alias" type="text" id="alias" value="<?php echo ""; ?>" size="20" />
            </label></td>
        </tr>
        <tr>
          <td bgcolor="#CCFFFF">Mensaje
            <input name="mensaje" type="text" id="mensaje" size="40" maxlength="250" />
            <input type="submit" name="Submit" value="Enviar" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>