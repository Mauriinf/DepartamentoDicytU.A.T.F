//validacion facultades
$(function() {
	$("#error_nombrefac").hide();
	var error_nombrefac = false;
	$("#nombrefac").focusout(function() {
		check_username();		
	});
	function check_username() {
		var pattern = new RegExp(/^[a-zA-Z\s]{5,20}/);	
		if(pattern.test($("#nombrefac").val())) {
			$("#error_nombrefac").hide();
		}
		else {
			$("#error_nombrefac").html("Campo Obligatorio. Mínimo de letras 5, máximo 20");
			$("#error_nombrefac").show();
			error_nombrefac = true;
		}
	}
	$("#form_fac").submit(function() {											
		error_nombrefac = false;											
		check_username();		
		if(error_nombrefac == false) {
			return true;
		} else {
			return false;	
		}
	});
});
//validacion cargos
$(function() {
	$("#error_nombrecar").hide();
	var error_nombrecar = false;	
	$("#nombrecar").focusout(function() {
		check_nombrecar();		
	});
	function check_nombrecar() {	
		var pattern = new RegExp(/^[a-zA-Z]{5,20}/);	
		if(pattern.test($("#nombrecar").val())) {
			$("#error_nombrecar").hide();
		}
		else {
			$("#error_nombrecar").html("Campo Obligatorio. Mínimo de letras 5, máximo 20");
			$("#error_nombrecar").show();
			error_nombrecar = true;
		}	
	}	
		$("#form_car").submit(function() {											
		error_nombrecar = false;											
		check_nombrecar();		
		if(error_nombrecar == false) {
			return true;
		} else {
			return false;	
		}
	});

});
//validacion carreras
$(function() {
	$("#error_nomcarrera").hide();
	var error_nomcarrera = false;	
	$("#nomcarrera").focusout(function() {
		check_nombrecarrera();		
	});
	function check_nombrecarrera() {	
		var pattern = new RegExp(/^[a-zA-Z]{5,20}/);	
		if(pattern.test($("#nomcarrera").val())) {
			$("#error_nomcarrera").hide();
		}
		else {
			$("#error_nomcarrera").html("Campo Obligatorio. Mínimo de letras 5, máximo 20");
			$("#error_nomcarrera").show();
			error_nomcarrera = true;
		}	
	}	
		$("#form_carrera").submit(function() {											
		error_nomcarrera = false;											
		check_nombrecarrera();		
		if(error_nomcarrera == false) {
			return true;
		} else {
			return false;	
		}
	});
});
//validacion personal
$(function() {
    $("#error_nombre").hide();
    $("#error_apellido").hide();
    $("#error_apellidomatmat").hide();
    $("#error_email").hide();
    $("#error_ci").hide();
    $("#error_direccion").hide();
    var error_nombre = false;
    var error_apellido = false;
    var error_apellidomat = false;
    var error_email = false;
    var error_ci = false;
    var error_direccion = false;
    $("#nomco").focusout(function(){
    	check_nombre();
    });
    $("#apat").focusout(function(){
    	check_apellido();
    });
    $("#amat").focusout(function(){
    	check_apellidomat();
    });
    $("#email").focusout(function(){
    	check_email();
    });
    $("#ci").focusout(function(){
    	check_ci();
    });
    $("#direc").focusout(function(){
    	check_direc();
    });	
	function check_nombre() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,20}/);	
		if(pattern.test($("#nomco").val())) {
			$("#error_nombre").hide();
		}
		else {
			$("#error_nombre").html("Campo Obligatorio. Mínimo de letras 5, máximo 20");
			$("#error_nombre").show();
			error_nombre = true;
		}	
	}
	function check_apellido() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,20}/);	
		if(pattern.test($("#apat").val())) {
			$("#error_apellido").hide();
		}
		else {
			$("#error_apellido").html("Campo Obligatorio. Mínimo de letras 5, máximo 20");
			$("#error_apellido").show();
			error_apellido = true;
		}	
	}
	function check_apellidomat() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,20}/);	
		if(pattern.test($("#amat").val())) {
			$("#error_apellidomat").hide();
		}
		else {
			$("#error_apellidomat").html("Campo Obligatorio. Mínimo de letras 5, máximo 20");
			$("#error_apellidomat").show();
			error_apellidomat = true;
		}	
	}
	function check_email() {
		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);	
		if(pattern.test($("#email").val())) {
			$("#error_email").hide();
		} else {
			$("#error_email").html("Email Invalido");
			$("#error_email").show();
			error_email = true;
		}	
	}
	function check_ci() {	
		var pattern = new RegExp(/^[A-Za-z0-9-\s]{7,12}/);	
		if(pattern.test($("#ci").val())) {
			$("#error_ci").hide();
		}
		else {
			$("#error_ci").html("Campo Obligatorio. Mínimo de Caracteres 7, máximo 12");
			$("#error_ci").show();
			error_ci = true;
		}	
	}
	function check_direc() {	
		var pattern = new RegExp(/^[a-zA-Z#N°\s]{5,20}/);	
		if(pattern.test($("#direc").val())) {
			$("#error_direccion").hide();
		}
		else {
			$("#error_direccion").html("Campo Obligatorio. Mínimo de Caracteres 5, máximo 20");
			$("#error_direccion").show();
			error_direccion = true;
		}	
	}
	$("#form_personal").submit(function() {
	error_nombre = false;
    error_apellido = false;
    error_apellidomat = false;
    error_email = false;
    error_ci = false;
    error_direccion = false;										
	check_nombre();
	check_apellido();
	check_apellidomat();
	check_email();
	check_ci();
	check_direc();
	if(error_nombre == false && error_apellido == false && error_apellidomat == false && error_email == false && error_ci == false && error_direccion == false) {
			return true;
		} else {
			return false;	
		}
	});
});
//validacion convocatorias
$(function() {
	$("#error_titulo").hide();	
	$("#error_descripcion").hide();	
	$("#error_resumen").hide();	
	$("#error_requerimiento").hide();	
	$("#error_fecha").hide();	
	$("#error_fechafinal").hide();
	var error_titulo = false;	
	var error_descripcion = false;	
	var error_resumen = false;	
	var error_requerimiento = false;	
	var error_fecha = false;	
	var error_fechafinal = false;
    $("#titulo").focusout(function(){
    	check_titulo();
    });
    $("#desc").focusout(function(){
    	check_desc();
    });
    $("#resumen").focusout(function(){
    	check_resumen();
    });
    $("#requi").focusout(function(){
    	check_requi();
    });
    $("#fi").focusout(function(){
    	check_fi();
    });
    $("#ff").focusout(function(){
    	check_ff();
    });	
	function check_titulo() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,300}/);	
		if(pattern.test($("#titulo").val())) {
			$("#error_titulo").hide();
		}
		else {
			$("#error_titulo").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_titulo").show();
			error_titulo = true;
		}	
	}
	function check_desc() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,200}/);	
		if(pattern.test($("#desc").val())) {
			$("#error_descripcion").hide();
		}
		else {
			$("#error_descripcion").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_descripcion").show();
			error_descripcion = true;
		}	
	}
	function check_resumen() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,300}/);	
		if(pattern.test($("#resumen").val())) {
			$("#error_resumen").hide();
		}
		else {
			$("#error_resumen").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_resumen").show();
			error_resumen = true;
		}	
	}
	function check_requi() {
		var pattern = new RegExp(/^[a-zA-Z\s]{5,300}/);	
		if(pattern.test($("#requi").val())) {
			$("#error_requerimiento").hide();
		} else {
			$("#error_requerimiento").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_requerimiento").show();
			error_requerimiento = true;
		}	
	}
	function check_fi() {	
		var pattern = new RegExp(/^[A-Za-z0-9-\s]{7,12}/);	
		if(pattern.test($("#fi").val())) {
			$("#error_fecha").hide();
		}
		else {
			$("#error_fecha").html("Campo Obligatorio.");
			$("#error_fecha").show();
			error_fecha = true;
		}	
	}
	function check_ff() {	
		var pattern = new RegExp(/^[A-Za-z0-9-\s]{7,12}/);	
		if(pattern.test($("#ff").val())) {
			$("#error_fechafinal").hide();
		}
		else {
			$("#error_fechafinal").html("Campo Obligatorio.");
			$("#error_fechafinal").show();
			error_fechafinal = true;
		}	
	}
	$("#form_convocatoria").submit(function() {
	error_titulo = false;	
	error_descripcion = false;	
	error_resumen = false;	
	error_requerimiento = false;	
	error_fecha = false;	
	error_fechafinal = false;										
	check_titulo();
	check_desc();
	check_resumen();
	check_requi();
	check_fi();
	check_ff();
	if(error_titulo == false && error_descripcion == false && error_resumen == false && error_requerimiento == false && error_fecha == false && error_fechafinal == false) {
			return true;
		} else {
			return false;	
		}
	});
});
//validacion usuario
$(function() {
	$("#error_nombreusuario").hide();	
	$("#error_apellidou").hide();
	$("#error_apellidomatu").hide();	
	$("#error_ciu").hide();	
	$("#error_direccionu").hide();	
	$("#error_telefonou").hide();	
	$("#error_emailu").hide();	
	$("#error_usuario").hide();	
	$("#error_password").hide();
	var error_nombreusuario = false;	
	var error_apellidou = false;
	var error_apellidomatu = false;	
	var error_ciu = false;	
	var error_direccionu = false;	
	var error_telefonou = false;	
	var error_emailu = false;	
	var error_usuario = false;	
	var error_password = false;
    $("#nomu").focusout(function(){
    	check_nombreu();
    });
    $("#apat").focusout(function(){
    	check_apellidou();
    });
    $("#amat").focusout(function(){
    	check_apellidomatu();
    });
    $("#ci").focusout(function(){
    	check_ciu();
    });
    $("#direc").focusout(function(){
    	check_direcu();
    });
    $("#telf").focusout(function(){
    	check_telfu();
    });
    $("#email").focusout(function(){
    	check_emailu();
    });
    $("#usu").focusout(function(){
    	check_usu();
    });
    $("#contra").focusout(function(){
    	check_contra();
    });
	function check_nombreu() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,20}/);	
		if(pattern.test($("#nomu").val())) {
			$("#error_nombreusuario").hide();
		}
		else {
			$("#error_nombreusuario").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_nombreusuario").show();
			error_nombreusuario = true;
		}	
	}
	function check_apellidou() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,20}/);	
		if(pattern.test($("#apat").val())) {
			$("#error_apellidou").hide();
		}
		else {
			$("#error_apellidou").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_apellidou").show();
			error_apellidou = true;
		}	
	}
	function check_apellidomatu() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,20}/);	
		if(pattern.test($("#amat").val())) {
			$("#error_apellidomatu").hide();
		}
		else {
			$("#error_apellidomatu").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_apellidomatu").show();
			error_apellidomatu = true;
		}	
	}
	function check_ciu() {
		var pattern = new RegExp(/^[1-9-a-zA-Z\s]{5,12}/);	
		if(pattern.test($("#ci").val())) {
			$("#error_ciu").hide();
		} else {
			$("#error_ciu").html("Campo Obligatorio. Mínimo de letras 7");
			$("#error_ciu").show();
			error_ciu = true;
		}	
	}
	function check_direcu() {	
		var pattern = new RegExp(/^[A-Za-z0-9#°N]{5,20}/);	
		if(pattern.test($("#direc").val())) {
			$("#error_direccionu").hide();
		}
		else {
			$("#error_direccionu").html("Campo Obligatorio.");
			$("#error_direccionu").show();
			error_direccionu = true;
		}	
	}
	function check_telfu() {	
		var pattern = new RegExp(/^[0-9]{7,12}/);	
		if(pattern.test($("#telf").val())) {
			$("#error_telefonou").hide();
		}
		else {
			$("#error_telefonou").html("Campo Obligatorio.");
			$("#error_telefonou").show();
			error_telefonou = true;
		}	
	}
	function check_emailu() {	
		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);	
		if(pattern.test($("#email").val())) {
			$("#error_emailu").hide();
		}
		else {
			$("#error_emailu").html("Email Invalido.");
			$("#error_emailu").show();
			error_emailu = true;
		}	
	}
	function check_usu() {	
		var pattern = new RegExp(/^[0-9-a-z-A-Z._-]{7,20}/);	
		if(pattern.test($("#usu").val())) {
			$("#error_usuario").hide();
		}
		else {
			$("#error_usuario").html("Campo Obligatorio.");
			$("#error_usuario").show();
			error_usuario = true;
		}	
	}
	function check_contra() {	
		var pattern = new RegExp(/^[0-9-a-z-A-Z._-]{2,20}/);	
		if(pattern.test($("#contra").val())) {
			$("#error_password").hide();
		}
		else {
			$("#error_password").html("Campo Obligatorio.");
			$("#error_password").show();
			error_password = true;
		}	
	}
	$("#from_usuario").submit(function() {
	error_nombreusuario = false;	
	error_apellidou = false;
	error_apellidomatu = false;	
	error_ciu = false;	
	error_direccionu = false;	
	error_telefonou = false;	
	error_emailu = false;	
	error_usuario = false;	
	error_password = false;
	check_nombreu();
	check_apellidou();
	check_apellidomatu();
	check_ciu();
	check_direcu();
	check_telfu();
	check_emailu();
	check_usu();
	check_contra();
	if(error_nombreusuario == false && error_apellidou == false && error_apellidomatu == false && error_ciu == false && error_direccionu == false && error_telefonou == false && error_emailu == false && error_usuario == false&& error_password == false) {
			return true;
		} else {
			return false;	
		}
	});
});
//validacion becas
$(function() {
	$("#error_titulobeca").hide();	
	$("#error_descripcionbeca").hide();	
	$("#error_fechabeca").hide();
	var error_titulobeca = false;	
	var error_descripcionbeca = false;	
	var error_fechabeca = false;
    $("#titulo").focusout(function(){
    	check_titulobeca();
    });
    $("#desc").focusout(function(){
    	check_descbeca();
    });
    $("#fecha").focusout(function(){
    	check_fbeca();
    });	
	function check_titulobeca() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,300}/);	
		if(pattern.test($("#titulo").val())) {
			$("#error_titulobeca").hide();
		}
		else {
			$("#error_titulobeca").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_titulobeca").show();
			error_titulobeca = true;
		}	
	}
	function check_descbeca() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,200}/);	
		if(pattern.test($("#desc").val())) {
			$("#error_descripcionbeca").hide();
		}
		else {
			$("#error_descripcionbeca").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_descripcionbeca").show();
			error_descripcionbeca = true;
		}
	}
	function check_fbeca() {	
		var pattern = new RegExp(/^[A-Za-z0-9-\s]{7,12}/);	
		if(pattern.test($("#fecha").val())) {
			$("#error_fechabeca").hide();
		}
		else {
			$("#error_fechabeca").html("Campo Obligatorio.");
			$("#error_fechabeca").show();
			error_fechabeca = true;
		}	
	}
	$("#form_beca").submit(function() {
	error_titulobeca = false;	
	error_descripcionbeca = false;		
	error_fechabeca = false;											
	check_titulobeca();
	check_descbeca();
	check_fbeca();
	if(error_titulobeca == false && error_descripcionbeca == false && error_fechabeca == false) {
			return true;
		} else {
			return false;	
		}
	});
});
//validacion convenios
$(function() {
	$("#error_tituloconvenio").hide();	
	$("#error_descripcionconvenio").hide();	
	$("#error_fechaconvenio").hide();
	var error_tituloconvenio = false;	
	var error_descripcionconvenio = false;	
	var error_fechaconvenio = false;
    $("#titulo").focusout(function(){
    	check_tituloconvenio();
    });
    $("#desc").focusout(function(){
    	check_descconvenio();
    });
    $("#fecha").focusout(function(){
    	check_fconvenio();
    });	
	function check_tituloconvenio() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,300}/);	
		if(pattern.test($("#titulo").val())) {
			$("#error_tituloconvenio").hide();
		}
		else {
			$("#error_tituloconvenio").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_tituloconvenio").show();
			error_tituloconvenio = true;
		}	
	}
	function check_descconvenio() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,200}/);	
		if(pattern.test($("#desc").val())) {
			$("#error_descripcionconvenio").hide();
		}
		else {
			$("#error_descripcionconvenio").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_descripcionconvenio").show();
			error_descripcionconvenio = true;
		}
	}
	function check_fconvenio() {	
		var pattern = new RegExp(/^[A-Za-z0-9-\s]{7,12}/);	
		if(pattern.test($("#fecha").val())) {
			$("#error_fechaconvenio").hide();
		}
		else {
			$("#error_fechaconvenio").html("Campo Obligatorio.");
			$("#error_fechaconvenio").show();
			error_fechaconvenio = true;
		}	
	}
	$("#form_convenio").submit(function() {
	error_tituloconvenio = false;	
	error_descripcionconvenio = false;		
	error_fechaconvenio = false;											
	check_tituloconvenio();
	check_descconvenio();
	check_fconvenio();
	if(error_tituloconvenio == false && error_descripcionconvenio == false && error_fechaconvenio == false) {
			return true;
		} else {
			return false;	
		}
	});
});
//validacion publicaciones
$(function() {
	$("#error_titulopublicacion").hide();	
	$("#error_descripcionpublicacion").hide();	
	$("#error_fechapublicacion").hide();
	var error_titulopublicacion = false;	
	var error_descripcionpublicacion = false;	
	var error_fechapublicacion = false;
    $("#titulo").focusout(function(){
    	check_titulopublicacion();
    });
    $("#desc").focusout(function(){
    	check_descpublicacion();
    });
    $("#fecha").focusout(function(){
    	check_fpublicacion();
    });	
	function check_titulopublicacion() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,300}/);	
		if(pattern.test($("#titulo").val())) {
			$("#error_titulopublicacion").hide();
		}
		else {
			$("#error_titulopublicacion").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_titulopublicacion").show();
			error_titulopublicacion = true;
		}	
	}
	function check_descpublicacion() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,200}/);	
		if(pattern.test($("#desc").val())) {
			$("#error_descripcionpublicacion").hide();
		}
		else {
			$("#error_descripcionpublicacion").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_descripcionpublicacion").show();
			error_descripcionpublicacion = true;
		}
	}
	function check_fpublicacion() {	
		var pattern = new RegExp(/^[A-Za-z0-9-\s]{7,12}/);	
		if(pattern.test($("#fecha").val())) {
			$("#error_fechapublicacion").hide();
		}
		else {
			$("#error_fechapublicacion").html("Campo Obligatorio.");
			$("#error_fechapublicacion").show();
			error_fechapublicacion = true;
		}	
	}
	$("#form_publicacion").submit(function() {
	error_titulopublicacion = false;	
	error_descripcionpublicacion = false;		
	error_fechapublicacion = false;											
	check_titulopublicacion();
	check_descpublicacion();
	check_fpublicacion();
	if(error_titulopublicacion == false && error_descripcionpublicacion == false && error_fechapublicacion == false) {
			return true;
		} else {
			return false;	
		}
	});
});
//validacion calendario
$(function() {
	$("#error_titulocalendario").hide();	
	$("#error_fechacalendario").hide();	
	$("#error_fechacalendariof").hide();
	$("#error_colorcalendario").hide();
	var error_titulocalendario = false;	
	var error_fechacalendario = false;	
	var error_fechacalendariof = false;
	var error_colorcalendario = false;
    $("#nomeven").focusout(function(){
    	check_titulocalendario();
    });
    $("#fini").focusout(function(){
    	check_ficalendario();
    });
    $("#ffin").focusout(function(){
    	check_fcalendario();
    });
    $("#fondo").focusout(function(){
    	check_fondo();
    });	
	function check_titulocalendario() {	
		var pattern = new RegExp(/^[a-zA-Z\s]{5,300}/);	
		if(pattern.test($("#nomeven").val())) {
			$("#error_titulocalendario").hide();
		}
		else {
			$("#error_titulocalendario").html("Campo Obligatorio. Mínimo de letras 5");
			$("#error_titulocalendario").show();
			error_titulocalendario = true;
		}	
	}
	function check_ficalendario() {	
		var pattern = new RegExp(/^[A-Za-z0-9-\s]{7,12}/);	
		if(pattern.test($("#ffin").val())) {
			$("#error_fechacalendario").hide();
		}
		else {
			$("#error_fechacalendario").html("Campo Obligatorio.");
			$("#error_fechacalendario").show();
			error_fechacalendario = true;
		}
	}
	function check_fcalendario() {	
		var pattern = new RegExp(/^[A-Za-z0-9-\s]{7,12}/);	
		if(pattern.test($("#ffin").val())) {
			$("#error_fechacalendariof").hide();
		}
		else {
			$("#error_fechacalendariof").html("Campo Obligatorio.");
			$("#error_fechacalendariof").show();
			error_fechacalendariof = true;
		}	
	}
	function check_fondos() {	
		var pattern = new RegExp(/^[A-Za-z#\s]{3,30}/);	
		if(pattern.test($("#fondos").val())) {
			$("#error_colorcalendario").hide();
		}
		else {
			$("#error_colorcalendario").html("Campo Obligatorio.");
			$("#error_colorcalendario").show();
			error_colorcalendario = true;
		}	
	}
	$("#form_publicacion").submit(function() {
	error_titulocalendario = false;	
	error_fechacalendario = false;		
	error_fechacalendariof = false;
	error_colorcalendario = false;											
	check_titulocalendario();
	check_ficalendario();
	check_fcalendario();
	check_fondos();
	if(error_titulocalendario == false && error_fechacalendario == false && error_fechacalendariof == false && error_colorcalendario == false) {
			return true;
		} else {
			return false;	
		}
	});
});