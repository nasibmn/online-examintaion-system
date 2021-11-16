$(document).ready(function() {
	$("#cpwd").keyup(function() {
		var pwd = $("#pwd").val();
		var cpwd = $("#cpwd").val();
		if(pwd != cpwd) {
			$("#err_msg").html('şifreler farklı! kontrol edin');
		} else {
			$("#err_msg").html('');
		}
	});
	setTimeout(function() {
		$("#scs").addClass('hidden');
	}, 3000);
	setTimeout(function() {
		$("#err_msg").addClass('hidden');
	}, 3000);
	setTimeout(function() {
		$(".alert-warning").addClass('hidden');
		$(".alert-danger").addClass('hidden');
		$(".alert-success").addClass('hidden');
	}, 3000);
});

function chk() {
	if(document.getElementById("pwd").value != document.getElementById("cpwd").value) {
		return false;
	} else {
		return true;
	}
}

function m_cl() {
	document.getElementById('mvct').innerHTML = '';
}

function temizle() {
	document.getElementById("err_msg").innerHTML = '';
}

function clr() {
	document.getElementById("cl").innerHTML = "";
}

function s_temizle() {
	document.getElementById('scs').innerHTML = '';
}