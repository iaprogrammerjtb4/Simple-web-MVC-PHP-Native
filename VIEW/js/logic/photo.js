$( document ).ready(function() {
    lista_photos('','1');
});

function lista_photos(valor,pagina){
	var pagina=Number(pagina);
	$.ajax({
		url:'./../../CONTROLLER/Photo.php',
		type:'POST',
		data:'valor='+valor+'&pagina='+pagina+'&boton=buscar'
	}).done(function(resp){		
		var d=resp.split("*");
		//Imprimimos los registro en nuestra Table
		var val = eval(d[0]);
		valores = val;
		let html = '';
		for(i=0;i<valores.length;i++){			
			html+='<div class="col-sm-6 col-md-6 col-12 mb-5">';	
				html+='<div class="container">';
	                html+='<div class="card" style="width:350px">';
	                    html+='<img class="card-img-top" src="'+valores[i][9]+'" alt="Card image" style="width:100%">';
	                    html+='<div class="card-body">';
	                        html+='<h4 class="card-title text-info">'+valores[i][4]+' <b>'+valores[i][7]+'</b></h4>';
	                        html+='<p class="card-text">'+valores[i][5]+'</p>';
	                    html+='</div>';
	                    html+='<p class="ml-3 text-info">Tags <span class="badge badge-secondary">New</span></p>';
	                html+='</div>';
	                html+='<h2>Comentarios:</h2>';
	                html+='<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ea, quis voluptatibus fuga</p>';
	                html+='<p>aspernatur eius praesentium impedit necessitatibus</p>';
	                html+='<p>sequi quo? Ut aut esse tenetur quidem explicabo, in fuga eius nisi</p>';
	            html+='</div>';			
            html+='</div>';			
		}		
		$("#lista").html(html);

		var totalreg= d[1];		
		var nropaginador=Math.ceil(totalreg/4);
		var campobuscar=$("#buscar").val();
		//alert(nropaginador);
		console.log(pagina)
		paginar="<ul class='pagination'>";
		if(pagina>1)
		{
			paginar+="<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='lista_photos("+'"'+campobuscar+'","'+1+'"'+")'>&laquo;</a></li>";
			paginar+="<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='lista_photos("+'"'+campobuscar+'","'+(pagina-1)+'"'+")'>&lsaquo;</a></li>";

		}
		else
		{
			paginar+="<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>&laquo;</a></li>";
			paginar+="<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>&lsaquo;</a></li>";
		}
			
			limite = 10;
 

			div = Math.ceil(limite / 2);

			pagInicio = (pagina > div) ? (pagina - div) : 1;

			if (nropaginador > div)
			{
				pagRestantes = nropaginador - pagina;
				pagFin = (pagRestantes > div) ? (pagina + div) :nropaginador;
			}
			else 
			{
				pagFin = nropaginador;
			}
			for(i=pagInicio;i<=pagFin;i++){
				if(i==pagina)
					paginar+="<li class='page-item active'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
				else
					paginar+="<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='lista_photos("+'"'+campobuscar+'","'+i+'"'+")'>"+i+"</a></li>";
			}
		
		

		if(pagina<nropaginador)
		{
			paginar+="<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='lista_photos("+'"'+campobuscar+'","'+(pagina+1)+'"'+")'>&rsaquo;</a></li>";
			paginar+="<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='lista_photos("+'"'+campobuscar+'","'+nropaginador+'"'+")'>&raquo;</a></li>";

		}
		else
		{
			paginar+="<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>&rsaquo;</a></li>";
			paginar+="<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>&raquo;</a></li>";
		}
		paginar+="</ul>";
		$("#paginador").html(paginar);
		
	});
}