var count = 0; // Initialize the counter

document.getElementById("myButton").onclick = function() {
    count++;
    var demoElement = document.getElementById("demo");
    
    if (count % 2 == 0) { // Check for even number
        demoElement.innerHTML = ""; // Remove the image
    } else {
        var img = document.createElement("img");
        img.src = "image/button.jpg"; 
        demoElement.appendChild(img); // Add the image
    }
};
