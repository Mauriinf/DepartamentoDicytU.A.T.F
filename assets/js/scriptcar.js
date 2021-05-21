/* # Validando Formulario
============================================*/
$(document).ready(function(){
  $('#proyectos').validate({
    errorElement: "span",
    ignore: [],
    rules: {
      titulo:{required:true, minlength:2,},
      objetivog:{required:true, minlength:3,},
      resumen:{required:true,},
      conclu:{required:true,},
      tipo:{required:true,},
      facultadp:{required:true,},
      carrerap:{required:true,},
      fileimagen:{required:true,},
      autor:{required:true, alphas:true,},
      gestion:{required:true, numeros:true,minlength:4,maxlength:4,},
      tipos:{required:true, alphas:true,},
      tutor:{required:true, alphas:true,},
      tipoinves:{required:true, alphas:true,},
     },
    messages: {
      titulo:{required:"* Introduzca titulo de Proyecto", minlength:"Minimo de caracteres dos"},
      objetivog:{required:"* Introduzca Objetivo General", minlength:"Minimo de caracteres tres"},
      resumen:{required:"* Introduzca Resumen"},
      conclu:{required:"* Introduzca Conclusiones"},
      tipo:{required:"* Escoja Tipo Investigador"},
      facultadp:{required:"* Escoja Facultad"},
      carrerap:{required:"* Escoja Carrera"},
      fileimagen:{required:"* Debe Subir Imagen"},
      autor:{required:"* Introduzca Autor"},
      gestion:{required:"* Introduzca Gestion", minlength:"Minimo de caracteres cuatro",maxlength:"Maximo de caracteres cuatro",},
      tipos:{required:"* Introduzca Tipo de Investigacion"},
      tutor:{required:"* Introduzca Tutor"},
      tipoinves:{required:"* Introduzca Tipo de Investigacion",},

    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });
/*facultad*/
  $('#form_fac').validate({
    errorElement: "span",
    rules: {
      nombrefac:{required:true, minlength:2, alphas:true,},
      fileimagen:{required:true, minlength:2, },
      fileimagenr:{required:true, minlength:2, },
     },
    messages: {
      nombrefac:{required:"* Introduzca Nombre de Facultad", minlength:"Minimo de caracteres dos"},
      fileimagen:{required:"* Introduzca Imagen de Facultad", minlength:"Minimo de caracteres dos", },
      fileimagenr:{required:"* Introduzca Imagen que Relacione a su Facultad", minlength:"Minimo de caracteres dos", },
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });

  /*carrera*/
  $('#form_carrera').validate({
    errorElement: "span",
    rules: {
      facultad:{required:true,},
      nomcarrera:{required:true, minlength:2, alphas:true,},
      nfac:{required:true, minlength:2, alphas:true,},
     },
    messages: {
      facultad:{required:"* Campo Obligatorio",},
      nomcarrera:{required:"* Introduzca Nombre de Carrera", minlength:"Minimo 2 caracteres",},
      nfac:{required:"* Introduzca Nombre de Carrera", minlength:"Minimo 2 caracteres",},
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });

   /*cargo*/
  $('#form_car').validate({
    errorElement: "span",
    rules: {
      nombrecar:{required:true, alphas:true,},
      ncar:{required:true, alphas:true,},
     },
    messages: {
      nombrecar:{required:"* Campo Obligatorio",},
      ncar:{required:"* Campo Obligatorio",},
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });
  /*personal*/
   $('#form_personal').validate({
    errorElement: "span",
    rules: {
      nomco:{required:true, minlength:2, alphas:true,},
      nomc:{required:true, minlength:2, alphas:true,},
      apat:{required:true, minlength:2, alphas:true,},
      amat:{required:true, minlength:2, alphas:true,},
      cargo:{required:true,},
      email:{required:true, minlength:2,correo:true,},
      ci:{required:true, minlength:2,},
      direc:{required:true, minlength:2,},
      fileimagen:{required:true, minlength:2,},
     },
    messages: {
      nomco:{required:"* Introduzca Nombre Completo", minlength:"Minimo de caracteres dos",},
      nomc:{required:"* Introduzca Nombre Completo", minlength:"Minimo de caracteres dos",},
      apat:{required:"* Introduzca Apellido Paterno", minlength:"Minimo de caracteres dos",},
      amat:{required:"* Introduzca Apellido Materno", minlength:"Minimo de caracteres dos",},
      cargo:{required:"* Introduzca Cargo", minlength:"Minimo de caracteres dos",},
      email:{required:"* Introduzca Email", minlength:"Minimo de caracteres dos",},
      ci:{required:"* Introduzca Carnet de Identidad", minlength:"Minimo de caracteres dos",},
      direc:{required:"* Introduzca Direccion", minlength:"Minimo de caracteres dos",},
      fileimagen:{required:"* Introduzca Imagen", minlength:"Minimo de caracteres dos",},
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });
/*portada*/
   $('#form_portada').validate({
    errorElement: "span",
    rules: {
      titulo:{required:true, minlength:2,},
      desc:{required:true, minlength:2,},
      fileimagen:{required:true, minlength:2,},
     },
    messages: {
      titulo:{required:"* Introduzca Titulo de Portada", minlength:"Minimo de caracteres dos",},
      desc:{required:"* Introduzca Descripcion", minlength:"Minimo de caracteres dos",},
      fileimagen:{required:"* Introduzca Imagen", minlength:"Minimo de caracteres dos",},
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });
/*convocatorias*/
$('#form_convocatoria').validate({
    errorElement: "span",
    rules: {
      titulo:{required:true, minlength:2,},
      desc:{required:true, minlength:2,},
      resumen:{required:true, minlength:2,},
      requi:{required:true, minlength:2,},
      fi:{required:true, minlength:2,},
      ff:{required:true, minlength:2,},
      fileimagen:{required:true, minlength:2,},
      tipo_con:{required:true,},
     },
    messages: {
      titulo:{required:"* Introduzca Titulo", minlength:"Minimo de caracteres dos",},
      desc:{required:"* Introduzca Descripcion", minlength:"Minimo de caracteres dos",},
      resumen:{required:"* Introduzca Resumen", minlength:"Minimo de caracteres dos",},
      requi:{required:"* Introduzca Requisito", minlength:"Minimo de caracteres dos",},
      fi:{required:"* Introduzca Fecha de Inicio", minlength:"Minimo de caracteres dos",},
      ff:{required:"* Introduzca Fecha Final", minlength:"Minimo de caracteres dos",},
      fileimagen:{required:"* Introduzca Imagen", minlength:"Minimo de caracteres dos",},
      tipo_con:{required:"* Introduzca Tipo de Convocatoria", minlength:"Minimo de caracteres dos",},
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });
/*usuarios*/
   $('#from_usuario').validate({
    errorElement: "span",
    rules: {
      nomu:{required:true, minlength:2, alphas:true,},
      apat:{required:true, minlength:2, alphas:true,},
      amat:{required:true, minlength:2, alphas:true,},
      ci:{required:true, minlength:7,},
      direc:{required:true, minlength:2,},
      telf:{required:true, minlength:7,digits:true,},
      email:{required:true, minlength:2,correo:true,},
      usu:{required:true, minlength:2,},
      fileimagen:{required:true,},
      contra:{required:true, minlength:2,},
      rol:{required:true,},
      facultadp:{required:true,},
      carrerap:{required:true,},
      RadioGroup1:{required:true,},
     },
    messages: {
      nomu:{required:"* Introduzca Nombre", minlength:"Minimo de caracteres dos"},
      apat:{required:"* Introduzca Apellido Paterno", minlength:"Minimo de caracteres dos"},
      amat:{required:"* Introduzca Apellido Materno", minlength:"Minimo de caracteres dos"},
      ci:{required:"* Introduzca Carnet de Identidad", minlength:"Minimo de caracteres siete"},
      direc:{required:"* Introduzca Direccion", minlength:"Minimo de caracteres dos"},
      telf:{required:"* Introduzca Telefono", minlength:"Minimo de caracteres siete", digits:"Solo Numeros"},
      email:{required:"* Introduzca Email", minlength:"Minimo de caracteres dos"},
      usu:{required:"* Introduzca Usuario", minlength:"Minimo de caracteres dos"},
      fileimagen:{required:"* Introduzca Imagen",},
      contra:{required:"* Introduzca Contraseña", minlength:"Minimo de caracteres dos"},
      rol:{required:"* Introduzca Rol de Usuario",},
      facultadp:{required:"* Introduzca Rol de Facultad",},
      carrerap:{required:"* Introduzca Rol de Carrera",},
      RadioGroup1:{required:" ",},
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });
/*usuarios1*/
   $('#from_usuario1').validate({
    errorElement: "span",
    rules: {
      nomu:{required:true, minlength:2, alphas:true,},
      apat:{required:true, minlength:2, alphas:true,},
      amat:{required:true, minlength:2, alphas:true,},
      ci:{required:true, minlength:7,},
      direc:{required:true, minlength:2,},
      telf:{required:true, minlength:7,digits:true,},
      email:{required:true, minlength:2,correo:true,},
      usu:{required:true, minlength:2,},
      fileimagen:{required:true,},
      contra:{required:true, minlength:2,},
      rol:{required:true,},
      facultadp:{required:true,},
      carrerap:{required:true,},
     },
    messages: {
      nomu:{required:"* Introduzca Nombre", minlength:"Minimo de caracteres dos"},
      apat:{required:"* Introduzca Apellido Paterno", minlength:"Minimo de caracteres dos"},
      amat:{required:"* Introduzca Apellido Materno", minlength:"Minimo de caracteres dos"},
      ci:{required:"* Introduzca Carnet de Identidad", minlength:"Minimo de caracteres siete"},
      direc:{required:"* Introduzca Direccion", minlength:"Minimo de caracteres dos"},
      telf:{required:"* Introduzca Telefono", minlength:"Minimo de caracteres siete", digits:"Solo Numeros"},
      email:{required:"* Introduzca Email", minlength:"Minimo de caracteres dos"},
      usu:{required:"* Introduzca Usuario", minlength:"Minimo de caracteres dos"},
      fileimagen:{required:"* Introduzca Imagen",},
      contra:{required:"* Introduzca Contraseña", minlength:"Minimo de caracteres dos"},
      rol:{required:"* Introduzca Rol de Usuario",},
      facultadp:{required:"* Introduzca Rol de Facultad",},
      carrerap:{required:"* Introduzca Rol de Carrera",},
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });
/*Becas*/
$('#form_beca').validate({
    errorElement: "span",
    rules: {
      titulo:{required:true, minlength:2,},
      desc:{required:true, minlength:2,},
      fecha:{required:true, minlength:2,},
      fileimagen:{required:true, minlength:2,},
     },
    messages: {
      titulo:{required:"* Introduzca Titulo", minlength:"Minimo de caracteres dos"},
      desc:{required:"* Introduzca Descripcion", minlength:"Minimo de caracteres dos"},
      fecha:{required:"* Introduzca Fecha", minlength:"Minimo de caracteres dos"},
      fileimagen:{required:"* Introduzca Imagen", minlength:"Minimo de caracteres dos"},
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });
/*Convenio*/
$('#form_convenio').validate({
    errorElement: "span",
    ignore: [],
    rules: {
      titulo:{required:true, minlength:2,},
      desc:{required:true, minlength:2,},
      fecha:{required:true, minlength:2,},
      tipo:{required:true, },
     },
    messages: {
      titulo:{required:"* Introduzca Titulo", minlength:"Minimo de caracteres dos"},
      desc:{required:"* Introduzca Descripcion", minlength:"Minimo de caracteres dos"},
      fecha:{required:"* Introduzca Fecha", minlength:"Minimo de caracteres dos"},
      tipo:{required:"* Introduzca Tipo de Convenio", },
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });
/*recurso*/
$('#form_recurso').validate({
    errorElement: "span",
    ignore: [],
    rules: {
      titulo:{required:true, minlength:2,},
      obj:{required:true, minlength:2,},
      area:{required:true, minlength:2,},
      url:{required:true, },
      file:{required:true,},
     },
    messages: {
      titulo:{required:"* Introduzca Titulo", minlength:"Minimo de caracteres dos"},
      obj:{required:"* Introduzca Objetivo", minlength:"Minimo de caracteres dos"},
      area:{required:"* Introduzca Area", minlength:"Minimo de caracteres dos"},
      url:{required:"* Introduzca URL ", },
      file:{required:"* Introduzca Imagen", },
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });
/*Publicaciones*/
$('#form_publicacion').validate({
    errorElement: "span",
    ignore: [],
    rules: {
      titulo:{required:true, minlength:2,},
      desc:{required:true, minlength:2,},
      fecha:{required:true, minlength:2,},
      tipo:{required:true, },
     },
    messages: {
      titulo:{required:"* Introduzca Titulo", minlength:"Minimo de caracteres dos"},
      desc:{required:"* Introduzca Descripcion", minlength:"Minimo de caracteres dos"},
      fecha:{required:"* Introduzca Fecha", minlength:"Minimo de caracteres dos"},
      tipo:{required:"* Introduzca Tipo de Publicacion", },
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });
/*Calendario de Avances*/
$('#form_calendario').validate({
    errorElement: "span",
    rules: {
      nomeven:{required:true, minlength:2,},
      fini:{required:true, minlength:2,},
      ffin:{required:true, minlength:2,},
      fondo:{required:true,},
      link:{required:true,},
     },
    messages: {
      nomeven:{required:"* Introduzca Nombre de Evento", minlength:"Minimo de caracteres dos",},
      fini:{required:"* Introduzca Fecha de Inicio ", minlength:"Minimo de caracteres dos",},
      ffin:{required:"* Introduzca Fecha Final", minlength:"Minimo de caracteres dos",},
      fondo:{required:"* Introduzca Color de Avance", },
      link:{required:" ",},
    },
    highlight: function(element) {
   $(element).closest('.control-group')
   .removeClass('success').addClass('error');
  },
  success: function(element) {
   element
   .text('').addClass('help-inline')
   .closest('.control-group')
   .removeClass('error').addClass('success');
  },
  });

 jQuery.validator.addMethod("alphas", function(value, element){
	 return this.optional(element)|| /^[a-z -áéíóúñüàè.]+$/i.test(value);
	 },'solo letras');
 jQuery.validator.addMethod("numeros", function(value, element){
   return this.optional(element)|| /^[0-9]+$/i.test(value);
   },'solo números');
 jQuery.validator.addMethod("correo", function(value, element){
   return this.optional(element)|| /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
   },'Email Invalido');
});