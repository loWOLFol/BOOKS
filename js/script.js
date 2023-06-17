document.querySelector('.add').onclick = myClick;

function myClick(){
  let hero = document.querySelector('.hero').value;
  let desc = document.querySelector('.description').value;
  let ul = document.querySelector('.li-h')
  // let newli = document.createElement("li");
  // let newh3 = document.createElement("h3");
  // let newp = document.createElement("p");
  // let nameH = hero;
  // let descH = desc;

  // newh3.appendChild(nameH);
  // newp.appendChild(descH);
  // newli.appendChild(newh3);
  // newli.appendChild(newp);
  // ul.appendChild(newli);

  ul.innerHTML += "<li><h3>" + hero + "</h3><p>" + desc + "</p></li>";
}