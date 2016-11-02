function valida_login(){
			if(document.login_form.codigo.value==""){
				alert("O campo Código não foi informado.");  
				return false;
			} 
			if(document.login_form.senha.value==""){ 
				alert("O campo Senha não foi informado.");
				return false;
			} 		
			document.login_form.submit();
}