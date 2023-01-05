// verificador de inatividade
var inatividade = true;
var tempo_inatividade = 3000;
function monitor1() {
	setTimeout(function(){
		if (inatividade == true) {
			//alert('monitor1 inativo');
			//$('#portfolioModalSaida').modal({show:true});
			monitor2();
		}
	}, tempo_inatividade); // 1000 = 1 segundo
}
function monitor2() {
	setTimeout(function(){
		if (inatividade == true) {
			//alert('monitor2 inativo');
			//$('#portfolioModalSaida').modal({show:true});
			monitor1();
		}
	}, tempo_inatividade); // 1000 = 1 segundo
}
function atividade() {
	var inatividade = false;
	//clearTimeout(temporizador1);
	//clearTimeout(temporizador2);
	//clearTimeout(temporizador3);
	setTimeout(function(){
		inatividade = true;
		alert('atividade');
		monitor1();
	}, tempo_inatividade); // 1000 = 1 segundo
}

var idleTime = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 1000); // 1 segundo

    //Zero the idle timer on mouse event.
    $(this).mousedown(function (e) {
        idleTime = 0;
		//alert('mousedown');
    });
    $(this).mouseup(function (e) {
        idleTime = 0;
		//alert('mouseup');
    });
    $(this).click(function (e) {
        idleTime = 0;
		//alert('click');
    });
    $(this).dblclick(function (e) {
        idleTime = 0;
		//alert('dblclick');
    });
    $(this).mousemove(function (e) {
        //idleTime = 0;
		//alert('mousemove'); incompatível
    });
    $(this).mouseover(function (e) {
        idleTime = 0;
		//alert('mouseover');
    });
    $(this).mousewheel(function (e) {
        idleTime = 0;
		//alert('mousewheel'); não funciona
    });
    $(this).mouseout(function (e) {
        idleTime = 0;
		//alert('mouseout'); não funciona
    });
    $(this).contextmenu(function (e) {
        idleTime = 0;
		//alert('contextmenu'); não funciona
    });

    //Zero the idle timer on keyboard event.
	$(this).keydown(function (e) {
        idleTime = 0;
		//alert('keydown'); não funciona
    });
	$(this).keypress(function (e) {
        idleTime = 0;
		//alert('keypress'); não funciona
    });
	$(this).keyup(function (e) {
        idleTime = 0;
		//alert('keyup'); não funciona
    });

    //Zero the idle timer on touch/mobile event.
	$(this).touchstart(function (e) {
        idleTime = 0;
		//alert('touchstart'); não funciona
    });
	$(this).touchmove(function (e) {
        idleTime = 0;
		alert('touchmove');
    });
	$(this).touchend(function (e) {
        idleTime = 0;
		//alert('touchend');
    });
	$(this).touchcancel(function (e) {
        idleTime = 0;
		//alert('touchcancel');
    });
});

function timerIncrement() {
	//alert('idleTIme antes: ' + idleTime);
    idleTime = idleTime + 1;
    if (idleTime >= 30) {
		//alert('idleTIme depois: ' + idleTime);
		//alert('inativo por 30 segundos');
        //window.location.reload();
		mostrar_modal();
		idleTime = 0;
    }
}

var fechou_retencao = false;
function mostrar_modal() {
	//alert(fechou_retencao);
	if (fechou_retencao == false) {
		$('#portfolioModalSaida').modal({show:true});
		fechou_retencao = true;
	}
}
/*
	eventos de mouse (MouseEvent): mousedown, mouseup, click, dblclick, mousemove, mouseover, mousewheel, mouseout, contextmenu
	eventos de toque (TouchEvent): touchstart, touchmove, touchend, touchcancel
	eventos de teclado (KeyboardEvent): keydown, keypress, keyup
	eventos de formulário: focus, blur, change, submit
	eventos de janela: scroll, resize, hashchange, load, unload
*/// JavaScript Document