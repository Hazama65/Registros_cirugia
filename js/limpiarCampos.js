const limpiarCampos=()=> {
    document.getElementById("medico").value = ""; // Limpia el campo "Medico"
    document.getElementById("cirugia").value = ""; // Limpia el campo "Cirugia"
    document.getElementById("sala").value = ""; // Limpia el campo "Sala"
    document.getElementById("diagnostico").value = ""; // Limpia el campo "Diagnostico"
    document.getElementById("fecha").value = ""; // Limpia el campo "Fecha"
    document.getElementById("programado").value = ""; // Limpia el campo "Hora Programada" de cirugía cancelada
    document.getElementById("ingreso").value = ""; // Limpia el campo "Hora Ingreso a Sala"
    document.getElementById("anestesia").value = ""; // Limpia el campo "Hora Anestesia"
    document.getElementById("inicio").value = ""; // Limpia el campo "Hora Inicio Cirugía"
    document.getElementById("fin").value = ""; // Limpia el campo "Hora Fin Cirugía"
    document.getElementById("egreso").value = ""; // Limpia el campo "Hora Egreso Sala"
    document.getElementById("pro_ingreso").value = ""; // Limpia el campo "Programada - Ingreso Sala" de cirugía cancelada
    document.getElementById("pro_inicio").value = ""; // Limpia el campo "Programada - Inicio cirugía" de cirugía cancelada
    document.getElementById("ingreso_egreso").value = ""; // Limpia el campo "Ingreso - Egreso Sala"
    document.getElementById("ingreso_anestesia").value = ""; // Limpia el campo "Ingreso - Inicio Anestesia"
    document.getElementById("ingreso_inicio").value = ""; // Limpia el campo "Ingreso Sala - Inicio Cirugía"
    document.getElementById("inicio_fin").value = ""; // Limpia el campo "Ingreso Inicio - Fin Cirugía"
    document.getElementById("S_medico").value = ""; // Limpia el campo "Medico" de cirugía cancelada
    document.getElementById("motivo").value = ""; // Limpia el campo "Motivo" de cirugía cancelada
}


module.exports = limpiarCampos;