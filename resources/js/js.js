import Axios from "axios";

const menuIzquierdo = document.querySelector('.menu-izquierdo');
const tabCarrera = document.querySelector('.tabCarrera')
const clienteNuevaCarrera = document.querySelector('.clienteNuevaCarrera')

//oculta y muestra el menu
menuIzquierdo.addEventListener('click', (e)  => {
       const claseMenu = e.target.classList;

       const contenedor = document.querySelector('.pagina'),
             flechaIzq = document.querySelector('.fa-arrow-left'),
             flechaDer = document.querySelector('.fa-arrow-right');

       if(claseMenu.contains('fa-arrow-left') ) {

            contenedor.classList.add('no-menu');
            e.target.style.display = 'none';
            flechaDer.style.display = 'block';
       } else if( claseMenu.contains('fa-arrow-right')) {
            contenedor.classList.remove('no-menu');
            e.target.style.display = 'none';
            flechaIzq.style.display = 'block';
       }
});
//agrega el nombre del cliente en el modal de crear carrera
if (tabCarrera) {
    tabCarrera.addEventListener('click', e =>{
        if(e.target.classList.contains('btnNuevaCarrera')){
            const nombreCliente=e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML
            clienteNuevaCarrera.value = nombreCliente
        }
    })
}

//agrega la informaión de la carrera en el modal
const tabInfoCarrera = document.querySelector('.tabInfoCarrera')
if (tabInfoCarrera) {
    tabInfoCarrera.addEventListener('click', e =>{
        if(e.target.classList.contains('btnInfoCarrera')){
            const idCliente=e.target.parentElement.parentElement.id
            //console.log(idCliente)
            fetch(`/carrera/${idCliente}`)
            .then(response => {
                return response.json();
              })
              .then(data => {
                    mostrarDatosCarrera(data)
              });
        }
    })
}
const mostrarDatosCarrera = data => {
    const contenedoInfoCarrera = document.querySelector('.contenedor-info-carrera')
    data.forEach(nombre => {
         const total = nombre.val_carrera - nombre.gasto_carrera
        const templateHTML = `
        <p class="datos-carrera font-weight-bold">nombre del cliente:</p>
        <span>${nombre.nombre_cliente}</span>
        <p class="datos-carrera font-weight-bold">nombre chofer:</p>
        <span>${nombre.nombre_chofer}</span>
        <p class="datos-carrera font-weight-bold">direccion inicial:</p>
        <span>${nombre.dir_partida}</span>
        <p class="datos-carrera font-weight-bold">direccion destino:</p>
        <span>${nombre.dir_destino}</span>
        <p class="datos-carrera font-weight-bold">valor de la carrera:</p>
        <span>$ ${nombre.val_carrera}</span>
        <p class="datos-carrera font-weight-bold">gasto de la carrera:</p>
        <span>$ ${nombre.gasto_carrera}</span>
        <p class="datos-carrera font-weight-bold">gasto total de la carrera</p>
        <span>$ ${total}</span>
    `
        contenedoInfoCarrera.innerHTML=templateHTML
      });
}

//Validar campos del formmulario de carrera
const formulario = document.getElementById('formulario'),
        select = document.getElementById('inputState'),
        salida = document.getElementById('salida'),
        destino = document.getElementById('destino'),
        valor = document.getElementById('valor'),
        gasto = document.getElementById('gasto'),
        error = document.querySelector('.error')
if (formulario) {
    formulario.addEventListener('submit', e => {
        const data = new FormData(formulario)
        if (data.get('select') === '' || data.get('dirSalida') === '' || data.get('dirDestino') === '' ||        data.get('valCarrera') === '' || data.get('gastoCarrera') === '' ) {
            e.preventDefault()
            if (data.get('select') === '') {
                select.focus()
            }else if (data.get('dirSalida') === '') {
                salida.focus()
            }else if (data.get('dirDestino') === '') {
                destino.focus()
            }else if (data.get('valCarrera') === '') {
                valor.focus()
            }else if (data.get('gastoCarrera') === '') {
                gasto.focus()
            }
            error.style.display = 'block'
        }else{
            error.style.display = 'none'
            return true
        }
    })
}



//Coloca en color rojo los choferes eliminados
const nomChofer = document.querySelectorAll('.nombreChofer')
nomChofer.forEach(nombre => {
    if (nombre.classList.contains('1')) {
        nombre.classList.add('nom-rojo')
    }
});

//Función para mostrar y ocultar las actividades del cliente-->
const btnActividades = document.querySelector('.btn-actividades')
const flecha = document.querySelector('.flecha')
const divActividades = document.getElementById('actividad')
if (btnActividades) {
    btnActividades.addEventListener('click', e => {
        if (divActividades.classList.contains('mostrar-actividad')) {
            divActividades.classList.remove('mostrar-actividad')
            flecha.classList.add('flecha-giro')
        }else{
            divActividades.classList.add('mostrar-actividad')
            flecha.classList.remove('flecha-giro')
        }
    })
}






