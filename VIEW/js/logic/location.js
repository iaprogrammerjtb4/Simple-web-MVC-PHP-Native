$( document ).ready(function() {
    lista_locations('','1');
});

function lista_locations(valor,pagina){
	var pagina=Number(pagina);
	$.ajax({
		url:'./../../Controller/Location.php',
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
	                    html+='<div class="card-body">';
	                        html+='<h4 class="card-title text-info">'+valores[i][1]+'</b></h4>';
	                        html+='<p class="card-text">'+valores[i][2]+'</p>';
	                    html+='</div>';	                    
	                html+='</div>';	                
	            html+='</div>';			
            html+='</div>';			
		}		
		$("#id_lista_locations").html(html);

		var totalreg= d[1];		
		var nropaginador=Math.ceil(totalreg/4);
		var campobuscar=$("#buscar").val();
		//alert(nropaginador);
		console.log(pagina)
		paginar="<ul class='pagination'>";
		if(pagina>1)
		{
			paginar+="<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='lista_locations("+'"'+campobuscar+'","'+1+'"'+")'>&laquo;</a></li>";
			paginar+="<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='lista_locations("+'"'+campobuscar+'","'+(pagina-1)+'"'+")'>&lsaquo;</a></li>";

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
					paginar+="<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='lista_locations("+'"'+campobuscar+'","'+i+'"'+")'>"+i+"</a></li>";
			}
		
		

		if(pagina<nropaginador)
		{
			paginar+="<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='lista_locations("+'"'+campobuscar+'","'+(pagina+1)+'"'+")'>&rsaquo;</a></li>";
			paginar+="<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='lista_locations("+'"'+campobuscar+'","'+nropaginador+'"'+")'>&raquo;</a></li>";

		}
		else
		{
			paginar+="<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>&rsaquo;</a></li>";
			paginar+="<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>&raquo;</a></li>";
		}
		paginar+="</ul>";
		$("#paginador_locations").html(paginar);
		
	});
}