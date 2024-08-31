var count = 0; // Инициализация счётчика

document.getElementById("myButton").onclick = function() {
    count++;
    var demoElement = document.getElementById("demo");
    
    if (count % 2 == 0) { // Проверка на четность
        demoElement.innerHTML = ""; // Удаление изображения
    } else {
        var img = document.createElement("img");
        img.src = "image/button.jpg"; 
        demoElement.appendChild(img); // Добавление изображения
    }
};
