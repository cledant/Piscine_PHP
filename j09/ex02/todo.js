get_cookie();

function opentextwin()
{
	var todo = prompt("What to do?", "");
	var doc = document.getElementById("ft_list");
	var elem = document.createElement("div")
	if (todo != null)
	{
		elem.innerHTML= todo;
		elem.onclick = function() {this.parentNode.removeChild(this);set_cookie();};
		doc.insertBefore(elem, doc.childNodes[0]);
		set_cookie();
	}
}

function set_cookie()
{
		var doc = document.getElementById("ft_list");
		var len = doc.childNodes.length;
		var name = "";
		var i = 0;
		while(i < len)
		{
			name = name + doc.childNodes[i].innerHTML + "`";
			i++;
		}
		var date = new Date();
		date.setTime(date.getTime()+(7*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
		var cook = "todo="+name+expires+"; path=.";
		document.cookie = cook;
}

function get_cookie()
{
	var set = document.cookie.split(";");
	var j = 0;
	var len2 = set.length;
	var doc = document.getElementById("ft_list");
	while (j < len2)
	{
		if (set[j].substr(0, 5) == "todo=")
		{
			var set2 = set[j].split("todo=");
			var set3 = set2[1].split("`");
			var len3 = set3.length;
			var k = len3;
			while (k >= 0)
			{
				var elem = document.createElement("div")
				if (set3[k] != null)
				{
					elem.innerHTML= set3[k];
					elem.onclick = function() {this.parentNode.removeChild(this);set_cookie();};
					doc.insertBefore(elem, doc.childNodes[0]);
				}
				k--;
			}
		}
		j++;
	}
}
