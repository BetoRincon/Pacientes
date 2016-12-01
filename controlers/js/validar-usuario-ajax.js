
$(document).ready(function(){
			 $('#submit').click(function ()
			  {
			   var user = $('#user').val();
			   var pass=$('#password').val();
			   $.post('../controlers/php/validacion-ajax-login.php',{
			    usuario: user,
			    contra: pass
			   },
			    function (data, status)
			   {
			    alert("Data: " + data + "\nStatus: " + status);
			   });
			  });
});
		