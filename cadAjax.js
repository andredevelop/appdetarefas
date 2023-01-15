$(function(){

	$('#enviar').click(function(){
		var serie = $("form").serialize();
		var input = $('input[type=text]').val();
		var user = $('input[type=hidden]').val();

		if(input == ''){
			alert('Não adicione tarefas vazias :D');
		}else{

			$.ajax({
				url:'cadAjax.php',
				type:'post',
				data:serie,
				success:function(){
					$('#tarefa').val("");

					$.ajax({
						url:'puxandoAjax.php',
						type:'POST',
						data:{nome:$('#tarefa').val(),user:user},
						success:function(data){
							$('.nomeRetorno').html(data);
						}
					});
				}
			}).done(function(){
				timeout();
				function timeout(){
					setTimeout(function(){
					$('.msg').fadeIn();
					setTimeout(function(){
						$('.msg').fadeOut();
						},2500);
					},300);
				}
				clearTimeout(timeout);
			})
			
		}

		return false;
	})

	

	
})


