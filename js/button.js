var count = 0; // ������������� ��������

document.getElementById("myButton").onclick = function() {
    count++;
    var demoElement = document.getElementById("demo");
    
    if (count % 2 == 0) { // �������� �� ��������
        demoElement.innerHTML = ""; // �������� �����������
    } else {
        var img = document.createElement("img");
        img.src = "image/button.jpg"; 
        demoElement.appendChild(img); // ���������� �����������
    }
};
