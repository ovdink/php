window.onload = function ()
{
 var ft_button = document.getElementById("ft_but");
 var ft_list = document.getElementById("ft_list");

 if (ft_button)
	ft_button.addEventListener("click", addNew);
 var ca = document.cookie;
 if (ca) {
	cooks_in = JSON.parse(ca);
	cooks_in.forEach(function (elem){createTask(elem);});
 }
}

window.onunload = function () {
	var cooks = ft_list.children;
	var cooks_js = [];
	for (var i = 0; i < cooks.length; i++)
		cooks_js.unshift(cooks[i].innerHTML);
	document.cookie = JSON.stringify(cooks_js);
}

function addNew() {
	var ft_task_name = prompt("Please enter task name", "New task");

	if (ft_task_name == null)
		return null;
	ft_task_name = ft_task_name.trim();
	if (ft_task_name.length > 0)
		createTask(ft_task_name);
}

function createTask(name)
{
	ft_new = document.createElement("div");
	ft_new.innerHTML = name;
	ft_new.classList.add("li_Elem");
	ft_new.addEventListener('click', delElem)
	ft_list.insertBefore(ft_new, ft_list.firstChild);
}

function delElem()
{
	if (confirm("Delete ?"))
		this.parentElement.removeChild(this);
}