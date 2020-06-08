function send(){
    let communicator = "com.php";
    let username = document.getElementById("communicatorForm").getElementsByTagName("textarea")["username"];
    let message = document.getElementById("communicatorForm").getElementsByTagName("textarea")["message"];
    let blog = document.getElementById("communicatorForm").getElementsByTagName("input")["blog"];
    let checkbox = document.getElementById("communicatorForm").getElementsByTagName("input")["activator"];

    if(checkbox.checked) {
        $.ajax({
            type: "POST",
            url: communicator,
            data: {
                username: username.value,
                message: message.value,
                blog: blog.value 
            },
            success: function(data) {
                console.log(data);
            }
        });

        message.value = "";
    }
}

function getData(date){
    let communicator = "comLongPoll.php";
    let blog = document.getElementById("communicatorForm").getElementsByTagName("input")["blog"];
    let checkbox = document.getElementById("communicatorForm").getElementsByTagName("input")["activator"];
    let dialogBox = document.getElementById("communicatorContent");
    if(checkbox.checked) {
        console.log(date);
        $.ajax({
            type: "POST",
            url: communicator,
            data: {
                date: date,
                blog: blog.value 
            },
            success: function(data) {
                while (dialogBox.firstChild) {
                    dialogBox.removeChild(dialogBox.firstChild);
                  }
                array = data.split("\n");
                for(let i=1;i<array.length;i++){
                    let element = document.createElement("p");
                    element.append(array[i]);
                    dialogBox.appendChild(element);
                }
                getData(array[0]);
            }
        });
    }
}