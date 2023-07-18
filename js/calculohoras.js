const calcularIngEgr =()=> {
    let horaInicio = document.getElementById("ingreso").value;
    let horaFin = document.getElementById("egreso").value;

    let partesHoraInicio = horaInicio.split(":");
    let partesHoraFin = horaFin.split(":");

    let fechaInicio = new Date();
    fechaInicio.setHours(partesHoraInicio[0]);
    fechaInicio.setMinutes(partesHoraInicio[1]);

    let fechaFin = new Date();
    fechaFin.setHours(partesHoraFin[0]);
    fechaFin.setMinutes(partesHoraFin[1]);

    let diferencia = fechaFin - fechaInicio;

    if (diferencia < 0) {
        fechaFin.setDate(fechaFin.getDate() + 1); // Agregar un día a la fecha de fin
        diferencia = fechaFin - fechaInicio;
    }

    let horas = Math.floor(diferencia / (1000 * 60 * 60));
    let minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
    let segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

    let resultado = horas.toString().padStart(2, '0') + ":" + minutos.toString().padStart(2, '0') + ":" + segundos.toString().padStart(2, '0');
    document.getElementById("ingreso_egreso").value = resultado;
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("ingreso").addEventListener("input", calcularIngEgr);
    document.getElementById("egreso").addEventListener("input", calcularIngEgr);
});

const calcularIngAns =()=> {
    let horaInicio = document.getElementById("ingreso").value;
    let horaFin = document.getElementById("anestesia").value;

    let partesHoraInicio = horaInicio.split(":");
    let partesHoraFin = horaFin.split(":");

    let fechaInicio = new Date();
    fechaInicio.setHours(partesHoraInicio[0]);
    fechaInicio.setMinutes(partesHoraInicio[1]);

    let fechaFin = new Date();
    fechaFin.setHours(partesHoraFin[0]);
    fechaFin.setMinutes(partesHoraFin[1]);

    let diferencia = fechaFin - fechaInicio;

    if (diferencia < 0) {
        fechaFin.setDate(fechaFin.getDate() + 1); // Agregar un día a la fecha de fin
        diferencia = fechaFin - fechaInicio;
    }

    let horas = Math.floor(diferencia / (1000 * 60 * 60));
    let minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
    let segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

    let resultado = horas.toString().padStart(2, '0') + ":" + minutos.toString().padStart(2, '0') + ":" + segundos.toString().padStart(2, '0');
    document.getElementById("ingreso_anestesia").value = resultado;
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("ingreso").addEventListener("input", calcularIngAns);
    document.getElementById("anestesia").addEventListener("input", calcularIngAns);
});


const calcularIngCir =()=> {
    let horaInicio = document.getElementById("ingreso").value;
    let horaFin = document.getElementById("inicio").value;

    let partesHoraInicio = horaInicio.split(":");
    let partesHoraFin = horaFin.split(":");

    let fechaInicio = new Date();
    fechaInicio.setHours(partesHoraInicio[0]);
    fechaInicio.setMinutes(partesHoraInicio[1]);

    let fechaFin = new Date();
    fechaFin.setHours(partesHoraFin[0]);
    fechaFin.setMinutes(partesHoraFin[1]);

    let diferencia = fechaFin - fechaInicio;

    if (diferencia < 0) {
        fechaFin.setDate(fechaFin.getDate() + 1);
        diferencia = fechaFin - fechaInicio;
    }

    let horas = Math.floor(diferencia / (1000 * 60 * 60));
    let minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
    let segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

    let resultado = horas.toString().padStart(2, '0') + ":" + minutos.toString().padStart(2, '0') + ":" + segundos.toString().padStart(2, '0');
    document.getElementById("ingreso_inicio").value = resultado;
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("ingreso").addEventListener("input", calcularIngCir);
    document.getElementById("inicio").addEventListener("input", calcularIngCir);
});

const calcularIncFin =()=> {
    let horaInicio = document.getElementById("inicio").value;
    let horaFin = document.getElementById("fin").value;

    let partesHoraInicio = horaInicio.split(":");
    let partesHoraFin = horaFin.split(":");

    let fechaInicio = new Date();
    fechaInicio.setHours(partesHoraInicio[0]);
    fechaInicio.setMinutes(partesHoraInicio[1]);

    let fechaFin = new Date();
    fechaFin.setHours(partesHoraFin[0]);
    fechaFin.setMinutes(partesHoraFin[1]);

    let diferencia = fechaFin - fechaInicio;

    if (diferencia < 0) {
        fechaFin.setDate(fechaFin.getDate() + 1); 
        diferencia = fechaFin - fechaInicio;
    }

    let horas = Math.floor(diferencia / (1000 * 60 * 60));
    let minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
    let segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

    let resultado = horas.toString().padStart(2, '0') + ":" + minutos.toString().padStart(2, '0') + ":" + segundos.toString().padStart(2, '0');
    document.getElementById("inicio_fin").value = resultado;
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("inicio").addEventListener("input", calcularIncFin);
    document.getElementById("fin").addEventListener("input", calcularIncFin);
});

const calcularProgIng =()=> {
    let horaInicio = document.getElementById("programado").value;
    let horaFin = document.getElementById("ingreso").value;

    let partesHoraInicio = horaInicio.split(":");
    let partesHoraFin = horaFin.split(":");

    let fechaInicio = new Date();
    fechaInicio.setHours(partesHoraInicio[0]);
    fechaInicio.setMinutes(partesHoraInicio[1]);

    let fechaFin = new Date();
    fechaFin.setHours(partesHoraFin[0]);
    fechaFin.setMinutes(partesHoraFin[1]);

    let diferencia = fechaFin - fechaInicio;

    if (diferencia < 0) {
        fechaFin.setDate(fechaFin.getDate() + 1); // Agregar un día a la fecha de fin
        diferencia = fechaFin - fechaInicio;
    }

    let horas = Math.floor(diferencia / (1000 * 60 * 60));
    let minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
    let segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

    let resultado = horas.toString().padStart(2, '0') + ":" + minutos.toString().padStart(2, '0') + ":" + segundos.toString().padStart(2, '0');
    document.getElementById("pro_ingreso").value = resultado;
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("programado").addEventListener("input", calcularProgIng);
    document.getElementById("ingreso").addEventListener("input", calcularProgIng);
});

const calcularProgInc =()=> {
    let horaInicio = document.getElementById("programado").value;
    let horaFin = document.getElementById("inicio").value;

    let partesHoraInicio = horaInicio.split(":");
    let partesHoraFin = horaFin.split(":");

    let fechaInicio = new Date();
    fechaInicio.setHours(partesHoraInicio[0]);
    fechaInicio.setMinutes(partesHoraInicio[1]);

    let fechaFin = new Date();
    fechaFin.setHours(partesHoraFin[0]);
    fechaFin.setMinutes(partesHoraFin[1]);

    let diferencia = fechaFin - fechaInicio;

    if (diferencia < 0) {
        fechaFin.setDate(fechaFin.getDate() + 1); // Agregar un día a la fecha de fin
        diferencia = fechaFin - fechaInicio;
    }

    let horas = Math.floor(diferencia / (1000 * 60 * 60));
    let minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
    let segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

    let resultado = horas.toString().padStart(2, '0') + ":" + minutos.toString().padStart(2, '0') + ":" + segundos.toString().padStart(2, '0');
    document.getElementById("pro_inicio").value = resultado;
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("programado").addEventListener("input", calcularProgInc);
    document.getElementById("inicio").addEventListener("input", calcularProgInc);
});



module.exports = {
    calcularIngEgr,
    calcularIngAns,
    calcularIngCir,
    calcularIncFin,
    calcularProgIng,
    calcularProgInc
};
