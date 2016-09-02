<div class="container">
  <div class="jumbotron">
    <center><h1 class="font-OSCB color-red">Nuestros <span class="font-OSCI  color-black">Productos</span></h1>
    <p class="text-muted font-OSCI">
      Productos refrigerantes de motor, limpiaparabrisas, productos químicos para tratamientos de calderas y sistemas de enfriamiento.
      Ofrecemos nuestros productos y tecnología en pro del desarrollo de la industria.
    </p></center>
  </div>
  <div class="row">
    <div class="col-md-4 text-center wrap-img-txt"  onclick="rotate(this);">
      <div class="div-img">
        <img class="img-circle" src="images/thumb-limpiadores-y-desengrasantes-qvar.jpg" alt="" />
      </div>
      <div class="div-text" onclick="javascript:window.location='?tipo=limpiadores-y-desengrasantes'">
        <div>
            <h3 class="color-red">Limpiadores y Desengrasantes</h3>
          <p>
            Limpiadores y desengrasantes EXRO a base de agua,
            removedores eficaces de la suciedad, son de facil manejo y aplicacion!
            para la limpieza de bloques de motor, areas de trabajo entre otros.
            No afectan metales no dañan la pintura, cauchos o empaques.
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-4 text-center wrap-img-txt"  onclick="rotate(this);">
      <div class="div-img">
        <img class="img-circle" src="images/thumb-tratamiento-de-agua-qvar.jpg" alt="" />
      </div>
      <div class="div-text" onclick="javascript:window.location='?tipo=polimeros-para-tratamiento-de-agua'">
        <div>
            <h3 class="color-red">Polimeros para Tratamiento de Aguas</h3>
          <p>
            Polimeros para tratamiento de aguas EXRO, enfocados en el tratamiento de aguas industriales,
            distribuimos coagulantes para clarificacion de aguas
            y poliacrilamidas para el tratamiento de aguas residuales (espesamiento y deshidratacion de lodos).
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-4 text-center wrap-img-txt"  onclick="rotate(this);">
      <div class="div-img">
        <img class="img-circle" src="images/thumb-torre-enfriamiento-qvar.jpg" alt="" />
      </div>
      <div class="div-text" onclick="javascript:window.location='?tipo=productos-para-torres-de-enfriamiento'">
        <div>
            <h3 class="color-red">Productos para Torres de Enfriamiento</h3>
          <p>
            Productos para torres de enfriamiento EXRO, especializados en:
            control de crecimiento de algas y microorganismos,
            control de depositos de incrustaciones,
            evitar y controlar la corrosion en sistemas de recirculacion de agua de enfriamiento, tanques y piscinas
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-offset-2 col-md-4 text-center wrap-img-txt"  onclick="rotate(this);">
      <div class="div-img">
        <img class="img-circle" src="images/thumb-calderas-qvar.jpg" alt="" />
      </div>
      <div class="div-text" onclick="javascript:window.location='?tipo=productos-para-calderas'">
        <div>
            <h3 class="color-red">Productos para Calderas</h3>
          <p>
            Productos para calderas EXRO, Evitan la corrosion en sistemas de produccion de vapor
            y en los sistemas de condensado, reducen la formacion de incrustaciones
            y remueven los solidos formados durante el uso de la caldera
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-4 text-center wrap-img-txt"  onclick="rotate(this);">
      <div class="div-img">
        <img class="img-circle" src="images/thumb-automotriz-qvar.jpg" alt="" />
      </div>
      <div class="div-text" onclick="javascript:window.location='?tipo=linea-automotriz'">
        <div>
            <h3 class="color-red">Linea Automotriz</h3>
          <p>
          Shampoo para carros, desengrasantes, limpiaparabrisas, refrigerantes para motor (anticorrosivos y elevadores del punto de ebullicion),
          para todo tipo de vehiculos. Todo para la refrigeracion de motores de Gasolina, Diesel o Gasoil, con inhibidores de corrosion e incrustacion.
          </p>
        </div>
      </div>
    </div>

  </div>
  <div class="col-lg-12">
      <hr class="featurette-divider">
        <h2 class="text-center font-NYCD footer-slogan">Con la mas extensa gama en el mercado Venezolano.</h2>
      <hr class="featurette-divider">
  </div>
</div>
<script type="text/javascript" src="js/myJs.js">
</script>
<script>
window.onload = function(){
  autoRotate();
}

function autoRotate(){
  var rotatingImgs = document.getElementsByClassName("div-img");
  var rotatingTxts = document.getElementsByClassName("div-text");
  var time = 100;
  function rotate(i){

    rotatingImgs[i].style.transform = "rotateY(360deg)";
  }


  for(var i = 0; i < rotatingImgs.length; i++){
    time += 300;
    setTimeout(rotate,time,i);
  }

}
function rotate(elemento){
  for (i in elemento.childNodes){
    if(elemento.childNodes[i].tagName == "DIV"){
     if(elemento.childNodes[i].className == "div-img"){
       elemento.childNodes[i].style.transform = "rotateY(90deg)";
     }
     if(elemento.childNodes[i].className == "div-text"){
       elemento.childNodes[i].style.transform = "rotateY(0deg)";
     }
    }
  }


}

</script>
