<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 16:23:29
  from 'C:\TUDAI\PROGRAMAS\xampp\htdocs\web2\tpe\css\style.css' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6f4ee155e885_45469225',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d057fa887dda567fcf1e5667467e7ad3158e50d' => 
    array (
      0 => 'C:\\TUDAI\\PROGRAMAS\\xampp\\htdocs\\web2\\tpe\\css\\style.css',
      1 => 1601130133,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6f4ee155e885_45469225 (Smarty_Internal_Template $_smarty_tpl) {
?>body{
    font-family: 'Baloo';
    margin: 2%;
    padding: 0;
}

@font-face{
    font-family: 'Baloo';
    src: url('https://fonts.gstatic.com/s/raleway/v11/0dTEPzkLWceF7z0koJaX1A.woff2');
}
@font-face{
    font-family: 'Wingding';
    src: url('https://fonts.gstatic.com/s/bungeeinline/v2/Tb-1914q4rFpjT-F66PLCTxObtw73-qQgbr7Be51v5c.woff2');
}

/*HEADER*/
header {
    display: flex;
    background-image: url(../img/background.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    align-items: center;
    color: white;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
header .logo{
    height: 30%;
    width: 30%;
    margin: 3%;
}
header .logo img{
    width: 100%;
    height: 100%;
}
header .titulo{
    width: 60%;
    text-align: left;
}
header .titulo h1{
    width: 100%;
    height: 100%;
    font-size: 200%;
}
header .btnmenu{
    margin: 1%;
    font-size: xx-large;
    color: white;
    background-color: transparent;
    border: none;
}

header .btnmenu:hover{
    color: #041131;
    background-color: white;
    border-radius: 20%;
}

/*NAV*/
.navigation {
    list-style: none;
    display: none;
    flex-direction: column;
    background: #041131;
    color: white;
    font-size: x-large;
    font-weight: bold;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    padding: 20px;
    margin: 0;
}

ul.navigation.show{
    display: flex;
}

ul.navigation a{
    text-decoration: none;
    color: white;
}
ul.navigation a:visited{
    color: white;
}
ul.navigation a:hover {
    color:   #5273C7;
    transition: 0.3s;
}


/*ABOUT US*/
.contenido {
    display: flex;
    flex-flow: row wrap;
    margin-top: 8%;
    background-color: white;
    align-items: center;
    }
p{
    color: #454B5A;
    text-align: justify;
    line-height: 120%;
    margin: 0;
}
.imgcontenido{
    width: 100%;
    
}
.imgcontenido img{
    width: 98%;
    border-radius: 50%;
    margin: 1%;
    align-self: center;
    
}
.textcontenido{
    color: #041131;
}
.textcontenido h2{
    text-align: center;
}

/*TABLA*/
.vencimientos{
    display: flex;
    flex-direction: column;
}

.tblvencimientos {
    margin-top: 9%;
    margin-bottom: 9%;
    text-align: center;
    background-color: #DAEFF8;
    border-radius: 3%;
    padding: 6%;
    display: flex;
    flex-direction: column;
    align-items: center;
    align-self: center;
}

.tblvencimientos h2{
    margin: 0;
    padding: 1%;
    line-height: 100%;
    
}

table{
    border-collapse: collapse;
    font-size: medium;
    width: auto;
}

thead{
    color: #041131;
}

.tblCUIT{
    background-color: #456979;
    color:#DAEFF8;
    border: thin solid grey;
}

th, td{
    border-bottom: thin solid grey;
}

h3{
    font-weight: lighter;
}

hr{
    border-top: solid 2px #424C63;
}
.Filtro select{
    color: #DAEFF8;
    display: table-column;
    background-color:  #456979;
    text-align-last: center;
    -webkit-appearance: none;
    font-weight: bold;
    padding: 2px;
    border-radius: 10px;
}
.formvencimientos{
    display: flex;
    flex-direction: column;   
}

.btnvencimientos{
    display: flex;
    justify-content: space-evenly;
    width: auto;
    margin: 5% 0%;
}

.btnvencimientos button{
    background-color: #041131;
    color: white;
    padding: 2%;
    
}
.btnEdita button{
    font-family: 'Wingding';
    color:  #041131;
    font-weight: bolder;
}

.btnBorra button{
    font-family: 'Wingding';
    color:  #041131;
    font-weight: bolder;
}
.btnOculto{
    display: none;
}

.filaOculta {
    display: none;
}
/*CONTACTO*/
.contacto {
    display: flex;
    flex-direction: column;
    margin-top: 9%;
}

.contacto h2{
    margin: 0;
}

.Formulario{
    display: flex;
    flex-direction: column;
    background-color: #456979;
    padding: 7%;
    border-radius: 4%;
    color: white;
}

.Formulario h2{
    color: #041131;
    font-weight: bolder;
    margin: 0;
}

.FormContent{
    display: flex;
    flex-direction: column;
}

input{
    font-size: larger;
}

.contacto span{
    font-weight: bold;
}

.redes{
    display: flex;
    justify-content: space-evenly;
    flex-flow: row wrap;
    text-align: center;
    margin: 0;
    padding-top: 20px;
}

.redes p{
    padding: 10px;
}

.redes img{
    height: 100px;
}

.verify{
    padding: 10px 0 ;
    width: 100%;
    display: flex;
    justify-content: space-evenly;
}

.captcha{
    display: inline-flex;
}
.captcha img{
    width: 33%;
}

#btnContacto{
    background-color: #041131 ;
    color: white;
    padding: 10px;
    border-radius: 10%;
    align-self: center;
    margin-top: 10px;
}

#btnActualizarCaptcha{
    background-color:  #456979 ;
    color: #041131;
    padding: 2%;
    border-radius: 10%;
    font-weight: bolder;
    align-self: center;
}

#resultadoCaptcha::-webkit-inner-spin-button,#resultadoCaptcha::-webkit-outer-spin-button, #inputTelefono::-webkit-inner-spin-button, #inputTelefono::-webkit-outer-spin-button {
    -webkit-appearance: none; 
}

.deshabilitado{
    display: none;
}
/*HTML SERVICIOS*/
.servicios{
    display:flex;
    justify-content: center;
    flex-flow: row wrap;
    margin: 80px 0;
}
.servicios ul{
    list-style-type: circle;
    text-align: justify;
}
.servicios div{
    text-align: center;
}
.servicios div img{
    width: 150px;
    height: 170px;
}

.servicios h3{
    background-color: #424C63;
    border-radius: 15px;
    padding: 15px;
    margin-bottom: 10px;
    text-align: center;
    font-size: xx-large;
    color:white;
}

.primero{
    display: flex;
    flex-direction: column;
    margin: 0 10px;   
}
.segundo{
    display: flex;
    flex-direction: column;
    margin: 0 10px;
}

/*FAQ*/

h4{
    background-color:#456979 ;
    border-radius: 30px;
    color:white;
    padding: 10px;
    font-size: x-large;
}

h5{
    color: #456979 ;
    margin: 0;
    padding: 0px;
    font-size: larger;
    font-weight: bolder;
}
.FAQEncabezado{
    display: flex;
    width: 100%;
    flex-flow: row wrap;
    align-items: center;
    justify-content: center;
    margin: 80px 0;
}

.FAQEncabezado h2{
    font-size: xx-large;
    text-align: center;
}

.FAQEncabezado img{
    width: 300px;
}

.FAQContenido{
    display: flex;
    flex-flow: row wrap;
    margin: 5%;
    margin-top: 0;
}

.FAQ p{
    line-height: 150%;
}

footer {
    color: white;
    background-color:#777975;
    text-align: center;
    line-height: 200%;
    font-size: small;
}

@media only screen and (min-width: 800px){
    
/*header*/
    header .titulo h1{
        font-size: 500%;

    }
    
    header .logo{
        width: 20%;
    }
    
    header .btnmenu{
        display: none;
    }

/*NAV*/

    .navigation{
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }
    .btnmenu{
        display: none;
    }

/*ABOUT US*/
    .contenido{
        justify-content: space-evenly;
    }

    .contenido h2{
        font-size: xx-large;
    }

    .contenido .imgcontenido {
        width: 25%; 
    }

    .contenido .textcontenido{
        width: 55%;
    }

    .contenido .textcontenido p{
        font-size: larger;
        line-height: 150%;
    }

    
/*VENCIMIENTOS*/
    .vencimientos{
        display: flex;
        justify-content: space-evenly;
        flex-flow: row wrap;
        align-items: center;
    }

    .tblvencimientos {
        width: 40%;
        padding: 2%;
    }
    
    .tblvencimientos table {
        width: 90%;
        font-size: larger;
    }
    
    .formvencimientos{
        width: 30%;   
    }


/*CONTACTO*/
    .contacto{
        flex-flow: row wrap;
        justify-content: space-evenly;
    }

    .contacto .Formulario{
        padding: 2%;
        width: 40%;
    }
}<?php }
}
