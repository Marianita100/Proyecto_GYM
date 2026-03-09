const params = new URLSearchParams(window.location.search);
const id = params.get("id");


const entrenadores = {
  1:{
    nombre:"Juan Pérez",
    edad:"28 años",
    exp:"5 años",
    horario:"6am - 12pm",
    esp:"Hipertrofia",
    foto:"../img/entrenador1.jpg"
  },
  2:{
    nombre:"Carlos Ramírez",
    edad:"35 años",
    exp:"10 años",
    horario:"12pm - 6pm",
    esp:"Fuerza",
    foto:"../img/entrenador2.jpg"
  },
  3:{
    nombre:"Luis Torres",
    edad:"30 años",
    exp:"7 años",
    horario:"4pm - 9pm",
    esp:"Cardio",
    foto:"../img/entrenador3.jpg"
  },
  4:{
    nombre:"Ana López",
    edad:"27 años",
    exp:"6 años",
    horario:"7am - 1pm",
    esp:"Funcional",
    foto:"../img/entrenador4.jpg"
  }
};

const e = entrenadores[id];


document.getElementById("titulo").textContent = e.nombre;
document.getElementById("nombre").textContent = "Nombre: " + e.nombre;
document.getElementById("edad").textContent = "Edad: " + e.edad;
document.getElementById("exp").textContent = "Experiencia: " + e.exp;
document.getElementById("horario").textContent = "Horario: " + e.horario;
document.getElementById("esp").textContent = "Especialidad: " + e.esp;
document.getElementById("foto").src = e.foto;