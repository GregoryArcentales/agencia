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

const toggleMenu = document.querySelector('.toggle-menu');
toggleMenu.addEventListener('click', e => {
    const contenedor = document.querySelector('.pagina')
    contenedor.classList.toggle('no-menu')
})

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
         const ganancia = total.toFixed(2)
        const templateHTML = `
            <div class="col-6">
                <p class="datos-carrera font-weight-bold mb-2">Nombre del cliente: <span class="font-weight-normal">${nombre.nombre_cliente} ${nombre.apellido_cliente}</span></p>
                <p class="datos-carrera font-weight-bold mb-2">Nombre del chofer: <span class="font-weight-normal">${nombre.nombre_chofer} ${nombre.apellido_chofer}</span></p>
                <p class="datos-carrera font-weight-bold mb-2">Dirección de salida: <span class="font-weight-normal">${nombre.dir_salida}</span></p>
                <p class="datos-carrera font-weight-bold mb-2">Dirección de destino: <span class="font-weight-normal">${nombre.dir_destino}</span></p>
            </div>
            <div class="col-6">
                <p class="datos-carrera font-weight-bold mb-2">Fecha y hora de carrera: <span class="font-weight-normal">${nombre.created_at}</span></p>
                <p class="datos-carrera font-weight-bold mb-2">Valor de la carrera: <span class="font-weight-normal">$ ${nombre.val_carrera}</span></p>
                <p class="datos-carrera font-weight-bold mb-2">Gastos: <span class="font-weight-normal">$ ${nombre.gasto_carrera}</span></p>
                <p class="datos-carrera font-weight-bold mb-2">Ganancias: <span class="font-weight-normal">$ ${ganancia}</span></p>
           </div>
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

//añade los gastos de las carreras
const btnGasto = document.querySelector('.btn-crearGasto')
const containerGastos = document.querySelector('.container-gastos')
if (btnGasto) {
    let c=0
    let acumuladorGastos = 0
    total = 0
    btnGasto.addEventListener('click', e => {
        const btnSubmitGasto = document.querySelector('.btn-submit-gasto')
        const contadorGastos = document.getElementById('contadorGastos')
        const totalGastos = document.getElementById('totalGastos')
        const totalGanancia = document.getElementById('totalGanancia')
        const valorCarrera = document.querySelector('.valor-carrera').innerHTML
        const nombreGasto = document.getElementById('nombreGasto').value
        const gasto = document.getElementById('gasto').value

        const div = document.createElement('div')
        div.classList = 'gasto d-flex align-items-center mb-3'
        const template = `
        <label for="" class="col-3">${nombreGasto}:</label>
        <input type="hidden" name="nombreGasto${c}" value="${nombreGasto}">
        <input class="form-control col-9 col-md-7 inputGasto" type="text mb-2" name="inputGasto${c}" placeholder="" value="${gasto}" readonly>
        `
        div.innerHTML=template
        containerGastos.insertAdjacentElement('beforeend', div)
        btnSubmitGasto.removeAttribute('disabled')

        acumuladorGastos += parseFloat(gasto, 10)
        total = (parseFloat(valorCarrera,10)) - acumuladorGastos

        totalGastos.value = acumuladorGastos.toFixed(2)
        totalGanancia.value = total
        contadorGastos.value = c
        c++
    })
}








