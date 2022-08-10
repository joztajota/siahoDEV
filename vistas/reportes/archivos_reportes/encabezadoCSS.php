
<style type="text/Css">

    /*///////////////////////////////////////////////////////////////////////////////////////////////////////
    
    ESTILOS CSS PARA INFORMES POR PANTALLA

    Desarrolado: Belkis A, Merchán G.
    Area:        AIT 
    Empresa:     Pequiven
    creado:      14 de Mayo de 2019
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

body {
    /* font-family: Arial;  */
}

.myPrintArea { 
    width: 100%; 
    height: 60px; 
    display: flex; 
    align-items: center; 
    justify-content:right;    
    border-bottom: solid 0.7mm rgb(215, 215, 235); 
    background-color:#ecf0f5;
    border: 2px solid red;
    margin: 8px 10px 8px 10px;     
}  

.tableprint {
    height:auto;
    width: 100%;
    border: 1px solid black;
    padding-left: 15px;
    padding-top: 15px;
    border-collapse: collapse;
    margin-top: 10px;
    color: black;
}

.pagencabezado1 {
    height: 15px;
    border: 1px solid black;
  /*  border-bottom : 1px solid rgb(105, 118, 231);
    border-left : 1px solid black;*/
    padding-left: 15px;
    padding-top: 5px;
    text-align: left;
    align-items: left; 
    justify-content:left; 
    width: 25%; 
    padding: 5px 10px 5px 10px;
    font-family: Arial;
}

.pagencabezado2 {
    height: 38px;
    width: 100%;
    border:0; 
    text-align: right;
    align-items: right; 
    justify-content:right;    
    border:1px black solid; 
    padding: 10px 10px 20px 10px; 
    margin:0; height:55px;
    font-family: Arial;

}

.pagencabezado3 {
    height: 15px;
    border: 1px solid black;
  /*  border-bottom : 1px solid rgb(105, 118, 231);
    border-left : 1px solid black;*/
    padding-left: 15px;
    padding-top: 5px;
    text-align: left;
    align-items: left; 
    justify-content:left; 
    width: 50%; 
    padding: 5px 10px 5px 10px;
    font-family: Arial;
}
.divencabezadoderecha1 {
    font-size: 1.4em;
    font-weight: bold; 
    margin:0 0 15px 0; 
    padding: 0; 
    height:17px;
    font-family: Arial;

}


.divencabezadoderecha2 {
    font-size: 11px;
    font-weight: normal;
    padding: 0px; 
    padding-top: 0;
    margin:25px 0 0 0;
    height:10px;
    font-family: Arial;

}

.divencabezadoderecha3 {
    font-size: 18px;
    font-weight: bold; 
    margin:0 0 15px 0; 
    padding: 0; 
    height:17px;
    font-family: Arial;
    text-align: right;


}
.titulocontenido {
    height: 2em;
    padding-left: 15px;
    padding-top: 5px;
    text-align: left;
    align-items: left; 
    justify-content:left; 
    padding: 2px 10px 5px 10px;
    font-weight: bold;
    background-color: #2442;
    border: 1px solid black;
    font-family: Arial;
    font-size:1em;
}

.fontcontenido {
    font-size: 12px;
    font-weight: normal;
    font-family: Arial;


}
.fontcontenido2 {
    height: 15px;
    border: 1px solid black;
    text-align: left;
    align-items: left; 
    justify-content:left;  
    padding: 5px 10px 5px 10px;
    font-weight: normal;
    background-color: white;
    font-size: 12px;
    font-weight: normal;
    font-family: Arial;

}


.fontcontenidocenter {
    height: 15px;
    border: 1px solid black;
    text-align: center;
    align-items: center; 
    justify-content:left;  
    padding: 5px 10px 5px 10px;
    font-weight: normal;
    background-color: white;
    font-size: 12px;
    font-weight: normal;
    font-family: Arial;

}

.titulotabladetalles {
    border: 1px solid black;
    text-align: center;
    align-items: center; 
    justify-content:center; 
    font-family: Arial;
    font-size: 12px;


}

.tddetalles {
    height: 15px;
    border: 1px solid black;
    padding-left: 15px;
    padding-top: 5px;
    text-align: left;
    align-items: left; 
    justify-content:left;    
    padding:15px;
    font-weight: bold; 
    border: 1px solid black;
    font-size: 11px;

}














.tdencabezadoprint {
    height: 15px;
    border: 1px solid black;
    padding-left: 15px;
    padding-top: 5px;
    text-align: center;
    align-items: center; 
    justify-content:center;    
    padding:15px;
    font-weight: bold; 
    font-family: Arial;
    font-size: 12px;
    
}



div.encabezadofila { 
    width: 95%; 
    height: 60px; 
    display: flex; 
    align-items: center; 
    justify-content:center ;    
    border-bottom: solid 0.7mm rgb(215, 215, 235); 
    background-color:white;
    border: 1px solid black;
    font-size: 20px;
    margin: 20px 10px 0 20px;
    padding: 0 0 0 30px;     
}  

div.fila { 
    width: 95%; 
    height: 60px; 
    display: flex; 
    align-items: center; 
    justify-content:center ;    
    border-bottom: solid 0.7mm rgb(215, 215, 235); 
    background-color:white;
    border: 1px solid black;
    font-size: 20px;
    margin: 20px 10px 0 20px;
    padding: 0 0 0 30px;     
}  

#bothov {
    height: 35px; width: 5%;
    border:2px solid #416f8a;
    background-color: #3c8dbc;
    display: flex;
    justify-content: center;
    align-content: center;
    flex-direction: column; 
    padding-left: 0.2%;   
}

 #bothov:hover {
    background-color: #367fa9; 
}

.logof  {
    width: 25%;
    height: 62px;
}

div.titulo { 
    font-weight: bold; 
    text-align: center;  
    margin-top: 3%;   
} 

span.titulo1 { 
    font-size: 15px; 
    color:#17445e;
}  

span.titulo2 { 
    font-size: 18px; 
    color:rgb(10, 11, 65);
}

span.titulo5 { 
    font-size: 18px; 
    color:rgb(10, 11, 65);
}

.titulo3 {
    width: 40%;
    height: 18px;
    margin-left: 63%;
    margin-top: -54px;

    padding-right: 3%;

    font-weight: bold; 
    font-size: 14px; 
    text-align: right;     
}

.titulo4 {
    font-weight: bold; 
    font-size: 14px; 
    text-align: right;     
}

div.note {
    border: 1mm double;
    border-color:rgb(105, 118, 231);
    width: 100%;
}

.tdbodyt {
    height: 38px;
    border-top : 1px solid black;
    border-bottom : 1px solid rgb(105, 118, 231);
    border-left : 1px solid black;
    border-right : 1px solid black;
    text-align: left;
    padding-left: 15px;
    padding-top: 5px;

}

.tdbodyc {
    border-top : 1px solid black;
    border-bottom : 1px solid rgb(105, 118, 231);
    text-align: left;
    padding-top: 5px;
}

.tdbodyf {
    width: 100%;
    border: 1px solid black;
    border-bottom : 1px solid rgb(105, 118, 231);
    text-align: left;
    padding-left: 15px;
    padding-top: 5px;
}
.tdbodyif {
    height: 98px;
    border-bottom : 1px solid rgb(105, 118, 231);
    border-left : 1px solid rgb(105, 118, 231);
    border-left : 1px solid black;
    text-align: left;
    padding-left: 15px;
    padding-top: 5px;
}

.tdbodydf {
  height: 98px;
    border-bottom : 1px solid rgb(105, 118, 231);
    border-right : 1px solid black;
    text-align: left;
    padding-left: 15px;
    padding-top: 5px;
}


label.negrita {
  font-weight: bold;
  font-size: 12px;
}

label.normal {
  font-weight: normal;
  font-size: 12px;
  padding-left: 2px;
}

.normal {
  font-weight: normal;
  font-size: 12px;
  padding-left: 2px;
}
.sv {
    width: 100%;
    height: 15px;
    border-top : 1px solid black;
    border-right : 1px solid black;
    border-left : 1px solid black;
    text-align: left;
    border-bottom : 0px;
    padding-top: 5px;
    padding-left: 15px;
    padding-bottom: 10px;
}

.sv2 {
    width: 100%;
    height:190px;
    border-top :0px;
    border-bottom : 1px solid rgb(105, 118, 231);
    border-right : 1px solid black;
    border-left : 1px solid black;
    padding-top: 5px;
    padding-left: 15px;
    padding-right: 15px;
}

.sv3 {
    width: 100%;
    border-top :0px;
    border-bottom : 1px solid rgb(105, 118, 231);
    border-right : 1px solid black;
    border-left : 1px solid black;
    padding-top: 20px;
    padding-left: 15px;
    padding-right: 15px;
    padding-bottom: 10px;

}

.sv4 {
    width: 100%;
    height:190px;
    border-top :0px;
    border-bottom : 1px solid rgb(105, 118, 231);
    border-right : 1px solid black;
    border-left : 1px solid black;
    padding-top: 0px;
    padding-left: 15px;
    padding-right: 15px;
}

.asmd {
    width: 100%;
    border-top : 1px solid black;
    border-right : 1px solid black;
    border-left : 1px solid black;
    text-align: left;
    border-bottom : 0px;
    padding-top: 5px;
    padding-left: 15px;
    padding-bottom: 10px;
}

.fam {
    width: 100%;
    border-top :0px;
    border-bottom : 1px solid rgb(105, 118, 231);
    border-right : 1px solid black;
    border-left : 1px solid black;
    padding-top: 5px;
    padding-left: 15px;
    padding-right: 15px;
}
.id {
    width: 100%;
    height:100px;
    border-top :0px;
    border-bottom : 1px solid rgb(105, 118, 231);
    border-right : 1px solid black;
    border-left : 1px solid black;
    padding-top: 5px;
    padding-left: 15px;
    padding-right: 15px;
}

div.normaljam {
  font-weight: normal;
  font-size: 12px;
  text-align: justify;
}

div.normalj {
  font-weight: normal;
  font-size: 12px;
  text-align: justify;
  margin-top: -28px;
}

div.normaljms {
  font-weight: normal;
  font-size: 12px;
  text-align: justify;
  margin-top: -55px;
}

div.normaljam {
  font-weight: normal;
  font-size: 12px;
  text-align: justify;
  margin-top: 10px;
}
/* Estilos Atencion Médica   */

.amsin {
    width: 100%;
    border-top :0px;
    border-bottom : 1px solid rgb(105, 118, 231);
    border-right : 1px solid black;
    border-left : 1px solid black;
    padding-top: 5px;
    padding-left: 15px;
    padding-right: 15px;
}

.titulo1am { 
    font-size: 15px; 
    color:#17445e;
    border:1px;
    margin-top: 20px;
    height: 20px;
}  

.titulo2am { 
    margin-top: 6px;
    margin-bottom: 16px;

    font-size: 20px;     
    border:1px;
    height: 30px;
    color:rgb(10, 11, 65);

}

/* Estilos para Informe Médico   */

.tdie {
    padding-top: 3%;
    text-align: left;
    height: 65px;
}

.tdim {
    padding-top: 4%;
    text-align: left;
    height: 35px;
}

.tdi {
    padding-top: 1%;
    text-align: left;
    height: 35px;
}

.tdi2 {
    padding-top: 10%;
    text-align: left;
    height: 35px;
    border-bottom: 2.3px double;      
}

.tdi3 {
    padding-top: 5%;
    text-align: left;
    height: 35px;
    border-bottom: 2.3px double;      
}

.tdi6 {
    padding-top: 5%;
    text-align: left;
    height: 35px;
}
.al {
    text-align: left;
}


.ar {
    text-align: right;
}

.borcolint {
    border-color: rgb(161, 158, 170); 
}
.borcolinthr {
    border: 0px;
}

.tdbodysb {
    text-align: left;
    padding-top: 5px;
    padding-right:35px;
    border: 0px;    
}

.tdbodysbi {
    text-align: left;
    padding-top: 5px;
    padding-right:35px;
    border: 0px;    
    height: 35px; 
}

.tdsbhr {
    border: 0px;    
    height: 25px; 
}

.tdbodysbtrm {
    text-align: left;
    padding-top: 50px;
    border: 0px;    
}

.tdrm1 {
    text-align: left;
    padding-top: 2%;
    border: 0px;    
}

.tdbodysbrm {
    text-align: left;
    padding-top: 5px;
    border: 0px;    
}

.tdbodyfs {
    padding-left: 5px;
    padding-top: 50px;
    padding-bottom: 30px;
    height: 100px; 
    border: 0;

}

.tdbodydiag {
    text-align: justify;
    padding-top: 5px;
    border-bottom: 1px solid rgb(37, 37, 43);  
    height: 30px;
}

label.negritaim {
  font-weight: bold;
  font-size: 14px;
}

label.normalim {
  font-weight: normal;
  font-size: 14px;
  padding-left: 10px;
}

label.normalcim {
  font-weight: normal;
  font-size: 12px;
  padding-left: 2px;
  height: 35px;
  padding-top: 3%;
}

label.normalrm {
  font-weight: normal;
  font-size: 12px;
  padding-left: 2px;
}

/* Estilos para Solicitud de Asistencia Médica  */
.tdv {
    border: 0px;    
    height: 10px;
}

.tdamedi {
    padding-top: 1%;
    height: 45px;
    border-bottom: 2.3px double rgb(161, 158, 170);    
    border: 1px double rgb(161, 158, 170); 
    border-top: 0px;
}

.tdamedd {
    padding-top: 1%;
    text-align: center;
    height: 45px;
    border-bottom: 2.3px double rgb(161, 158, 170);    
    border-right: 1px double rgb(161, 158, 170); 
}

label.normalamed {
  font-weight: normal;
  font-size: 12px;
  padding-left: 0px;
  height: 25px;
  padding-top: 2%;
}

label.negritaamed {
  font-weight: bold;
  font-size: 12px;
}
/*//////////////////////////////////////////////////////////////////////////////////

estilo de hojas
*/
body {
   background: white;
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}

</style>

