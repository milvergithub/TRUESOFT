function getValorSeleccionado(comboBox){
	indice=$(comboBox)[0].selectedIndex;
	valor=$(comboBox)[0].options[indice].value;
	return valor;
    }


