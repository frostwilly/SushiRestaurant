$(document).on( "click", "div.menubox.shadowbox", function() {
	var id = $(this).find(".foodid").val();
	var name = $(this).find(".foodname").text().replace("Makanan ","");
	
	var table = document.getElementById("cart");
	var tbdy = document.createElement('tbody');
	var tr = document.createElement('tr');
	var td = document.createElement('td');
	
	td.appendChild(document.createTextNode(name));
	tr.appendChild(td);
	
	var x = document.createElement("INPUT");
	x.setAttribute("type", "number");
	x.setAttribute("name", "qty[]");
	x.setAttribute("min", "1");
	x.setAttribute("max", "99");
	x.setAttribute("style", "padding: 5px; border-radius: 10px");
	td = document.createElement('td');
	td.setAttribute("class", "tdquantity");
	td.appendChild(x);
	tr.appendChild(td);
	
	x = document.createElement("INPUT");
	x.setAttribute("type", "hidden");
	x.setAttribute("name", "id[]");
	x.setAttribute("value", id);
	tr.appendChild(x);
	
	tbdy.appendChild(tr);
	table.appendChild(tbdy);
});