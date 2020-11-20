// let todoTitle = document.getElementById("title");
// let todoPriority = document.getElementById("prio");
// let todoType = document.getElementById("type");
// let todoDate = document.getElementById("date");
var allTodo = document.querySelector(".all_todo");

//read function
async function readTodos() {
  const response = await fetch(
    "http://localhost/PostItPHP/api/todo/read.php"
  );
  const data = await response.json();
  const todos = data.todos;

  if (Object.keys(data).length == 1 && !todos) {
    var todoContainer = document.createElement("DIV");
    allTodo.appendChild(todoContainer);
    todoContainer.innerHTML =
      "<img src='img/pexels-breakingpic-3299.jpg' class='empty'/>";
  } else {
    for (todo in todos) {
      var todoContainer = document.createElement("DIV");
      var todoTitleContainer = document.createElement("DIV");
      var todoTitle = document.createElement("H2");
      var todoInfo = document.createElement("DIV");
      var todoDate = document.createElement("P");
      var todoPriority = document.createElement("P");
      var todoType = document.createElement("P");
      var trash = document.createElement("DIV");
      var check = document.createElement("DIV");

      allTodo.appendChild(todoContainer);
      todoContainer.appendChild(todoTitleContainer);
      todoTitleContainer.appendChild(check);
      todoTitleContainer.appendChild(todoTitle);
      todoTitleContainer.appendChild(trash);
      todoContainer.appendChild(todoInfo);
      todoInfo.appendChild(todoDate);
      todoInfo.appendChild(todoPriority);
      todoInfo.appendChild(todoType);

      todoContainer.className = "todo";
      todoTitleContainer.className = "todo_title";
      check.className = "check";
      todoTitle.id = "title";
      trash.className = "trash";
      todoInfo.className = "todo_info";
      todoDate.className = "date";
      todoPriority.className = "date";
      todoType.className = "date";
      todoDate.id = "date";
      todoPriority.id = "prio";
      todoType.id = "type";

      trash.innerHTML = "<i class='fas fa-trash-alt'></i>";
      check.innerHTML = "   <i class='fas fa-calendar-check'></i>";

      const { title, date_time, priority, type, id, completed } = todos[todo];
      todoTitle.innerText = title;
      todoType.innerText = type;
      todoPriority.innerText = priority;
      todoDate.innerText = date_time;
      trash.id = id;
      check.id = id;

      if (completed == "1") {
        todoTitle.classList.add("checked");
        check.classList.add("checked");
      }
    }
  }
}
